<?php

namespace App\Http\Controllers;

// use PDF;
use Alert;
use App\Models\Gaji;
use App\Models\User;
use App\DA\KirimEmail;
use App\Models\kepala;
use App\DA\QB_Kepegawaian;
use App\Models\NaikBerkala;
use App\DA\QB_Kenaikan_Gaji;
use Illuminate\Http\Request;
use App\Models\FileNaikBerkala;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class NaikBerkalaController extends Controller
{

    public function index()
    {
        //
    }

    //--ADMIN--
    //Halaman index Data Kenaikan Gaji Berkala Admin
    public function indexAdmin()
    {
        $naikBerkala = NaikBerkala::all();
        return view('pegawai.admin.kenaikan.naik-gaji-berkala.index',compact('naikBerkala'));
    }
    public function approvalAdmin($kenaikan_id)
    {
        $kenaikan = QB_Kenaikan_Gaji::getById($kenaikan_id);
        $user = QB_Kepegawaian::getPegawaiByID($kenaikan->user_id);
        return view('pegawai.admin.kenaikan.naik-gaji-berkala.approval', compact('user','kenaikan'));
    }

    public function saveApprovalAdmin($kenaikan_id, Request $req)
    {
        // dd($kenaikan_id,$req);
        $validateData = $req->validate([
            'ket' => 'required'
        ]);
        Alert::success('Sukses', 'Berhasil Submit approval');
        NaikBerkala::where('id', $kenaikan_id)->update($validateData);
        if($req->ket == 'Disetujui'){
            $to_email = User::where('nip',$req->nip)->first()->email;
            $subject = "Usulan Kenaikan Gaji Berkala";
            $html_content = "<html><body>Usulan Anda Telah Disetujui</body></html>";
            KirimEmail::send($to_email,$subject,$html_content);
        } else {
            $to_email = User::where('nip',$req->nip)->first()->email;
            $subject = "Usulan Kenaikan Gaji Berkala";
            $html_content = "<html><body>Usulan Kenaikan Gaji Berkala Anda Anda Tidak Disejui, Silahkan Cek kembali data yang diinput atau hubungi bagian kepegawaian</body></html>";
            KirimEmail::send($to_email,$subject,$html_content);
        }
        return redirect()->route('berkala.admin');
    }




    //--PEGAWAI--
    //Halaman Riwayat Kenaikan Gaji Berkala PNS
    public function indexPegawai()
    {
        $user = auth()->id();
        $naikBerkala = NaikBerkala::where('user_id', $user)->get();
        return view('pegawai.pns.kenaikan.naik_gaji_berkala.riwayat',compact('naikBerkala'));
    }

    //Halaman Tambah Data kenaikan gaji berkala PNS
    public function createNaikBerkala($kenaikan_id)
    {
        $gaji = Gaji::get();
        $user = QB_Kepegawaian::getPegawaiByID(auth()->id());
        $kenaikan = QB_Kenaikan_Gaji::getById($kenaikan_id);
        return view('pegawai.pns.kenaikan.naik_gaji_berkala.create', compact('user','gaji','kenaikan'));
    }

    //Fungsi Simpan Data Kenaikan gaji berkala pns
    public function simpanData($kenaikan_id, Request $request)
    {
        $berkala_id = $kenaikan_id;
        $user_id = auth()->id();
        if(QB_Kenaikan_Gaji::getById($kenaikan_id)){
            //todo update
            $to_validated=([
                'gaji_id' => 'required',
                'mulai_tanggal' => 'required',
                'naik_selanjutnya' => 'required',
                'tgl_usulan' => 'required',
                'sk_berkala_terakhir' => 'required|mimes:pdf|max:2048',
                'sk_cpns' => 'required|mimes:pdf|max:2048',
                'sk_naik_pangkat_akhir' => 'required|mimes:pdf|max:2048',
                'sk_mangku_jabat' => 'required|mimes:pdf|max:2048',
            ]);
            if(file_exists( base_path()."/public/storage/uploads/skbt/".$berkala_id.".pdf")){
                $to_validated['sk_berkala_terakhir'] = 'mimes:pdf|max:2048';
            }
            if(file_exists( base_path()."/public/storage/uploads/sk-cpns/".$berkala_id.".pdf")){
                $to_validated['sk_cpns'] = 'mimes:pdf|max:2048';
            }
            if(file_exists( base_path()."/public/storage/uploads/sk-naik-pangkat-terakhir/".$berkala_id.".pdf")){
                $to_validated['sk_naik_pangkat_akhir'] = 'mimes:pdf|max:2048';
            }
            if(file_exists( base_path()."/public/storage/uploads/sk-pemangku-jabatan/".$berkala_id.".pdf")){
                $to_validated['sk_mangku_jabat'] = 'mimes:pdf|max:2048';
            }
            $validateData = $request->validate($to_validated);
            unset($validateData['sk_cpns'],$validateData['sk_berkala_terakhir'],$validateData['sk_naik_pangkat_akhir'],$validateData['sk_mangku_jabat']);
            $validateData['user_id'] = $user_id;
            NaikBerkala::where('id',$kenaikan_id)->update($validateData);
        }else{
            //todo insert
            $validateData = $request->validate([
                'gaji_id' => 'required',
                'mulai_tanggal' => 'required',
                'naik_selanjutnya' => 'required',
                'tgl_usulan' => 'required',
                'sk_berkala_terakhir' => 'required|mimes:pdf|max:2048',
                'sk_cpns' => 'required|mimes:pdf|max:2048',
                'sk_naik_pangkat_akhir' => 'required|mimes:pdf|max:2048',
                'sk_mangku_jabat' => 'required|mimes:pdf|max:2048',
            ]);
            $validateData['user_id'] = $user_id;
            unset($validateData['sk_cpns'],$validateData['sk_berkala_terakhir'],$validateData['sk_naik_pangkat_akhir'],$validateData['sk_mangku_jabat']);
            $berkala_id = NaikBerkala::create($validateData)->id;
        }

        // if (!file_exists($path)) {
        //   if (!mkdir($path, 0770, true))
        //     return 'Gagal menyiapkan folder';
        // }
        if($request->file('sk_berkala_terakhir')){
            $fileName = $berkala_id.'.'.$request->file('sk_berkala_terakhir')->getClientOriginalExtension();
            $request->file('sk_berkala_terakhir')->storeAs('uploads/skbt', $fileName, 'public');
            // $fileModel->file_berkas_path = '/storage/' . $filePath;
            // $fileModel = new FileNaikBerkala();
            // $fileModel->file_berkas=$fileName;
            // $fileModel->user_id=$user_id;
            // $fileModel->save();
            // dd($fileModel->save());
        }

        if($request->file('sk_cpns')){
            $fileName = $berkala_id.'.'.$request->file('sk_cpns')->getClientOriginalExtension();
            $filePath = $request->file('sk_cpns')->storeAs('uploads/sk-cpns', $fileName, 'public');
            // $fileModel = new FileNaikBerkala();
            // $fileModel->file_berkas_path = '/storage/' . $filePath;
            // $fileModel->file_berkas=$fileName;
            // $fileModel->user_id=$user_id;
            // $fileModel->save();
        }

        if($request->file('sk_naik_pangkat_akhir')){
            $fileName = $berkala_id.'.'.$request->file('sk_naik_pangkat_akhir')->getClientOriginalExtension();
            $filePath = $request->file('sk_naik_pangkat_akhir')->storeAs('uploads/sk-naik-pangkat-terakhir', $fileName, 'public');
            // $fileModel = new FileNaikBerkala();
            // $fileModel->file_berkas_path = '/storage/' . $filePath;
            // $fileModel->file_berkas=$fileName;
            // $fileModel->user_id=$user_id;
            // $fileModel->save();
        }

        if($request->file('sk_mangku_jabat')){
            $fileName = $berkala_id.'.'.$request->file('sk_mangku_jabat')->getClientOriginalExtension();
            $filePath = $request->file('sk_mangku_jabat')->storeAs('uploads/sk-pemangku-jabatan', $fileName, 'public');

        }

        Alert::success('Sukses', 'Data Kenaikan Gaji Berkala Berhasil Ditambahkan');
        return redirect()->route('index.berkala');
    }


    public function deleteData(Request $req)
    {
        NaikBerkala::where('id',$req->id)->delete();
        Alert::success('Sukses', 'Berhasil Menghapus Data');
        return redirect()->back();

    }

    public function cetakBerkala()
    {
          $naikBerkala = NaikBerkala::all();
          $kepala = kepala::all();
          $pdf = PDF::loadView('admin\pdf\kenaikan\naik-berkala\_pdf', compact('naikBerkala','kepala'));
          $pdf->setPaper('a4', 'landscape');
          return $pdf->stream('Rekap Kenaikan Gaji Berkala PNS - Satpol PP & Damkar Tapin.pdf', array("Attachment" => false));
    }

    public function cetakBerkalaPegawai($id)
    {
        $naikBerkala = NaikBerkala::where('id', $id)->get();
        $kepala = kepala::all();
        $data = ['naikBerkala' => $naikBerkala, 'kepala' => $kepala];
        $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-berkala\usulan_pdf', $data)->setPaper('a4');
        return $pdf->stream('Usulan Kenaikan Gaji Berkala .pdf');
    }

    public function cetakPerbulan(Request $req)
    {
        // QB_Kenaikan_Gaji::betweenPDF($req->tgl_pertama,$req->tgl_kedua);
        $naikBerkala = NaikBerkala::whereBetween('tgl_usulan',[$req->tgl_pertama,$req->tgl_kedua])->get();
        $kepala = kepala::all();
        $data = ['naikBerkala' => $naikBerkala, 'kepala' => $kepala];
        $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-berkala\_pdf', $data)->setPaper('a4','landscape');
        return $pdf->stream('Rekap Kenaikan Gaji Berkala.pdf');
    }

    public function hapusReminderBerkala(Request $req)
    {
        $naikBerkala = NaikBerkala::where('id', $req->id)->update(['is_hapus' => 1]);
        return redirect('/home');
    }
}

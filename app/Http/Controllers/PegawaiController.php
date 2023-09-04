<?php

namespace App\Http\Controllers;

use Hash;
use Alert;
// use PDF;
use App\Models\Anak;
use App\Models\User;
use App\DA\KirimEmail;
use App\Models\diklat;
use App\Models\kepala;
use App\Models\Pangkat;
use App\Models\Pendidikan;
use App\Models\SuamiIstri;
use App\Models\Kepegawaian;
use App\Models\NaikPangkat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\DA\QB_Kepegawaian;  //<-------Query Builder Init
use App\Models\Parkir;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //--ADMIN--//
     //Halaman Daftar PNS
    public function index()
    {
        $user = User::all();
        return view('pegawai.admin.index', compact('user'));
    }

    //Menuju Halaman Profile PNS (ADMIN)
    public function show($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('pegawai.admin.profile-pegawai.view',compact('user'));
    }

    //Menuju Halaman Riwayat Pendidikan (ADMIN)
    public function showRiwayatPend($id)
    {

        $pendidikan = Pendidikan::where('user_id', $id)->get();
        return view('pegawai\admin\pendidikan\riwayat_pend',compact('pendidikan'));

    }

      //Cetak PDF (Laporan Daftar PNS)
      public function printPDF()
      {
          $user = User::all();
          $pdf = PDF::loadView('admin.pdf.daftar-pns._pdf', compact('user'));
          $pdf->setPaper('A4', 'landscape');
          return $pdf->stream('Daftar PNS - Satpol PP & Damkar Tapin.pdf', array("Attachment" => false));
      }

      public function printExcel()
      {
          $user = User::all();
          return view('admin\pdf\daftar-pns\_excel', compact('user'));
      }


    public function printPegawai($id)
    {
            $user = User::where('id', $id)->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            $pdf = Pdf::loadview('pegawai\pdf\profile-pegawai\_pdf', $data)->setPaper('a4');
            return $pdf->stream('Profile Pegawai - Dinas Satpol PP & Damkar Tapin.pdf');
    }

    public function printPegawaiSatpol()
    {
            $user = Kepegawaian::where('satuan', ['Satpol PP'])->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            // dd($data);
            $pdf = Pdf::loadview('admin\pdf\daftar-pns\satpol_pdf', $data)->setPaper('a4','landscape');
            return $pdf->stream('Daftar Satpol PP - Dinas Satpol PP & Damkar Tapin.pdf');
    }

    public function printPegawaiDamkar()
    {
            $user = Kepegawaian::where('satuan', ['Pemadam Kebakaran'])->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            // dd($data);
            $pdf = Pdf::loadview('admin\pdf\daftar-pns\damkar_pdf', $data)->setPaper('a4','landscape');
            return $pdf->stream('Daftar Pemadam Kebakaran - Dinas Satpol PP & Damkar Tapin .pdf');
    }

    public function printPegawaiLaki()
    {
            $user = User::where('jenis_kelamin', ['Laki-laki'])->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            // dd($data);
            $pdf = Pdf::loadview('admin\pdf\daftar-pns\laki_pdf', $data)->setPaper('a4','landscape');
            return $pdf->stream('Daftar Pemadam Kebakaran - Dinas Satpol PP & Damkar Tapin .pdf');
    }

    public function printPegawaiperempuan()
    {
            $user = User::where('jenis_kelamin', ['Perempuan'])->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            // dd($data);
            $pdf = Pdf::loadview('admin\pdf\daftar-pns\perempuan_pdf', $data)->setPaper('a4','landscape');
            return $pdf->stream('Daftar Pemadam Kebakaran - Dinas Satpol PP & Damkar Tapin .pdf');
    }

    public function printSI()
    {
        $user = SuamiIstri::where('status_si', ['Istri'])->get();
        $kepala = kepala::all();
        $data = ['user' => $user, 'kepala' => $kepala];
        $pdf = Pdf::loadview('admin\pdf\daftar-pns\istri_pns', $data)->setPaper('a4','landscape');
        return $pdf->stream('Daftar Istri PNS - Dinas Satpol PP & Damkar Tapin .pdf');
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(User $user)
    {
        // $user = User::find(auth()->user()->id);
        // return view('pegawai.pns.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        User::where('id',$id)->delete();
        Alert::success('alert', 'Data Pegawai Telah Dihapus');
        return redirect()->route('pegawai.index');
    }


    //--PEGFAWAI--..
    //Halaman Profile Pegawai
    public function showPegawai(User $user)
    {

        $user=User::with('anak_pns')->find(auth()->user()->id);
        $qbpegawai = QB_Kepegawaian::getPegawaiByID(auth()->user()->id);
        $qbkepalasatuan = QB_Kepegawaian::getKepalaSatuan();
        // dd($qbpegawai);
        return view('pegawai.pns.view',compact('user', 'qbpegawai','qbkepalasatuan'));
    }


    //Fungsi Update Data Pribadi PNS
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'email' => 'required',
            'status_kawin' => 'required',
            'pendidikan' => 'required',
            'jumlah_anak' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'no_rek' => 'required',
            'npwp' => 'required',
            'no_bpjs' => 'required',
            'no_karsu' => 'required',
            'foto' => 'image|file|max:1024',
        ]);

        // dd($request);
        $user = User::find($id);
        $user->update([
            'nip' => $request->nip,
            'name' => $request->name,
            't_lahir' => $request->t_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'nohp' => $request->nohp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'email' => $request->email,
            'status_kawin' => $request->status_kawin,
            'pendidikan' => $request->pendidikan,
            'jumlah_anak' => $request->jumlah_anak,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'no_bpjs' => $request->no_bpjs,
            'no_karsu' => $request->no_karsu,
            'password' => is_null($request->password) ? $user->password : Hash::make($request->password),
        ]);


        Alert::success('Sukses', 'Update Data Pegawai Berhasil');
        return redirect()->route('show.pegawai');
    }


    //Fungsi Upload Foto (BELUM BERHASIL)
    public function uploadFoto(Request $request, User $user)
    {
        // dd();
        $validatedData = $request->validate ([
            'foto' => 'mimes:jpeg,jpg,png|image|file|max:3024',
        ]);
        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->storeAs('images', $request->id.'.png');
        }

        // dd($validatedData);
        // User::create($validatedData);
        Alert::success('Sukses', 'Foto Profile Berhasil Diubah');
        return redirect()->route('show.pegawai');
    }


    //Function Update Data Kepegawaian PNS
    public function updateKepegawaian(Request $request, $id)
    {
        $request->validate([
            'pangkat' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'jenis_jabatan' => 'required',
            'status_pegawai' => 'required',
            'masa_kerja' => 'required',
            'gaji' => 'required',
            'satuan_kerja' => 'required',
            'satuan' => 'required',
            'nomor_sk_cpns' => 'required',
            'tgl_sk_cpns' => 'required',
            'nomor_sk_pns' => 'required',
            'tgl_sk_pns' => 'required',
            'no_karpeg' => 'required',
        ]);

        $user = Kepegawaian::updateOrCreate(['user_id' => $request->id]);
        $user->pangkat = $request->pangkat;
        $user->golongan = $request->golongan;
        $user->jabatan = $request->jabatan;
        $user->jenis_jabatan = $request->jenis_jabatan;
        $user->status_pegawai = $request->status_pegawai;
        $user->masa_kerja = $request->masa_kerja;
        $user->gaji = $request->gaji;
        $user->satuan = $request->satuan;
        $user->satuan_kerja = $request->satuan_kerja;
        $user->nomor_sk_cpns = $request->nomor_sk_cpns;
        $user->tgl_sk_cpns = $request->tgl_sk_cpns;
        $user->nomor_sk_pns = $request->nomor_sk_pns;
        $user->tgl_sk_pns = $request->tgl_sk_pns;
        $user->no_karpeg = $request->no_karpeg;
        $user->save();

        Alert::success('Sukses', 'Update Data Pegawai Berhasil');
        return back();
    }


    //Fungsi Update Data Suami Istri
    public function updateSI (Request $request)
    {
        $request->validate([
            'nama_si' => 'required',
            'status_si' => 'required',
            'pekerjaan' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
        ]);

        $user = SuamiIstri::updateOrCreate(['user_id' => $request->id]);
        $user->nama_si = $request->nama_si;
        $user->status_si = $request->status_si;
        $user->pekerjaan = $request->pekerjaan;
        $user->t_lahir = $request->t_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->status_tunjangan = $request->status_tunjangan;
        $user->umur = $request->umur;
        $user->no_hp = $request->no_hp;
        $user->save();

        Alert::success('Sukses', 'Update Data Suami/Istri Berhasil');
        return back();
    }

    //Menuju Halaman Tambah Data Anak
    public function createAnak()
    {
        return view('pegawai.pns.anak.input_anak');
    }

    //Fungsi Simpan Data Anak
    public function anakCreate(Request $request)
    {
        $validateData = $request->validate([
            'nama_anak' => 'required',
            'status_anak' => 'required',
            'umur' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
        ]);

            $validateData['user_id'] = auth()->user()->id;
            Anak::create($validateData);
            Alert::success('Sukses', 'Data Anak Berhasil Ditambahkan');
            return redirect()->route('show.pegawai');

    }

    //Menuju halaman Edit Data Anak
    public function editAnak($id)
    {

        $user = auth()->id();
        $anak = Anak::where('id', $id)->where('user_id', $user)->first();
        return view('pegawai.pns.anak.edit_anak', compact('anak'));
    }


    //Fungsi Update Data Anak
    public function updateAnak(Request $request, $id)
    {
        $request->validate([
            'nama_anak' => 'required',
            'status_anak' => 'required',
            'umur' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
        ]);

            $data = [
                'nama_anak' => $request->input('nama_anak'),
                'status_anak' => $request->input('status_anak'),
                'umur' => $request->input('umur'),
                't_lahir' => $request->input('t_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'status_tunjangan' => $request->input('status_tunjangan'),
            ];
            Anak::where('id',$id)->update($data);

            Alert::success('Sukses', 'Data Anak Berhasil Diupdate');
            return redirect()->route('show.pegawai');
    }

    //FUngsi Hapus Anak
    public function hapusAnak($id)  {
        Anak::where('id',$id)->delete();
        Alert::success('Hapus', 'Data Anak Telah Dihapus');
        return back();
    }


       //Halaman Riwayat Pendidikan
       public function menuPendidikan()
       {
           $user = User::find(auth()->user()->id);
           return view('pegawai\pns\pendidikan\riwayat_pend', compact('user'));
       }

       // Menuju Halaman Tambah Data Riwayat Pendidikan
       public function createPendidikan()
       {
           return view('pegawai.pns.pendidikan.tambah_pend');
       }

       //Fungsi Simpan Data Riwayat Pendidikan
       public function storePendidikan(Request $request)
       {
               $validateData = $request->validate([
                   'no_ijazah' => 'required',
                   'tgl_ijazah' => 'required',
                   'tingkat_pendidikan' => 'required',
                   'lembaga_pendidikan' => 'required',
                   'jurusan' => 'required',
                   'kota' => 'required',
                   'tahun_lulus' => 'required',
               ]);

               $validateData['user_id'] = auth()->user()->id;
               Pendidikan::create($validateData);
               Alert::success('Sukses', 'Data Riwayat Pendidikan Berhasil Disimpan');
               return redirect()->route('riwayat.pend');
       }

       //Menuju Halaman Edit Riwayat Pendidikan
       public function editPendidikan($id)
       {
           $user = auth()->id();
           $pendidikan = Pendidikan::where('id_pendidikan', $id)->where('user_id', $user)->first();
           return view('pegawai\pns\pendidikan\edit_pend', compact('pendidikan'));
       }

       //FUngsi Update Riwayat Pendidikan
       public function updatePendidikan(Request $request, $id)
       {
           $request->validate([
               'no_ijazah' => 'required',
               'tgl_ijazah' => 'required',
               'tingkat_pendidikan' => 'required',
               'lembaga_pendidikan' => 'required',
               'jurusan' => 'required',
               'kota' => 'required',
               'tahun_lulus' => 'required',
           ]);

               $data = [
                   'no_ijazah' => $request->input('no_ijazah'),
                   'tgl_ijazah' => $request->input('tgl_ijazah'),
                   'tingkat_pendidikan' => $request->input('tingkat_pendidikan'),
                   'lembaga_pendidikan' => $request->input('lembaga_pendidikan'),
                   'jurusan' => $request->input('jurusan'),
                   'kota' => $request->input('kota'),
                   'tahun_lulus' => $request->input('tahun_lulus'),
               ];

               Pendidikan::where('id_pendidikan',$id)->update($data);

               Alert::success('Sukses', 'Data Riwayat Pendidikan Berhasil Diubah');
               return redirect()->route('riwayat.pend');
       }


       //Fungsi Hapus Riwayat Pendidikan
       public function hapusPendidikan($id)
        {
           Pendidikan::where('id_pendidikan',$id)->delete();
           Alert::success('Hapus', 'Data Riwayat Pendidikan Telah Dihapus');
           return redirect()->route('riwayat.pend');
       }


    //Halaman Tambah Data Diklat PNS
    public function tambahDiklat()
    {
        return view('pegawai.pns.diklat.create_diklat');
    }

    //Fungsi Simpan Data Diklat
    public function storeDiklat(Request $request)
    {
        $validateData = $request->validate([
            'nama_diklat' => 'required',
            'penyelenggara' => 'required',
            'tempat_diklat' => 'required',
            'tgl_pelaksanaan' => 'required',
            'tgl_selesai' => 'required',
            'no_sttpl' => 'required',
            'ttd_pejabat' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        diklat::create($validateData);
        Alert::success('Sukses', 'Data Diklat Berhasil Disimpan');
        return redirect()->route('show.pegawai');
    }

    //Halaman Edit Diklat
    public function editDiklat($id)
    {
        $user = auth()->id();
        $diklat = diklat::where('id', $id)->where('user_id', $user)->first();
        return view('pegawai\pns\diklat\edit_diklat', compact('diklat'));
    }
    //Fungsi Update Diklat
    public function updateDiklat(Request $request, $id)
    {
        $request->validate([
            'nama_diklat' => 'required',
            'penyelenggara' => 'required',
            'tempat_diklat' => 'required',
            'tgl_pelaksanaan' => 'required',
            'tgl_selesai' => 'required',
            'no_sttpl' => 'required',
            'ttd_pejabat' => 'required',
            'status_diklat' => 'required',
        ]);

            $data = [
                'nama_diklat' => $request->input('nama_diklat'),
                'penyelenggara' => $request->input('penyelenggara'),
                'tempat_diklat' => $request->input('tempat_diklat'),
                'tgl_pelaksanaan' => $request->input('tgl_pelaksanaan'),
                'tgl_selesai' => $request->input('tgl_selesai'),
                'no_sttpl' => $request->input('no_sttpl'),
                'ttd_pejabat' => $request->input('ttd_pejabat'),
                'status_diklat' => $request->input('status_diklat'),
            ];
            // dd($data);
            diklat::where('id',$id)->update($data);

            Alert::success('Sukses', 'Data Diklat Berhasil Diupdate');
            return redirect()->route('show.pegawai');
    }
    //Fungsi Hapus Diklat
    public function hapusDiklat($id)  {
        diklat::where('id',$id)->delete();
        Alert::success('Hapus', 'Data Diklat Telah Dihapus');
        return back();
    }



     //API Untuk Mengabil Data Dari Padaringan
     public function fetchPadaringan(){
        set_time_limit(60);
        $token='5270c4c4b3308e7938692bbf04c00716';
        $response = Http::get('https://padaringan.bkpsdm.tapinkab.go.id/api/pns/',[
            'token'=>$token,
            'nip'=>auth()->user()->nip,
            'timeout' => 60.0,
        ],60);
        $data = $response->json();
        $user = User::find(auth()->user()->id);
        $db['nip']=$data['nip'];
        $db['name']=$data['nama_lengkap'];
        $db['t_lahir']=$data['tpt_lahir'];
        $db['tgl_lahir']=$data['tgl_lahir'];
        $db['jenis_kelamin']=$data['gender'];
        $db['alamat']=$data['alamat'];
        $db['nohp']=$data['hp'];
        $db['agama']=$data['agama'];
        $db['status_kawin']=$data['status_perkawinan'];
        $db['email']=$data['email'];
        $user->update($db);

        $dbpg['status_pegawai']=$data['status_kepegawaian'];
        $dbpg['jabatan']=$data['jabatan'];
        $dbpg['jenis_jabatan']=$data['jenis_jabatan'];
        $dbpg['pangkat']=$data['pangkat'];
        $dbpg['golongan']=$data['golongan'];
        $dbpg['nomor_sk_cpns']=$data['nomor_sk_cpns'];
        $dbpg['tgl_sk_cpns']=$data['tgl_sk_cpns'];
        $dbpg['nomor_sk_pns']=$data['nomor_sk_pns'];
        $dbpg['tgl_sk_pns']=$data['tgl_sk_pns'];
        $dbpg['satuan_kerja']=$data['satuan_kerja'];
        $user->kepegawaian_pns()->updateOrCreate($dbpg);

        Alert::success('Sukses', 'Data Padaringan Berhasi Dimuat');
        return redirect()->back();
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function changePassword(User $user)
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('user.edit_pass', compact('user'));
    }

    public function updatePassword (Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => is_null($request->password) ? $user->password : Hash::make($request->password),
        ]);

        Alert::success('Sukses', 'Email Atau Password Berhasil Diupdate');
        return redirect()->route('home');
    }

    public function tambahAdmin($id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $data = User::where('id', $id)->first();
        return view('admin.role.role')->with('data', $data);
    }

    public function ubahRole(Request $request, string $id)
    {

        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $request->validate([
            'role'=> 'required'
        ]);
        $data = [
            'role' => $request->input('role')
        ];

        User::where('id',$id)->update($data);

        Alert::success('Info', 'Data Berhasil Diubah');
        return redirect()->route('pegawai.index');
    }


    public function indexEmail()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        return view('admin\email\create_email');
    }

    public function sendEmail(Request $req)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
            $to_email = $req->mail;
            $subject = $req->subjek;
            $html_content = "<html><body>".$req->isi_email."</body></html>";
            KirimEmail::send($to_email,$subject,$html_content);
            Alert::success('Info', 'E-mail Berhasil Dikirim');
            return back();
    }

    // public function indexParkir()
    // {
    //     $parkir = Parkir ::all();
    //     return view('admin.parkir.index',compact('parkir'));
    // }

    // public function tambahParkir()
    // {
    //     return view('admin\parkir\input_parkir');
    // }

    // public function parkirCreate(Request $request)
    // {
    //     $validateData = $request->validate([
    //         'nopol' => 'required',
    //         'jam_masuk' => 'required',
    //         'jam_keluar' => 'required',
    //         'biaya_parkir' => 'required',
    //     ]);

    //         Parkir::create($validateData);
    //         Alert::success('Sukses', 'Data Parkir Berhasil Ditambahkan');
    //         return redirect()->route('data.parkir');

    // }

    // public function editParkir($id)
    // {
    //     $parkir = Parkir::where('id', $id)->first();
    //     return view('admin\parkir\edir_parkir', compact('parkir'));
    // }

    // public function updateParkir(Request $request, string $id)
    // {
    //     $request->validate([
    //         'nopol' => 'required',
    //         'jam_masuk' => 'required',
    //         'jam_keluar' => 'required',
    //         'biaya_parkir' => 'required',
    //     ]);
    //     $data = [
    //         'nopol' => $request->input('nopol'),
    //         'jam_masuk' => $request->input('jam_masuk'),
    //         'jam_keluar' => $request->input('jam_keluar'),
    //         'biaya_parkir' => $request->input('biaya_parkir'),
    //     ];
    //     Parkir::where('id',$id)->update($data);

    //     Alert::success('Info', 'Update Data Parkir Berhasil');
    //     return redirect()->route('data.parkir');
    // }

}

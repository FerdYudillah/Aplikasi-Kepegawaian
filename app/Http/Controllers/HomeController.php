<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DA\KirimEmail;
use App\DA\QB_Kenaikan_Gaji;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DA\QB_Kenaikan_pangkat;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // // contoh kirim email, use diatas
        // $to_email = "kesiapa@gmail.com";
        // $subject = "Notifikasi aja";
        // $html_content = "<html><body>Hello World</body></html>";
        // KirimEmail::send($to_email,$subject,$html_content);
        // dd(date("Y-m-d H:i:s"));
        $kenaikan_pangkat = QB_Kenaikan_pangkat::getAll();
        $reminderPangkat = QB_Kenaikan_pangkat::reminderData();
        $reminderGaji = QB_Kenaikan_Gaji::reminderGaji();
        $kenaikan_berkala = QB_Kenaikan_Gaji::getAll();

        return view('home', compact('kenaikan_pangkat', 'kenaikan_berkala', 'reminderPangkat', 'reminderGaji'));
    }
    public function download(Request $req)
    {

        $file_path = public_path().'/storage/uploads/'.$req->downloadpath;
        if(!isset($req->preview)){
            return response()->download($file_path, $req->downloadname);
        }else{
            return Response()->make(base64_decode( $file_path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$req->downloadname.'"',
            ]);
            // return response()->file($file_path, [
            //     'Content-Disposition' => 'inline; filename="'. $req->downloadname .'"'
            //   ]);
        }
    }

    public function sendNotif(Request $req)
    {
        dd($req);
        $to_email = User::where('nip',$req->nip)->first()->email;
        $subject = "Kenaikan Pangkat";
        $html_content = "<html><body>Pemberitahuan Bahwa Anda akan Naik Pangkat</body></html>";
        KirimEmail::send($to_email,$subject,$html_content);
        Alert::success('Info', 'E-mail Berhasil Dikirim');
        return back();
    }


}

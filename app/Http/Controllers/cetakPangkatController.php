<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kepala;
use App\Models\Kepegawaian;
use Barryvdh\DomPDF\Facade\Pdf;

class cetakPangkatController extends Controller
{

    public function index()
    {
        return view('admin\print-pegawai\berdasarkan-pangkat\index_cetak_BP');
    }


    public function printpangkat($pangkat )
    {
            $user = Kepegawaian::where('pangkat', [$pangkat])->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            // dd($data);
            $pdf = Pdf::loadview('admin\pdf\daftar-pns\satpol_pdf', $data)->setPaper('a4','landscape');
            return $pdf->stream('Daftar Satpol PP - Dinas Satpol PP & Damkar Tapin.pdf');
    }

}

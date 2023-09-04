<?php

namespace App\Http\Controllers;

use App\Models\kepala;
use App\Models\Kepegawaian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class cetakGolonganController extends Controller
{
    public function index()
    {
        return view('admin\print-pegawai\berdasarkan-golongan\index_cetak_BG');
    }

    public function printGolongan($golongan)
    {
            $user = Kepegawaian::where('golongan', [str_replace('-','/',$golongan)])->get();
            $kepala = kepala::all();
            $data = ['user' => $user, 'kepala' => $kepala];
            // dd($data);
            $pdf = Pdf::loadview('admin\pdf\daftar-pns\satpol_pdf', $data)->setPaper('a4','landscape');
            return $pdf->stream('Daftar Satpol PP - Dinas Satpol PP & Damkar Tapin.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\kepala;
use App\Models\NaikPangkat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class cetakNaikPangkatController extends Controller
{
    public function cetakUsulan($id)
    {
        $naikPangkat = NaikPangkat::where('id', $id)->get();
        $kepala = kepala::all();
        $data = ['naikPangkat' => $naikPangkat, 'kepala' => $kepala];
        $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-pangkat\pelaksana-staf\usulan_pdf', $data)->setPaper('a4');
        return $pdf->stream('Usulan Kenaikan Pangkat Jabatan Pelaksana/Staf.pdf');
    }

    //Pelaksana Staf Penyesuaian Ijazah
    public function cetakListPSI($id)
    {
            if($id == 'all'){
                $naikPangkat = NaikPangkat::all();
            }
            else{
                $naikPangkat = NaikPangkat::where('jenis_usulan', $id)->get();
            }
            $kepala = kepala::all();
            $data = ['naikPangkat' => $naikPangkat, 'kepala' => $kepala];
            $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-pangkat\pelaksana-staf-ijazah\List_PSi_pdf', $data)->setPaper('a4', 'landscape');
            return $pdf->stream('Rekap Kenaikan Pangkat PNS - Pelaksana/Staf Penyesuaian Ijazah.pdf');
    }

    public function cetakUsulanPSI($id)
    {
        $naikPangkat = NaikPangkat::where('id', $id)->get();
        $kepala = kepala::all();
        $data = ['naikPangkat' => $naikPangkat, 'kepala' => $kepala];
        $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-pangkat\pelaksana-staf-ijazah\usulan_PSI_pdf', $data)->setPaper('a4');
        return $pdf->stream('Usulan Kenaikan Pangkat Jabatan Pelaksana/Staf Penyesuaian Ijazah.pdf');
    }


    //Jabatan Fungsional Tertentu
    public function cetakListFT($id)
    {
            if($id == 'all'){
                $naikPangkat = NaikPangkat::all();
            }
            else{
                $naikPangkat = NaikPangkat::where('jenis_usulan', $id)->get();
            }
            $kepala = kepala::all();
            $data = ['naikPangkat' => $naikPangkat, 'kepala' => $kepala];
            $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-pangkat\fungsional-tertentu\List_FT_pdf', $data)->setPaper('a4', 'landscape');
            return $pdf->stream('Rekap Kenaikan Pangkat PNS - Fungsional Tertentu.pdf');
    }

    public function cetakUsulanFT($id)
    {
        $naikPangkat = NaikPangkat::where('id', $id)->get();
        $kepala = kepala::all();
        $data = ['naikPangkat' => $naikPangkat, 'kepala' => $kepala];
        $pdf = Pdf::loadview('admin\pdf\kenaikan\naik-pangkat\fungsional-tertentu\usulan_FT_pdf', $data)->setPaper('a4');
        return $pdf->stream('Usulan Kenaikan Pangkat Jabatan Fungsional Tertentu.pdf');
    }

}

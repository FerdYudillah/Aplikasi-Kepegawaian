<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Alert;

class GajiController extends Controller
{

    //Halaman Data Gaji
    public function index()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
         $gaji = Gaji::all();
        return view('admin.master-data.data-gaji.index', compact('gaji'));
    }


    //Halaman Tambah Data Gaji
    public function create()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        return view('admin.master-data.data-gaji.create');
    }


    //Fungsi Simpan Data Gaji
    public function store(Request $request)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $gaji = Gaji::create([
            'golongan' => $request->golongan,
            'masa_kerja' => $request->masa_kerja,
            'gaji_pokok' => $request->gaji_pokok,
            'tahun' => $request->tahun,
        ]);

        // dd($request);

        Alert::success('Sukses', 'Data Gaji Berhasil Ditambahkan');
        return redirect()->route('gaji.index');
    }


    public function show()
    {

    }


    //Halaman Edit Data Gaji
    public function edit(Gaji $gaji)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        return view('admin.master-data.data-gaji.edit', compact('gaji'));
    }


    //FUngsi Update Data Gaji
    public function update(Request $request, string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $request->validate([
            'golongan' => 'required',
            'masa_kerja' => 'required',
            'gaji_pokok' => 'required',
            'tahun' => 'required',

        ]);

        $gaji = Gaji::find($id);
        $gaji->update([
            'golongan' => $request->golongan,
            'masa_kerja' => $request->masa_kerja,
            'gaji_pokok' => $request->gaji_pokok,
            'tahun' => $request->tahun
        ]);

        Alert::success('Info', 'Update Data Pegawai Berhasil');
        return redirect()->route('gaji.index');
    }


    //Fungsi Hapus Data Gaji
    public function destroy(Gaji $gaji)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $gaji->destroy($gaji->id);
        Alert::success('Hapus', 'Data Telah Berhasil Dihapus');
        return redirect()->route('gaji.index');
    }
}

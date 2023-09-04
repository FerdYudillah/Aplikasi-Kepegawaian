<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;
use Alert;

class PangkatController extends Controller
{
    //Halaman Data Pangkat
    public function index()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $pangkat = Pangkat::all();
        return view('admin.master-data.data-pangkat.index', compact('pangkat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //Halaman Tambah Data Pangkat
    public function create()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        return view('admin.master-data.data-pangkat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //Fungsi Simpan Data Pangkat
    public function store(Request $request)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $pangkat = Pangkat::create([
            'nama_pangkat' => $request->nama_pangkat,
        ]);

        Alert::success('Sukses', 'Data Pangkat Berhasil Ditambahkan');
        return redirect()->route('pangkat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //Halaman Edit Data Pangkat
    public function edit($id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $pangkat = Pangkat::where('id_pangkat', $id)->first();
        return view('admin.master-data.data-pangkat.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    //Fungsi UPdate Data Pangkat
    public function update(Request $request, string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $request->validate([
            'nama_pangkat'=> 'required|unique:pangkats'
        ]);
        $data = [
            'nama_pangkat' => $request->input('nama_pangkat')
        ];
        Pangkat::where('id_pangkat',$id)->update($data);

        Alert::success('Info', 'Update Data Pangkat Berhasil');
        return redirect()->route('pangkat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    //Fungsi Hapus Data Pangkat
    public function destroy(string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        Pangkat::where('id_pangkat',$id)->delete();
        Alert::success('Info', 'Data Pangkat Telah Dihapus');
        return redirect()->route('pangkat.index');
    }
}

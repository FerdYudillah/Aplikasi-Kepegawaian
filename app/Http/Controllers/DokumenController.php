<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Alert;
use Svg\Tag\Rect;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all();
        return view('admin.dokumen.index', compact('dokumen'));
    }

    public function create($id)
    {
        $dokumen = Dokumen::where('id',$id)->first();
        return view('admin.dokumen.create', compact('dokumen'));
    }

    public function store(Request $request, $id)
    {
        // dd($request->file('file_dokumen'));
        $cek = Dokumen::where('id',$id)->first();
        if($cek){
            {
                $dokumen = Dokumen::where('id', $id)->update([
                    'no_dok' => $request->no_dok,
                    'nama_Dok' => $request->nama_Dok,
                    'jenis_dok' => $request->jenis_dok,
                    'tahun_dok' => $request->tahun_dok,
                    'tgl_upload' => $request->tgl_upload,
                ]);
                // dd($dokumen->id);
                if (!file_exists(base_path()."/public/storage/uploads/dokumen/")) {
                      if (!mkdir(base_path()."/public/storage/uploads/dokumen/", 0770, true))
                        return 'Gagal menyiapkan folder';
                    }
                if($request->file('file_dokumen')){
                    $fileName = $id.'.'.$request->file('file_dokumen')->getClientOriginalExtension();
                    $request->file('file_dokumen')->storeAs('uploads/dokumen', $fileName, 'public');
                }
            }
        }else{
            $dokumen = Dokumen::create([
                'no_dok' => $request->no_dok,
                'nama_Dok' => $request->nama_Dok,
                'jenis_dok' => $request->jenis_dok,
                'tahun_dok' => $request->tahun_dok,
                'tgl_upload' => $request->tgl_upload,
            ]);
            // dd($dokumen->id);
            if (!file_exists(base_path()."/public/storage/uploads/dokumen/")) {
                  if (!mkdir(base_path()."/public/storage/uploads/dokumen/", 0770, true))
                    return 'Gagal menyiapkan folder';
                }
            if($request->file('file_dokumen')){
                $fileName = $dokumen->id.'.'.$request->file('file_dokumen')->getClientOriginalExtension();
                $request->file('file_dokumen')->storeAs('uploads/dokumen', $fileName, 'public');
            }
        }
        Alert::success('Sukses', 'Dokumen Berhasil Ditambahkan');
        return redirect()->route('dokumen.index');
    }

    public function edit(Request $request)
    {

    }
}

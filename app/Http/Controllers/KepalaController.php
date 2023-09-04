<?php

namespace App\Http\Controllers;

use App\Models\kepala;
use Illuminate\Http\Request;
use Alert;

class KepalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $user = kepala::all();
        return view('admin.master-data.data-kepala.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        return view('admin.master-data.data-kepala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'pangol' => 'required',
        ]);

        // dd($validateData);
        $validateData['user_id'] = auth()->user()->id;
        kepala::create($validateData);
        Alert::success('Sukses', 'Data Kepala Satuan Berhasil Disimpan');
        return redirect()->route('kasat.index');
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
    public function edit(string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $user = kepala::where('id', $id)->first();
        return view('admin.master-data.data-kepala.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        $request->validate([
            'nip'=> 'required',
            'name'=> 'required',
            'pangol'=> 'required'
        ]);
        $data = [
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'pangol' => $request->input('pangol'),
        ];
        kepala::where('id',$id)->update($data);
        Alert::success('Info', 'Update Data Pangkat Berhasil');
        return redirect()->route('kasat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role == 'Kepala') {
            Abort(403);
        }
        kepala::where('id',$id)->delete();
        Alert::success('Info', 'Data Kepala Telah Dihapus');
        return back();
    }
}

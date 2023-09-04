@extends('layouts.new_app')
@section('dm','active')
@section('pangkat','active')
<title>SI-KMK | Edit Data Pangkat - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Edit Data Pangkat</strong></h3>
                    </div>
                    <form action="{{ route('pangkat.update', $pangkat->id_pangkat) }}" method="POST">
                        @method('put')
                        @csrf
                            <div class="col-md-12 mb-4">
                                <label for="nama_pangkat" class="form-label">Nama Pangkat</label>
                                <input class="form-control" type="text"id="nama_pangkat" name="nama_pangkat" value="{{ isset($pangkat) ? $pangkat->nama_pangkat : old('nama_pangkat') }}" required/>
                            </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('pangkat.index') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

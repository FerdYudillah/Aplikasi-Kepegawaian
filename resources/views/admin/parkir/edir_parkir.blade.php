@extends('layouts.new_app')
@section('main','active')
@section('profile_pegawai','active')
<title>SI-KMK | Edit Data Parkir - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Edit Data Parkir</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.parkir', $parkir->id) }}" method="POST">
                        @csrf
                        @method('put')
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nopol" class="form-label">Nopol</label>
                                <input class="form-control @error('nopol') is-invalid @enderror" type="text"id="nopol" name="nopol" value="{{ old('nopol',$parkir->nopol) }}" required/>
                                @error('nopol')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                <input class="form-control @error('jam_masuk') is-invalid @enderror" type="text"id="jam_masuk" name="jam_masuk" value="{{ old('jam_masuk',$parkir->jam_masuk) }}"/>
                                @error('jam_masuk')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                <input class="form-control @error('jam_keluar') is-invalid @enderror" type="text"id="jam_keluar" name="jam_keluar" value="{{ old('jam_keluar',$parkir->jam_keluar) }}"/>
                                @error('jam_keluar')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="biaya_parkir" class="form-label">Biaya Parkir</label>
                                <input class="form-control @error('biaya_parkir') is-invalid @enderror" type="text"id="biaya_parkir" name="biaya_parkir" value="{{ old('biaya_parkir',$parkir->biaya_parkir) }}"/>
                                @error('biaya_parkir')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                         </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('show.pegawai') }}" class="btn btn-warning">Kembali</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

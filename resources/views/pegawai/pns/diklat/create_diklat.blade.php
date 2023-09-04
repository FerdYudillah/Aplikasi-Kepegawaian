@extends('layouts.new_app')
@section('main','active')
@section('profile_pegawai','active')
<title>SI-KMK | Tambah Data Diklat PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Input Data Diklat PNS : {{ auth()->user()->name }} - {{ auth()->user()->nip }}</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan.diklat') }}" method="POST">
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama_diklat" class="form-label">Nama Diklat</label>
                                <input class="form-control @error('nama_diklat') is-invalid @enderror" type="text"id="nama_diklat" name="nama_diklat" value="{{ old('nama_diklat') }}"/>
                                @error('nama_diklat')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                <input class="form-control @error('penyelenggara') is-invalid @enderror" type="text"id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara') }}"/>
                                @error('penyelenggara')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="tempat_diklat " class="form-label">Tempat Diklat</label>
                                <input class="form-control @error('tempat_diklat') is-invalid @enderror" type="text"id="tempat_diklat" name="tempat_diklat" value="{{ old('tempat_diklat') }}"/>
                                @error('tempat_diklat')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                                <input class="form-control @error('tgl_pelaksanaan') is-invalid @enderror" type="date" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="{{ old('tgl_pelaksanaan') }}"/>
                                @error('tgl_pelaksanaan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input class="form-control @error('tgl_selesai') is-invalid @enderror" type="date" id="tgl_selesai" name="tgl_selesai" value="{{ old('tgl_selesai') }}"/>
                                @error('tgl_selesai')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="no_sttpl" class="form-label">No STTPL</label>
                                <input class="form-control @error('no_sttpl') is-invalid @enderror" type="text" id="no_sttpl" name="no_sttpl" value="{{ old('no_sttpl') }}"/>
                                @error('no_sttpl')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="ttd_pejabat" class="form-label">Pejabat Yang Menandatangani</label>
                                <input class="form-control @error('ttd_pejabat') is-invalid @enderror" type="text" id="ttd_pejabat" name="ttd_pejabat" value="{{ old('ttd_pejabat') }}"/>
                                @error('ttd_pejabat')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('show.pegawai') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

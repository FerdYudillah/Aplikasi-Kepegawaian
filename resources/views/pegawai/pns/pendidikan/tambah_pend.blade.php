@extends('layouts.new_app')
@section('main','active')
@section('profile_pegawai','active')
<title>SI-KMK | Input Data Riwayat Pendidikan PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Input Data Riwayat Pendidikan PNS</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pend.store') }}" method="POST">
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="no_ijazah" class="form-label">Nomor Ijazah</label>
                                <input class="form-control @error('no_ijazah') is-invalid @enderror" type="text"id="no_ijazah" name="no_ijazah" value="{{ old('no_ijazah') }}"/>
                                @error('no_ijazah')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="tgl_ijazah" class="form-label">Tanggal Ijazah</label>
                                <input class="form-control @error('tgl_ijazah') is-invalid @enderror" type="date"id="tgl_ijazah" name="tgl_ijazah" value="{{ old('tgl_ijazah') }}"/>
                                @error('tgl_ijazah')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="tingkat_pendidikan " class="form-label">Tingkat Pendidikan</label>
                                <input class="form-control @error('tingkat_pendidikan') is-invalid @enderror" type="text"id="tingkat_pendidikan" name="tingkat_pendidikan" value="{{ old('tingkat_pendidikan') }}"/>
                                @error('tingkat_pendidikan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="lembaga_pendidikan" class="form-label">Lembaga Pendidikan</label>
                                <input class="form-control @error('lembaga_pendidikan') is-invalid @enderror" type="text" id="lembaga_pendidikan" name="lembaga_pendidikan" value="{{ old('lembaga_pendidikan') }}"/>
                                @error('lembaga_pendidikan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input class="form-control @error('jurusan') is-invalid @enderror" type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}"/>
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="kota" class="form-label">Kota</label>
                                <input class="form-control @error('kota') is-invalid @enderror" type="text" id="kota" name="kota" value="{{ old('kota') }}"/>
                                @error('kota')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input class="form-control @error('tahun_lulus') is-invalid @enderror" type="text" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus') }}"/>
                                @error('tahun_lulus')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('riwayat.pend') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

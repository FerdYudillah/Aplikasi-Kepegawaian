@extends('layouts.new_app')
@section('main','active')
@section('profile_pegawai','active')
<title>SI-KMK | Edit Data Anak PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Edit Data Anak</strong></h3>
                    </div>
                    <form action="{{ route('anak.update', $anak->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama_anak" class="form-label">Nama Anak</label>
                                <input class="form-control @error('nama_anak') is-invalid @enderror" type="text"id="nama_anak" name="nama_anak" value="{{$anak->nama_anak}}" required/>
                                @error('nama_anak')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status_anak" class="form-label">Status Anak</label>
                                <input class="form-control @error('status_anak') is-invalid @enderror" type="text"id="status_anak" name="status_anak" value="{{$anak->status_anak}}"/>
                                @error('status_anak')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="umur" class="form-label">Umur</label>
                                <input class="form-control @error('umur') is-invalid @enderror" type="text"id="umur" name="umur" value="{{$anak->umur}}"/>
                                @error('umur')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Tempat, Tanggal lahir</label>
                                <div class="d-flex">
                                    <input class="form-control" name="t_lahir" value="{{$anak->tgl_lahir}}"/>
                                    <p>,</p>
                                    <input class="form-control" type="date"  name="tgl_lahir" value="{{$anak->tgl_lahir}}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status_tunjangan" class="form-label">Status Tunjangan</label>
                                <select name="status_tunjangan" class="form-control @error('status_tunjangan') is-invalid @enderror">
                                    <option selected disable value="">---Pilih Status Tunjangan---</option>
                                    <option value="Masih Ditunjang" @if($anak->status_tunjangan == "Masih Ditunjang") selected @endif>Masih Ditunjang</option>
                                    <option value="Tidak Ditunjang"@if($anak->status_tunjangan == "Tidak Ditunjang") selected @endif>Tidak Ditunjang</option>
                                  </select>
                                @error('status_tunjangan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>

                         </div>
                         <button type="submit" class="btn btn-success ">Input Data Anak</button>
                         <a href="{{ route('show.pegawai') }}" class="btn btn-warning">Kembali</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.new_app')
@section('main','active')
@section('daftar','active')
<title>SI-KMK | Tambah Admin PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Ubah Role</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.admin', $data->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama_anak" class="form-label">Nama Pegawai</label>
                                <input class="form-control @error('nama_anak') is-invalid @enderror" type="text"id="nama_anak" name="nama_anak" value="{{$data->name}}" required/>
                                @error('nama_anak')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <input class="form-control @error('role') is-invalid @enderror" type="text"id="role" name="role" value="{{$data->role}}"/>
                                @error('role')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div> --}}
                            <div class="mb-3 col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option selected disable value="">---Pilih Role---</option>
                                    <option value="Admin" @if($data->role == "Admin") selected @endif>Admin</option>
                                    <option value="Kepala" @if($data->role == "Kepala") selected @endif>Kepala</option>
                                    <option value="Pegawai"@if($data->role == "Pegawai") selected @endif>Pegawai</option>
                                  </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                         </div>
                         <button type="submit" class="btn btn-success ">Jadikan Admin</button>
                         <a href="{{ route('pegawai.index') }}" class="btn btn-warning">Kembali</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.new_app')
@section('dm','active')
@section('kepala','active')
<title>SI-KMK | Edit Data Kepala Satuan - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Edit Data Kepala Satuan</strong></h3>
                    </div>
                    <form action="{{ route('kasat.update', $user->id) }}" method="POST">
                        @method('put')
                        @csrf
                            <div class="col-md-12 mb-4">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control @error('nip') is-invalid @enderror" type="text"id="nip" name="nip" value="{{ $user->nip }}" />
                                @error('nip')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="name" class="form-label">Nama</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"id="name" name="name" value="{{ $user->name }}" />
                                @error('name')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="pangol" class="form-label">Pangkat/Golongan</label>
                                <input class="form-control @error('pangol') is-invalid @enderror" type="text" id="pangol" name="pangol" value="{{ $user->pangol }}"  />
                                @error('pangol')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('kasat.index') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

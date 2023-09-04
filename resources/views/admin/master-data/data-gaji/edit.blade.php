@extends('layouts.new_app')
@section('dm','active')
@section('gaji','active')
<title>SI-KMK | Edit Data Gaji - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Edit Data Gaji</strong></h3>
                    </div>
                    <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
                        @method('put')
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="golongan" class="form-label">Golongan</label>
                                <input class="form-control" type="text"id="golongan" name="golongan" value="{{ $gaji->golongan }}"/>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                <input class="form-control" type="text"id="masa_kerja" name="masa_kerja" value="{{$gaji->masa_kerja}}"/>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                <input class="form-control" type="text"id="gaji_pokok" name="gaji_pokok" value="{{ $gaji->gaji_pokok }}"/>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="tahun" class="form-label">Tahun Gaji</label>
                                <input class="form-control" type="text" id="tahun" name="tahun" value="{{ $gaji->tahun }}"/>
                            </div>

                        </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('gaji.index') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

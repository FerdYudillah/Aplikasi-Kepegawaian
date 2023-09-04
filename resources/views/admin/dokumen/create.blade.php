@extends('layouts.new_app')
@section('dm','active')
@section('gaji','active')
<title>SI-KMK | Tambah Dokumen - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Tambah Dokumen</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokumen.store',['id'=>Request::segment(3)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="no_dok" class="form-label">Nomor Dokumen</label>
                                <input class="form-control @error('no_dok') is-invalid @enderror" type="text"id="no_dok" name="no_dok" value="{{ isset($dokumen->no_dok)?$dokumen->no_dok:old('no_dok') }}"/>
                                @error('no_dok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="nama_Dok" class="form-label">Nama Dokumen</label>
                                <input class="form-control @error('nama_Dok') is-invalid @enderror" type="text"id="nama_Dok" name="nama_Dok" value="{{ isset($dokumen->nama_Dok)?$dokumen->nama_Dok:old('nama_Dok') }}"/>
                                @error('nama_Dok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="jenis_dok" class="form-label">Jenis Dokumen</label>
                                <input class="form-control @error('jenis_dok') is-invalid @enderror" type="text"id="jenis_dok" name="jenis_dok" value="{{ isset($dokumen->jenis_dok)?$dokumen->jenis_dok:old('jenis_dok') }}"/>
                                @error('jenis_dok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="tahun_dok" class="form-label">Tahun Dokumen</label>
                                <input class="form-control @error('tahun_dok') is-invalid @enderror" type="text" id="tahun_dok" name="tahun_dok" value="{{ isset($dokumen->tahun_dok)?$dokumen->tahun_dok:old('tahun_dok') }}"/>
                                @error('tahun_dok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                 @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="tgl_upload" class="form-label">Tanggal Upload Dokumen</label>
                                <input class="form-control @error('tgl_upload') is-invalid @enderror" type="date" id="tgl_upload" name="tgl_upload" value="{{ isset($dokumen->tgl_upload)?$dokumen->tgl_upload:old('tgl_upload') }}"/>
                                @error('tgl_upload')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                 @enderror
                            </div>

                            <?php
                            $file = "";
                            if(file_exists( base_path()."/public/storage/uploads/dokumen/".Request::segment(3).".pdf")){
                                $url = urldecode("/dokumen/".Request::segment(3).".pdf");
                                $file = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="file.pdf">download</button>';
                            }
                        ?>
                            <div class="mb-3 col-md-6">
                                <label for="file_dokumen">SK Pemangku Jabatan {!! $file !!}</label>
                                <input type="file" class="form-control col-4 @error('file_dokumen') is-invalid @enderror" id="file_dokumen" name="file_dokumen" >
                                @error('file_dokumen')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>

                        </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('dokumen.index') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

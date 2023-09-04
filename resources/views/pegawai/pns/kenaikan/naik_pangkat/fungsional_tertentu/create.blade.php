@extends('layouts.new_app')
@section('kepeg','active')
@section('usul-pangkat','active')
<title>SI-KMK | Usul kenaikan Pangkat PNS Jabatan Fungsional Tertentu - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Usul Kenaikan Pangkat PNS Jabatan Fungsional Tertentu</strong></h3>
                    <p>Silahkan Isi Data yang diperlukan</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan.pangkat.ft',['kenaikan_id'=>Request::segment(3)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jenis_usulan" value="4">
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control " type="text" id="nip" name="nip" value="{{ $user->nip }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama PNS</label>
                                <input class="form-control " type="text" id="name" name="name" value="{{ $user->name }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Tempat, Tanggal lahir</label>
                                <div class="d-flex">
                                    <input class="form-control" name="t_lahir" value="{{ $user->t_lahir }}" readonly/>
                                    <p>,</p>
                                    <input class="form-control" type="date"  name="tgl_lahir" value="{{ $user->tgl_lahir }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input class="form-control " type="text" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan Baru</label>
                                <input class="form-control @error('jabatan') is-invalid @enderror" type="text" id="jabatan" name="jabatan" value="{{ isset($kenaikan->jabatan)?$kenaikan->jabatan:old('jabatan') }}" />
                                @error('jabatan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="golongan" class="form-label">Golongan</label>
                                <input class="form-control " type="text" id="golongan" name="golongan" value="{{ $user->golongan }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="golongan" class="form-label">Golongan Baru</label>
                                <input class="form-control @error('gol_baru') is-invalid @enderror" type="text" id="gol_baru" name="gol_baru" value="{{ isset($kenaikan->gol_baru)?$kenaikan->gol_baru:old('gol_baru') }}" />
                                @error('gol_baru')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="pangkat_lama" class="form-label text-primary">Pangkat Lama</label>
                                <input class="form-control" type="text" id="pangkat_lama" name="pangkat_lama" value="{{ $user->pangkat }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gaji_id" class="form-label text-info"><span class="text-danger">*</span>Pangkat Baru</label>
                                <select name="pangkat_id" class="form-select @error('pangkat_id') is-invalid @enderror" id="pangkat_id">
                                    <option>---Pilih Pangkat Baru---</option>
                                          @foreach ($pangkat as $pang)
                                          @if (old('pangkat_id') == $pang->id_pangkat)
                                          <option value="{{ $pang->id_pangkat }}" selected>{{ $pang->nama_pangkat }}</option>
                                          @else
                                          <option value="{{ $pang->id_pangkat }}">{{ $pang->nama_pangkat }}</option>
                                          @endif
                                      @endforeach
                                </select>
                                @error('gaji_id')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                <input class="form-control" type="text" id="masa_kerja" name="masa_kerja" value="{{ $user->masa_kerja }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="mulai_tanggal" class="form-label"><span class="text-danger">*</span>Mulai Tanggal</label>
                                <input class="form-control @error('mulai_tanggal') is-invalid @enderror" type="date" id="mulai_tanggal" name="mulai_tanggal" value="{{ isset($kenaikan->mulai_tanggal)?$kenaikan->mulai_tanggal:old('mulai_tanggal') }}" />
                                @error('mulai_tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6 mb-4">
                                <label for="naik_selanjutnya" class="form-label"><span class="text-danger">*</span>Tanggal Kenaikan Selanjutnya</label>
                                <input class="form-control @error('naik_selanjutnya') is-invalid @enderror" type="date" id="naik_selanjutnya" name="naik_selanjutnya" value="{{ isset($kenaikan->naik_selanjutnya)?$kenaikan->naik_selanjutnya:old('naik_selanjutnya') }}" />
                                @error('naik_selanjutnya')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>
                        <hr>
                        <p><h5><strong>Surat Pengantar :</strong></h5></p>
                        <p><strong>Berikut adalah berkas-berkas yang dilampirkan untuk kenaikan pangkat.</strong></p>
                        <div class="row mb-4">
                            @include('pegawai/pns/kenaikan/naik_pangkat/fungsional_tertentu/kelengkapan')
                        </div>
                        <hr>
                        <p><h5><strong>STTPPL Diklat Prajabatan :</strong></h5></p>
                        <p><strong>Berikut adalah berkas-berkas yang dilampirkan untuk kenaikan pangkat.</strong></p>
                        <div class="row mb-4">
                            @include('pegawai\pns\kenaikan\naik_pangkat\fungsional_tertentu\kelengkapan_diklat')
                        </div>
                        <hr>
                            <p><h5><strong>Pencatuman Pendidikan Baru :</strong></h5></p>
                            <p><strong>Berikut adalah berkas-berkas yang dilampirkan untuk kenaikan pangkat.</strong></p>
                            <div class="row mb-4">
                                @include('pegawai\pns\kenaikan\naik_pangkat\fungsional_tertentu\kelengkapan_pend')
                            </div>
                        <hr>
                        <p><strong><h3>Berkas-berkas diatas harap disatukan kedalam bentuk FIle Rar, lalu silahkan upload</h3></strong></p>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <?php
                                    $file_pangkat = "";
                                    if(file_exists( base_path()."/public/storage/uploads/file_pangkat/".Request::segment(3).".rar")){
                                        $url = urldecode("/file_pangkat/".Request::segment(3).".rar");
                                        $file_pangkat = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="file_pangkat.rar">download</button>';
                                    }
                                ?>
                                <label for="file_pangkat">File RAR {!! $file_pangkat !!}</label>
                                <input type="file" class="form-control col-4 @error('file_pangkat') is-invalid @enderror" id="file_pangkat" name="file_pangkat" >
                                @error('file_pangkat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="tgl_usulan" class="form-label"><span class="text-danger">*</span>Tanggal Diusulkan</label>
                                <input class="form-control @error('tgl_usulan') is-invalid @enderror" type="date" id="tgl_usulan" name="tgl_usulan" value="{{ isset($kenaikan->tgl_usulan)?$kenaikan->tgl_usulan:old('tgl_usulan') }}" />
                                @error('tgl_usulan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>

                        </div>
                         <button type="submit" class="btn btn-info ">Simpan</button>
                         <a href="{{ route('menu.pangkat.ft') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="post" action="/download" id="download">
    @csrf
    <input type="hidden" name="downloadpath">
    <input type="hidden" name="downloadname">
</form>
@endsection
@section('js')
    <script type="text/javascript">
        var kenaikan = <?= json_encode($kenaikan); ?>;
        $('#pangkat_id').val(kenaikan.pangkat_id);
        $('.downloadable').click(function(){
            $('input[name=downloadpath]').val(this.dataset.path);
            $('input[name=downloadname]').val(this.dataset.name);
            console.log(this.dataset);
            $('#download').submit();
        });
    </script>
@endsection

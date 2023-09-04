@extends('layouts.new_app')
@section('kepeg','active')
@section('data-naik-pangkat','active')
<title>SI-KMK | Usul kenaikan Pangkat PNS Jabatan Reguler Eselon Struktural - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title"><strong>{{ $kenaikan?'Ubah':'Input' }} Usul Kenaikan Pangkat PNS Jabatan Reguler Eselon Struktural</strong></h3> --}}
                    <h3 class="card-title"><strong> Usul Kenaikan Pangkat PNS Jabatan Reguler Eselon Struktural</strong></h3>
                    <p><strong>Halaman Persetujuan Usulan</strong></p>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jenis_usulan" value="1">
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control " type="text" id="nip" name="nip" value="{{ isset($user->nip) ? $user->nip : '' }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama PNS</label>
                                <input class="form-control " type="text" id="name" name="name" value="{{ isset($user->name) ? $user->name : '' }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Tempat, Tanggal lahir</label>
                                <div class="d-flex">
                                    <input class="form-control" name="t_lahir" value="{{ $user->t_lahir }}" readonly/>
                                    <p>,</p>
                                    <input class="form-control" type="date"  name="tgl_lahir" value="{{ isset($user->tgl_lahir) ? $user->tgl_lahir : '' }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input class="form-control " type="text" id="jabatan" name="jabatan" value="{{ $user->jabatan ?:'' }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="golongan" class="form-label">Golongan</label>
                                <input class="form-control " type="text" id="golongan" name="golongan" value="{{ $user->golongan }}" readonly/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="pangkat_lama" class="form-label text-primary">Pangkat Lama</label>
                                <input class="form-control" type="text" id="pangkat_lama" name="pangkat_lama" value="{{ $user->pangkat }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pangkat_id" class="form-label text-info">Pangkat Baru</label>
                                <input class="form-control" type="text" id="nama_pangkat" name="nama_pangkat" value="{{ $kenaikan->nama_pangkat }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                <input class="form-control" type="text" id="masa_kerja" name="masa_kerja" value="{{ $user->masa_kerja }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="mulai_tanggal" class="form-label">Mulai Tanggal</label>
                                <input class="form-control @error('mulai_tanggal') is-invalid @enderror" type="date" id="mulai_tanggal" name="mulai_tanggal" value="{{ isset($kenaikan->mulai_tanggal)?$kenaikan->mulai_tanggal:old('mulai_tanggal') }}"  readonly/>
                                @error('mulai_tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>

                            <div class="mb-3 col-md-6 mb-4">
                                <label for="naik_selanjutnya" class="form-label">Tanggal Kenaikan Selanjutnya</label>
                                <input class="form-control @error('naik_selanjutnya') is-invalid @enderror" type="date" id="naik_selanjutnya" name="naik_selanjutnya" value="{{ isset($kenaikan->naik_selanjutnya)?$kenaikan->naik_selanjutnya:old('naik_selanjutnya') }}"  readonly/>
                                @error('naik_selanjutnya')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>
                        {{-- <hr> --}}
                        {{-- <p><h5><strong>Surat Pengantar :</strong></h5></p>
                        <p><strong>Berikut adalah berkas-berkas yang dilampirkan untuk kenaikan pangkat,<br>Silahkan buat berkas-berkas dibawah ini kedalam bentuk File ZIP / RAR :</strong></p>
                        <div class="row mb-4">
                            @include('pegawai.pns.kenaikan.naik_pangkat.eselon_struktural.kelengkapan')
                        </div> --}}
                        {{-- <div class="row">
                            <hr>
                            <p><h5><strong>Pencatuman Gelar Pendidikan bagi yang memiliki ijazah baru dan belum tercantum di SK Kenaikan pangkat Terakhir :</strong></h5></p>
                            <p><strong>Berikut adalah berkas-berkas yang dilampirkan untuk kenaikan pangkat,<br>Silahkan buat berkas-berkas dibawah ini kedalam bentuk File ZIP / RAR :</strong></p>
                            <div class="row mb-4">
                                @include('pegawai.pns.kenaikan.naik_pangkat.eselon_struktural.kelengkapan_pend')
                            </div>
                        </div> --}}
                        <hr>
                        {{-- <div class="mb-3 col-md-6 mb-4">
                            <p>Upload Kedua File ZIP atau RAR Tersebut kedalam Google Drive, lalu masukkan Link Google Drive Tersebut Kedalam Form Input (Pastikan Link Google Drive dalam status "Dapat Diakses Semua")</p>
                            <label for="link"> <strong>Masukkan Link Google Drive</strong></label>
                                <input type="text" class="form-control col-4 @error('link') is-invalid @enderror" id="link" name="link"  readonly>
                                @error('link')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                         @enderror
                        </div> --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <?php
                                    $file_pangkat = "";
                                    if(file_exists( base_path()."/public/storage/uploads/file_pangkat/".Request::segment(3).".rar")){
                                        $url = urldecode("/file_pangkat/".Request::segment(3).".rar");
                                        $file_pangkat = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="file_pangkat.rar">download</button>';
                                    }
                                ?>
                                <label for="file_pangkat">File KENAIKAN PANGKAT {!! $file_pangkat !!}</label>
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
                                <label for="tgl_usulan" class="form-label">Tanggal Diusulkan</label>
                                <input class="form-control @error('tgl_usulan') is-invalid @enderror" type="date" id="tgl_usulan" name="tgl_usulan" value="{{ isset($kenaikan->tgl_usulan)?$kenaikan->tgl_usulan:old('tgl_usulan') }}" readonly />
                                @error('tgl_usulan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="ket" class="form-label">Approval</label>
                                <select name="ket" class="form-select @error('ket') is-invalid @enderror" id="ket">
                                    <option value="">---Pilih Approval---</option>
                                      <option value="Tidak Disetujui">Tidak Disetujui</option>
                                      <option value="Disetujui">Disetujui</option>
                                </select>

                                @error('ket')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                        </div>
                         <button type="submit" class="btn btn-info ">Simpan</button>
                         <a href="{{ route('index.struktural') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
<form method="post" action="/download" id="download">
    @csrf
    <input type="hidden" name="downloadpath">
    <input type="hidden" name="downloadname">
</form>
@endsection

@section('js')
    <script type="text/javascript">
        $('.downloadable').click(function(){
            $('input[name=downloadpath]').val(this.dataset.path);
            $('input[name=downloadname]').val(this.dataset.name);
            console.log(this.dataset);
            $('#download').submit();
        });
    </script>
@endsection

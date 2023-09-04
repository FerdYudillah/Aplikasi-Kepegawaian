@extends('layouts.new_app')
@section('kepeg','active')
@section('data-naik-berkala','active')
<title>SI-KMK | Usul kenaikan Gaji Berkala - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Usul Kenaikan Gaji Berkala</strong></h3>
                    <p><strong>Halaman Persetujuan Usulan</strong></p>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
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
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Pangkat, Golongan</label>
                                <div class="d-flex">
                                    <input class="form-control" name="pangkat" value="{{ $user->pangkat }}" readonly/>
                                    <p>,</p>
                                    <input class="form-control"  name="golongan" value="{{ $user->golongan }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="gaji_lama" class="form-label">Gaji Lama</label>
                                <input class="form-control" type="text" id="gaji_lama" name="gaji_lama" value="{{ $user->gaji }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gaji_id" class="form-label">Gaji Baru</label>
                                 <input class="form-control" type="text" id="gaji_pokok" name="gaji_pokok" value="{{ isset($kenaikan->gaji_pokok)?$kenaikan->gaji_pokok: '' }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                <input class="form-control" type="text" id="masa_kerja" name="masa_kerja" value="{{ $user->masa_kerja }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="mulai_tanggal" class="form-label">Mulai Tanggal</label>
                                <input class="form-control @error('mulai_tanggal') is-invalid @enderror" type="date" id="mulai_tanggal" name="mulai_tanggal" value="{{  isset($kenaikan->mulai_tanggal)?$kenaikan->mulai_tanggal:old('mulai_tanggal') }}"  readonly/>
                                @error('mulai_tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="naik_selanjutnya" class="form-label">Tanggal Kenaikan Selanjutnya</label>
                                <input class="form-control @error('naik_selanjutnya') is-invalid @enderror" type="date" id="naik_selanjutnya" name="naik_selanjutnya" value="{{ isset($kenaikan->naik_selanjutnya)?$kenaikan->naik_selanjutnya:old('naik_selanjutnya') }}"  readonly/>
                                @error('naik_selanjutnya')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tgl_usulan" class="form-label">Tanggal Diusulkan</label>
                                <input class="form-control @error('tgl_usulan') is-invalid @enderror" type="date" id="tgl_usulan" name="tgl_usulan" value="{{ isset($kenaikan->tgl_usulan)?$kenaikan->tgl_usulan:old('tgl_usulan') }}"  readonly/>
                                @error('tgl_usulan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>

                        <?php
                            $sk_berkala_terakhir = "";
                            if(file_exists( base_path()."/public/storage/uploads/skbt/".Request::segment(3).".pdf")){
                                $url = urldecode("/skbt/".Request::segment(3).".pdf");
                                $sk_berkala_terakhir = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="sk_berkala_terakhir.pdf">download</button>';
                            }
                            $sk_cpns = "";
                            if(file_exists( base_path()."/public/storage/uploads/sk-cpns/".Request::segment(3).".pdf")){
                                $url = urldecode("/sk-cpns/".Request::segment(3).".pdf");
                                $sk_cpns = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="sk_cpns.pdf">download</button>';
                            }
                            $sk_naik_pangkat_akhir = "";
                            if(file_exists( base_path()."/public/storage/uploads/sk-naik-pangkat-terakhir/".Request::segment(3).".pdf")){
                                $url = urldecode("/sk-naik-pangkat-terakhir/".Request::segment(3).".pdf");
                                $sk_naik_pangkat_akhir = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="sk_naik_pangkat_akhir.pdf">download</button>';
                            }
                            $sk_mangku_jabat = "";
                            if(file_exists( base_path()."/public/storage/uploads/sk-pemangku-jabatan/".Request::segment(3).".pdf")){
                                $url = urldecode("/sk-pemangku-jabatan/".Request::segment(3).".pdf");
                                $sk_mangku_jabat = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="sk_mangku_jabat.pdf">download</button>';
                            }
                        ?>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="sk_berkala_terakhir">Fotocopy SK Berkala Terakhir
                                    {!! $sk_berkala_terakhir !!}
                                </label>
                                    <input type="file" class="form-control col-4 @error('sk_berkala_terakhir') is-invalid @enderror" id="sk_berkala_terakhir" name="sk_berkala_terakhir" disabled>
                                    @error('sk_berkala_terakhir')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_cpns">SK CPNS {!! $sk_cpns !!}</label>
                                    <input type="file" class="form-control col-4 @error('sk_cpns') is-invalid @enderror" id="sk_cpns" name="sk_cpns" disabled>
                                    @error('sk_cpns')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_naik_pangkat_akhir">SK Kenaikan Pangkat Terakhir {!! $sk_naik_pangkat_akhir !!}</label>
                                    <input type="file" class="form-control col-4 " id="sk_naik_pangkat_akhir" name="sk_naik_pangkat_akhir" disabled>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_mangku_jabat">SK Pemangku Jabatan {!! $sk_mangku_jabat !!}</label>
                                    <input type="file" class="form-control col-4 " id="sk_mangku_jabat" name="sk_mangku_jabat" disabled>
                            </div>
                        </div>
                        <div class="row">
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
                        <input name="idUser" type="hidden" value="{{$user->id}}">
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('berkala.admin') }}" class="btn btn-warning">Kembali</a>
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

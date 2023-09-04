@extends('layouts.new_app')
@section('dm','active')
@section('mail','active')
<title>SI-KMK | Edit Data PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-info">
                <div class="card-header">
                    <h3 class="card-title"><strong>KIRIM EMAIL <i class='bx bxs-envelope' ></i></strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('kirim-email') }}" method="POST">
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="mail" class="form-label">Masukkan Email</label>
                                <input class="form-control @error('mail') is-invalid @enderror" type="text"id="mail" name="mail" value="{{ old('mail') }}" required/>
                                @error('mail')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="subjek" class="form-label">Subjek Email</label>
                                <select name="subjek" class="form-control @error('subjek') is-invalid @enderror" required>
                                    <option selected disable value="">---Pilih Subjek---</option>
                                    <option value="Kenaikan Pangkat" {{ old('subjek') == 'Kenaikan Pangkat' ? 'selected=selected' : '' }}>Kenaikan Pangkat</option>
                                    <option value="Kenaikan Gaji Berkala" {{ old('subjek') == 'Kenaikan Gaji Berkala' ? 'selected=selected' : '' }}>Kenaikan Gaji Berkala</option>
                                  </select>
                                @error('subjek')
                                    <div class="invalid-feedbacreturn view('admin.master-data.data-pangkat.create');k">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="isi_email" class="form-label">Isi Email</label>
                                <select name="isi_email" class="form-control @error('isi_email') is-invalid @enderror" required>
                                    <option selected disable value="">---Pilih Isi Email---</option>
                                    <option value="Sudah Waktunya Anda Naik Pangkat, Segera Kirim Usulan" {{ old('isi_email') == 'Sudah Waktunya Anda Naik Pangkat, Segera Kirim Usulan' ? 'selected=selected' : '' }}>Sudah Waktunya Anda Naik Pangkat, Segera Kirim Usulan</option>
                                    <option value="Sudah Waktunya Anda Naik Gaji Berkala, Segera Kirim Usulan" {{ old('isi_email') == 'Sudah Waktunya Anda Naik Gaji Berkala, Segera Kirim Usulan' ? 'selected=selected' : '' }}>Sudah Waktunya Anda Naik Gaji Berkala, Segera Kirim Usulan</option>
                                  </select>
                                @error('isi_email')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label for="isi_email" class="form-label">Isi Email</label>
                                <input class="form-control @error('isi_email') is-invalid @enderror" type="text"id="isi_email" name="isi_email" value="{{ old('isi_email') }}" required/>
                                @error('isi_email')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div> --}}
                         </div>
                         <button type="submit" class="btn btn-danger "><i class='bx bx-envelope'></i> Kirim Email</button>
                         <a href="/home" class="btn btn-warning">Kembali</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

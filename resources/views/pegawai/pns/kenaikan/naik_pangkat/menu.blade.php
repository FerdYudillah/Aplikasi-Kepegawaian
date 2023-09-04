@extends('layouts.new_app')
@section('kepeg','active')
@section('usul-pangkat','active')
<title>SI-KMK | Menu Kenaikan Pangkat PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">
        <h5>{{ __('Menu Kenaikan Pangkat PNS') }}</h5>
        <h4><Strong>Silahkan Pilih Kenaikan Pangkat Sesuai Jabatan Anda :</Strong></h4>
        {{-- <a href="{{ route('print.riwayat.np',$naikPangkat->id) }}" class="btn btn-sm btn-danger"><i class='bx bx-printer bx-flashing' ></i> Cetak Riwayat</a> --}}
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 mb-4">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat </h5>
                <p class="card-text"><strong>Jabatan Reguler Eselon Struktural.</strong> </p>
                <a href="{{ route('menu.pangkat.struktural') }}" class="btn btn-primary">Masuk</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat </h5>
                <p class="card-text"><strong>Jabatan Pelaksana/Staf.</strong></p>
                <a href="{{ route('menu.pangkat.pestaf') }}" class="btn btn-Success">Masuk</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat</h5>
                <p class="card-text"><strong>Jabatan Pelaksana/Staf Penyesuaian Ijazah.</strong></p>
                <a href="{{ Route('menu.pangkat.pestafijazah') }}" class="btn btn-warning">Masuk</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat</h5>
                <p class="card-text"><strong>Jabatan Fungsional Tertentu.</strong></p>
                <a href="{{ route('menu.pangkat.ft') }}" class="btn btn-info">Masuk</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

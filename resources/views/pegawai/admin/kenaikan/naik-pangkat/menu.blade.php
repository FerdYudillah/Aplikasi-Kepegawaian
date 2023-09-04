@extends('layouts.new_app')
@section('kepeg','active')
@section('data-naik-pangkat','active')
<title>SI-KMK | Menu Data Kenaikan Pangkat PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">
        <h5>{{ __('Menu Data Kenaikan Pangkat PNS') }}</h5>
        <hr>
        <a href="{{ route('cetak.res',['all']) }}" class="btn btn-danger"><i class='bx bx-printer bx-flashing' ></i> Cetak Laporan</a>
      </div>
      <div class="card-body">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  {{-- Cetak Pertanggal --}}
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Cetak Rekap Pertanggal</strong>
                    <div class="card-header">
                        <form action="{{ route('print-tanggal.NP') }}" method="post">
                            @csrf
                                <input type="date" class="form-control" name="tgl_pertama">
                                <input type="date" class="form-control" name="tgl_kedua">
                            <br>
                    <button type="submit" class="btn btn-info">Cetak</button>
                </form>
                </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 mb-4">
            <div class="card">

              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat </h5>
                <p class="card-text"><strong>Jabatan Reguler Eselon Struktural.</strong> </p>
                <a href="{{ route('index.struktural') }}" class="btn btn-primary">Masuk</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat </h5>
                <p class="card-text"><strong>Jabatan Pelaksana/Staf.</strong></p>
                <a href="{{ route('index.ps') }}" class="btn btn-Success">Masuk</a>
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
                <a href="{{ Route('index.psi') }}" class="btn btn-warning">Masuk</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Kenaikan Pangkat</h5>
                <p class="card-text"><strong>Jabatan Fungsional Tertentu.</strong></p>
                <a href="{{ route('index.ft') }}" class="btn btn-info">Masuk</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

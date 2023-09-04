@extends('layouts.new_app')
@section('cp','active')
@section('cetak','active')
<title>Apk-KMK | Cetak Pegawai - Satpol PP & Damkar Tapin</title>
@section('css')
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/datatables.checkboxes.css" />
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/responsive.bootstrap5.css" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-3"><Strong>Cetak Data PNS Berdasarkan Pangkat</Strong></h3>
                    <br>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        JURU
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Juru Muda']) }}" target="_blank">Juru Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Juru Muda Tingkat I']) }}" target="_blank">Juru Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Juru']) }}" target="_blank">Juru <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Juru Tingkat I']) }}" target="_blank">Juru TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        PENGATUR
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pengatur Muda']) }}" target="_blank">Pengatur Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pengatur Muda Tingkat I']) }}" target="_blank">Pengatur Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pengatur']) }}" target="_blank">Pengatur <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pengatur Tingkat I']) }}" target="_blank">Pengatur TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        PENATA
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Penata Muda']) }}" target="_blank">Penata Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Penata Muda Tingkat I']) }}" target="_blank">Penata Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Penata']) }}" target="_blank">Penata <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Penata Tingkat I']) }}" target="_blank">Penata TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        PEMBINA
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina Muda']) }}" target="_blank">Pembina Muda<i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina Muda Tingkat I']) }}" target="_blank">Pembina Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina']) }}" target="_blank">Pembina <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina Tingkat I']) }}" target="_blank">Pembina TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina Utama Muda']) }}" target="_blank">Pembina Utama Muda <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina Utama Madya']) }}" target="_blank">Pembina Utama Madya <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.pangkat', ['Pembina Utama']) }}" target="_blank">Pembina Utama  <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
<br><br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-3"><Strong>Cetak Data PNS Berdasarkan Golongan</Strong></h3>
                    <br>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan I
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['I-a']) }}" target="_blank">I/a <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['I-b']) }}" target="_blank">I/b <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['I-c']) }}" target="_blank">I/c <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['I-d']) }}" target="_blank">I/d <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan II
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['II-a']) }}" target="_blank">II/a <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['II-b']) }}" target="_blank">II/b<i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['II-c']) }}" target="_blank">II/c <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['II-d']) }}" target="_blank">II/d <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan III
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['III-a']) }}" target="_blank">III/a <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['III-b']) }}" target="_blank">III/b <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['III-c']) }}" target="_blank">III/c <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['III-d']) }}" target="_blank">III/d <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan IV
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['IV-a']) }}" target="_blank">IV/a<i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['IV-b']) }}" target="_blank">IV/b<i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['IV-c']) }}" target="_blank">IV/c<i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['IV-d']) }}" target="_blank">IV/d<i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('cetak.golongan', ['IV-e']) }}" target="_blank">IV/e<i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



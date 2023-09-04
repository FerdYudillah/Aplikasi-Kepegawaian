@extends('layouts.new_app')
@section('main','active')
@section('daftar','active')
<title>Apk-KMK | Cetak Pegawai Berdasarkan Golongan - Satpol PP & Damkar Tapin</title>
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
                    <h3 class="card-title mb-3"><Strong>Cetak Data Pegawai Berdasarkan Golongan</Strong></h3>
                    <br>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan I
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.penata.muda') }}" target="_blank">Penata Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata.mudai') }}" target="_blank">Penata Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata') }}" target="_blank">Penata <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penatai') }}" target="_blank">Penata TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan II
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.penata.muda') }}" target="_blank">Penata Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata.mudai') }}" target="_blank">Penata Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata') }}" target="_blank">Penata <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penatai') }}" target="_blank">Penata TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan III
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.penata.muda') }}" target="_blank">Penata Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata.mudai') }}" target="_blank">Penata Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata') }}" target="_blank">Penata <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penatai') }}" target="_blank">Penata TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Golongan IV
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.penata.muda') }}" target="_blank">Penata Muda <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata.mudai') }}" target="_blank">Penata Muda Tingkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penata') }}" target="_blank">Penata <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.penatai') }}" target="_blank">Penata TIngkat I <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection



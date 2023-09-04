@extends('layouts.new_app')
@section('main','active')
@section('daftar','active')
<title>Apk-KMK | Daftar PNS - Satpol PP & Damkar Tapin</title>
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
                    <h3 class="card-title mb-3"><Strong>Daftar Pegawai Negeri Sipil Satpol PP & Damkar Tapin</Strong></h3>
                    <div class="form-group float-right">
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Cetak All
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.listPns') }}" target="_blank">Laporan Daftar PNS (PDF) <i class='bx bxs-file-pdf' ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.listPns.excel') }}" target="_blank">Laporan Daftar PNS (Excel) <i class='bx bxs-file' ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Cetak Berdasarkan Satuan
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.satpol') }}" target="_blank">Daftar Satpol PP <i class='bx bxs-shield-alt-2' style='color:#ef8d00'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.damkar') }}" target="_blank">Daftar Damkar <i class='bx bxs-shield-alt-2' style='color:#0400ef'  ></i></a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bxs-printer'></i>
                        Cetak Berdasarkan Jenis Kelamin
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="{{ route('print.laki') }}" target="_blank">Daftar PNS Laki-laki <i class='bx bxs-user' style='color:#ef0028'  ></i></a></li>
                        <li><a class="dropdown-item" href="{{ route('print.perempuan') }}" target="_blank">Daftar PNS Perempuan <i class='bx bxs-user' style='color:#ef00ad'  ></i></a></li>
                        </ul>
                    </div>
                    <a href="{{ route('print.istri') }}" type="button" class="btn btn-sm btn-danger"><i class='bx bxs-printer'></i>Cetak Daftar Istri PNS</a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm datatables-basic">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>No</th>
                                <th>Foto</th>
                                <th>NIP</th>
                                <th>NAMA PNS</th>
                                <th>PANGKAT/GOLONGAN</th>
                                <th>JABATAN</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                 $no = 1;
                            @endphp
                            @forelse ($user as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $no++ }}</td>
                                <td>@if (file_exists(public_path().'/images/'.$item->id.'.png'))
                                    <img src="/images/{{ $item->id }}.png" alt="user-avatar" class="d-block rounded" height="90" width="70" id="uploadedAvatar" />
                                  @else
                                      <img src="/placeholder.png" alt="user-avatar" class="d-block rounded" height="70" width="70" id="uploadedAvatar" />
                                  @endif</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ isset($item->kepegawaian_pns->pangkat) ? $item->kepegawaian_pns->pangkat : ' ' }} - {{ isset($item->kepegawaian_pns->golongan) ? $item->kepegawaian_pns->golongan : ' ' }}</td>
                                <td>{{ isset($item->kepegawaian_pns->jabatan) ? $item->kepegawaian_pns->jabatan : ' ' }}</td>
                                <td>
                                    <a href="{{ route('pegawai.show', $item->id) }}" class="btn btn-success btn-sm"> <i class="bx bx-search"></i></a>
                                    @if (auth()->user()->role == 'Admin')
                                    <a href="{{ route('tambah.admin', $item->id) }}" class="btn btn-warning btn-sm"> <i class='bx bx-message-alt-edit'></i></i></a>
                                   <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="{{ route('pegawai.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="bx bx-trash"></i></button>
                                    @endif
                                  </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="4">Data Tidak Ada</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="/sneat/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script type="text/javascript">
        $(function(){
            "use strict";
            var e=$(".datatables-basic");
            e.length&&(e.DataTable({
                columnDefs:[{className:"control",orderable:!1,responsivePriority:2,searchable:!1,targets:0,
                        render:function(e,t,a,s){return""}},{targets:3,responsivePriority:4},{responsivePriority:1,targets:4},{targets:-1,title:"Actions",orderable:!1,searchable:!1}],
                order:[2,"desc"],
                dom:'<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength:7,lengthMenu:[7,10,25,50,75,100],
                buttons:[],
                responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}}),type:"column",renderer:function(e,t,a){a=$.map(a,function(e,t){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!a&&$('<table class="table"/><tbody />').append(a)}}}}))
        $('.create-new').click(function(){
            var url = "{{ route('gaji.create') }}";
            location.href = url;
        });
    });

    </script>
@endsection


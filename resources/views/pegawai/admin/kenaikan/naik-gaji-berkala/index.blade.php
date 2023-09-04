@extends('layouts.new_app')
@section('kepeg','active')
@section('data-naik-berkala','active')
<title>APK-KMK | Data Kenaikan Gaji Berkala PNS - Satpol PP & Damkar Tapin</title>
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
                    <h3 class="card-title mb-3"><Strong>Data Kenaikan Gaji Berkala PNS</Strong></h3>
                    <p>Merupakan Seluruh Data Kenaikan Gaji Berkala Dari PNS Yang ada Pada Satpol PP </p>
                    <div class="form-group float-right">
                        <a href="{{ route('print-berkala') }}" class="btn btn-success btn-md"><i class='bx bxs-printer bx-tada' ></i> Cetak Laporan Kenaikan Gaji Berkala PNS</a>
                    </div>
                </div>
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
                            <form action="{{ route('print-tanggal') }}" method="post">
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

                <div class="card-body">
                    <table class="table table-bordered table-sm datatables-basic">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Gaji Lama</th>
                                <th>Gaji Baru</th>
                                <th>Tanggal Diusulkan</th>
                                <th>Naik Selanjutnya</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                 $no = 1;
                            @endphp
                            @foreach ($naikBerkala as $item)
                            <tr>
                                <td></td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user_pegawai->nip }}</td>
                                <td>{{ $item->user_pegawai->name }}</td>
                                <td>{{ isset($item->user_pegawai->kepegawaian_pns->gaji)?$item->user_pegawai->kepegawaian_pns->gaji:'' }}</td>
                                <td>{{ $item->gaji->gaji_pokok }}</td>
                                <td>{{ $item->tgl_usulan }}</td>
                                <td class="text-warning">{{ $item->naik_selanjutnya }}</td>
                                <td>{{ $item->ket }}</td>
                                <td>
                                    <a href="{{ route('print.usulan', $item->id) }}" class="btn btn-sm btn-primary"><i class='bx bxs-printer'></i></a>
                                   <a href="{{ route('approval.berkala.admin',[$item->id]) }}" class="btn btn-warning btn-sm">  <i class="bx bx-edit"></i></a>
                                   @if (auth()->user()->role == 'Admin')
                                   <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="{{ route('delete.berkala') }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" name="id" value="{{ $item->id }}"><i class="bx bx-trash"></i></button>
                                   </form>
                                   @endif
                                </td>
                            </tr>
                            @endforeach
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
                order:[[2,"asc"]],
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

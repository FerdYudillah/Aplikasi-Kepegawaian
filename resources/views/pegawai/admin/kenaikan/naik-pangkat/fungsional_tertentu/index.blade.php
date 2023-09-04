@extends('layouts.new_app')
@section('kepeg','active')
@section('data-naik-pangkat','active')
<title>APK-KMK | Data Kenaikan Pangkat PNS Jabatan Fungsional Tertentu - Satpol PP & Damkar Tapin</title>
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
                    <h3 class="card-title mb-3"><Strong>Data Kenaikan Pangkat PNS Jabatan Fungsional Tertentu</Strong></h3>
                    <p>Merupakan Seluruh Data PNS yang Mengusulkan Kenaikan Pangkat Untuk Jabatan Fungsional Tertentu</p>
                    <a href="{{ route('cetak.rekap.ft',['4']) }}" class="btn btn-info"><i class='bx bxs-printer'></i> Cetak Laporan</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm datatables-basic ">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Pangkat/Gol Lama</th>
                                <th>Pangkat/Gol baru</th>
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
                            @foreach ($naikPangkat as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user_pegawai->nip }}</td>
                                <td>{{ $item->user_pegawai->name }}</td>
                                <td>{{ isset($item->user_pegawai->kepegawaian_pns->pangkat) ? $item->user_pegawai->kepegawaian_pns->pangkat : ' ' }} / {{ isset($item->user_pegawai->kepegawaian_pns->golongan) ? $item->user_pegawai->kepegawaian_pns->golongan : ' ' }}</td>
                                <td>{{ $item->pangkat_pns->nama_pangkat }} / {{ $item->gol_baru }}</td>
                                <td>{{ $item->tgl_usulan }}</td>
                                <td>{{ $item->naik_selanjutnya }}</td>
                                <td>{{ $item->ket }}</td>
                                <td>
                                    <a href="{{ route('usulan.res', $item->id) }}" class="btn btn-sm btn-primary"><i class='bx bxs-printer'></i></a>
                                   <a href="{{ route('approval.ft',[$item->id]) }}" class="btn btn-warning btn-sm">  <i class="bx bx-edit"></i></a>
                                   @if (auth()->user()->role == 'Admin')
                                   <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="/PNS/delete-usulan-kenaikan" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" name="id" value="{{$item->id}}" type="submit"><i class="bx bx-trash"></i></button>
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
                columnDefs:[],columnDefs:[{className:"control",orderable:!1,responsivePriority:2,searchable:!1,targets:0,
                        render:function(e,t,a,s){return""}},{targets:3,responsivePriority:4},{responsivePriority:1,targets:4},{targets:-1,title:"Actions",orderable:!1,searchable:!1}],
                order:[2,"desc"],
                dom:'<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength:8,lengthMenu:[],
                buttons:[],
                responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}}),type:"column",renderer:function(e,t,a){a=$.map(a,function(e,t){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!a&&$('<table class="table"/><tbody />').append(a)}}}}))
        $('.create-new').click(function(){
            var url = "{{ route('gaji.create') }}";
            location.href = url;
        });
    });

    </script>
@endsection

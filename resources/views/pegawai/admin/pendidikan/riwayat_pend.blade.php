@extends('layouts.new_app')
@section('main','active')
@section('profile_pegawai','active')
<title>SI-KMK | Riwayat Pendidikan - Satpol PP & Damkar Tapin</title>
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
                    <h3 class="card-title mb-3"><Strong>Riwayat Pendidikan </Strong></h3>
                    <div class="button-group">
                        <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm datatables-basic">
                        <thead class="text-center table-info">
                            <tr>
                                <th>No</th>
                                <th>NO Ijazah</th>
                                <th>Tanggal Ijazah</th>
                                <th>Tingkat Pendidikan</th>
                                <th>Lembaga Pendidikan</th>
                                <th>Jurusan</th>
                                <th>Kota</th>
                                <th>Tahun lulus</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                 $no = 1;
                            @endphp
                            @foreach ($pendidikan as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_ijazah }}</td>
                                <td>{{ $item->tgl_ijazah }}</td>
                                <td>{{ $item->tingkat_pendidikan }}</td>
                                <td>{{ $item->lembaga_pendidikan }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->kota }}</td>
                                <td>{{ $item->tahun_lulus }}</td>
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
                columnDefs:[],
                order:[],
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

@extends('layouts.new_app')
@section('kepeg','active')
@section('usul-berkala','active')
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
                {{-- <div class="card-header">
                    <form action="{{ route('print-tanggal') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <input type="date" class="form-control" name="tgl_pertama">
                            <input type="date" class="form-control" name="tgl_kedua">
                        </div>
                <button type="submit" class="btn btn-info">Cetak</button>
            </form>
            </div> --}}
                <div class="card-header">
                    <h3 class="card-title mb-3"><Strong>Data Kenaikan Gaji Berkala PNS</Strong></h3>
                    <hr>
                    <h4><strong>Riwayat Kenaikan Gaji Berkala PNS : {{ auth()->user()->name }} - {{ auth()->user()->nip }}</strong></h4><br>
                    <a href="{{ route('tambah.berkala',['new']) }}" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm datatables-basic">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Gaji Lama</th>
                                <th>Gaji Baru</th>
                                <th>Tanggal Diusulkan</th>
                                <th>Naik selanjutnya</th>
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
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user_pegawai->nip }}</td>
                                <td>{{ $item->user_pegawai->name }}</td>
                                <td>{{ isset($item->user_pegawai->kepegawaian_pns->gaji)?$item->user_pegawai->kepegawaian_pns->gaji:'' }}</td>
                                <td>{{ $item->gaji->gaji_pokok }}</td>
                                <td>{{ $item->tgl_usulan }}</td>
                                <td>{{ $item->naik_selanjutnya }}</td>
                                <td>{{ $item->ket }}</td>
                                <td>
                                    <a href="{{ route('print.usulan', $item->id) }}" class="btn btn-sm btn-primary"><i class='bx bxs-printer bx-tada' ></i></a>
                                   <a href="{{ route('tambah.berkala',[$item->id]) }}" class="btn btn-warning btn-sm">  <i class="bx bx-edit"></i></a>
                                   <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="{{ route('delete.berkala') }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" name="id" value="{{ $item->id }}"><i class="bx bx-trash"></i></button>
                                  </form>

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

    $(function(){
  $('#datepicker').datepicker();
});
    </script>
@endsection

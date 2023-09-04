@extends('layouts.new_app')
@section('dm','active')
@section('gaji','active')
<title>SI-KMK | Daftar Gaji Pokok PNS - Satpol PP & Damkar Tapin</title>
@section('css')
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/datatables.checkboxes.css" />
    <link rel="stylesheet" href="/sneat/libs/datatables-bs5/responsive.bootstrap5.css" />
@endsection
@section('content')
<div class="container">
            <!-- <div class="card mb-8">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title mb-3"><Strong>Data Gaji Pokok PNS</Strong></h3>
                        <a href="{{ route('gaji.create') }}" class="btn btn-success">Tambah Data</a>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Golongan</th>
                                <th>Masa Kerja</th>
                                <th>Gaji Pokok</th>
                                <th>Tahun Gaji</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                 $no = 1;
                            @endphp
                            @forelse ($gaji as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->golongan }}</td>
                                <td>{{ $item->masa_kerja }}</td>
                                <td>{{ $item->gaji_pokok }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>
                                   <a href="{{ route('gaji.edit', $item->id) }}" class="btn btn-warning btn-sm">  <i class="bx bx-edit"></i></a>
                                   <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="{{ route('gaji.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="bx bx-trash"></i></button>
                                  </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="4">Data Tidak Ada</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> -->

      <div class="card">
        <div class="card-datatable table-responsive p-2">
          <table class="datatables-basic table table-striped border-top">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th>id</th>
                <th>No</th>
                <th>Golongan</th>
                <th>Masa Kerja</th>
                <th>Gaji Pokok</th>
                <th>Tahun Gaji</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($gaji as $no => $item)
                <tr><td></td>
                    <td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ ++$no }}</td>
                    <td>{{ $item->golongan }}</td>
                    <td>{{ $item->masa_kerja }}</td>
                    <td>{{ $item->gaji_pokok }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                       <a href="{{ route('gaji.edit', $item->id) }}" class="btn btn-warning btn-sm">  <i class="bx bx-edit"></i></a>
                       <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="{{ route('gaji.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"><i class="bx bx-trash"></i></button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
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
                        render:function(e,t,a,s){return""}},{targets:1,orderable:!1,responsivePriority:3,searchable:!1,checkboxes:!0,checkboxes:{selectAllRender:'<input type="checkbox" class="form-check-input">'},
                        render:function(){return'<input type="checkbox" class="dt-checkboxes form-check-input">'}},{targets:2,searchable:!1,visible:!1},{targets:3,responsivePriority:4},{responsivePriority:1,targets:4},{targets:-1,title:"Actions",orderable:!1,searchable:!1}],
                order:[[2,"asc"]],
                dom:'<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength:7,lengthMenu:[7,10,25,50,75,100],
                buttons:[
                        {text:'<i class="bx bx-plus me-1"></i> <span class="d-none d-lg-inline-block">Tambah Data</span>',className:"create-new btn btn-primary"}],
                responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}}),type:"column",renderer:function(e,t,a){a=$.map(a,function(e,t){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!a&&$('<table class="table"/><tbody />').append(a)}}}}),$("div.head-label").html('<h5 class="card-title mb-0">Data Gaji Pokok PNS</h5>'))
        $('.create-new').click(function(){
            var url = "{{ route('gaji.create') }}";
            location.href = url;
        });
    });

    </script>
@endsection

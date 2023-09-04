@extends('layouts.new_app')
@section('main','active')
@section('daftar','active')
<title>Apk-KMK | Arsip Dokumen - Satpol PP & Damkar Tapin</title>
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
                    <h3 class="card-title mb-3"><Strong>Arsip Dokumen</Strong></h3>
                    <a href="{{ route('dokumen.create',['new']) }}" class="btn btn-success">Tambah Dokumen</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm datatables-basic">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>No</th>
                                <th>Nomor Dokumen</th>
                                <th>Nama Dokumen</th>
                                <th>Jenis Dokumen</th>
                                <th>Tahun Dokumen</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                 $no = 1;
                            @endphp
                            @forelse ($dokumen as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dok }}</td>
                                <td>{{ $item->nama_Dok }}</td>
                                <td>{{ $item->jenis_dok }}</td>
                                <td>{{ $item->tahun_dok }}</td>
                                <td>{{ $item->tgl_upload }}</td>
                                <td>
                                    <a href="{{ route('dokumen.create',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    <?php
                                        $file = "";
                                        if(file_exists( base_path()."/public/storage/uploads/dokumen/".$item->id.".pdf")){
                                            $url = urldecode("/dokumen/".$item->id.".pdf");
                                            $file = '<button type="button" class="downloadable btn-xs btn-primary" data-path="'.$url.'" data-name="file.pdf">download</button>';
                                        }
                                    ?>
                                    {!! $file !!}
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
<form method="post" action="/download" id="download" target="_BLANK">
    @csrf
    <input type="hidden" name="preview" value="1">
    <input type="hidden" name="downloadpath">
    <input type="hidden" name="downloadname">
</form>
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

<script type="text/javascript">
    $('.downloadable').click(function(){
        $('input[name=downloadpath]').val(this.dataset.path);
        $('input[name=downloadname]').val(this.dataset.name);
        console.log(this.dataset);
        $('#download').submit();
    });
</script>

<script>
    function PreviewImage() {
    pdffile=document.getElementById("uploadPDF").files[0];
    pdffile_url=URL.createObjectURL(pdffile);
    $('#viewer').attr('src',pdffile_url);
}
</script>

@endsection

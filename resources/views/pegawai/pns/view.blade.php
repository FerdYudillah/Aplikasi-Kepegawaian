@extends('layouts.new_app')
@section('main','active')
@section('profile_pegawai','active')
<title>SI-KMK | Profile PNS - Satpol PP & Damkar Tapin</title>
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
                <div class="card-body">
                    <div class="button-group">
                        <a href="{{ route('get.padaringan') }}" class="btn btn-warning me-2 mb-4"  tabindex="0"><i class='bx bx-shape-square bx-flip-horizontal' ></i> Ambil Data Padaringan</a>
                        <a href="{{ route('print.pegawai', $user->id) }}" class="btn btn-Danger me-2 mb-4"  tabindex="0"><i class='bx bxs-file-pdf' ></i>Print Data Pegawai</a>
                    </div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Data Pribadi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Data Kepegawaian</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Data Keluarga</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-testing-tab" data-bs-toggle="pill" data-bs-target="#pills-testing" type="button" role="tab" aria-controls="pills-testing" aria-selected="false">Data Diklat</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-testing-tab" data-bs-toggle="pill" data-bs-target="#tab_preview" type="button" role="tab" aria-controls="pills-testing" aria-selected="false">Preview</button>
                        </li> --}}

                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        @include('pegawai.pns.tab_pane.tab_pribadi')
                        @include('pegawai.pns.tab_pane.tab_kepegawaian')
                        @include('pegawai.pns.tab_pane.tab_keluarga')
                        @include('pegawai.pns.tab_pane.tab_diklat')
                        {{-- @include('pegawai.pns.tab_pane.tab_preview') --}}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var form = $('.print'),
            cache_width = form.width(),
            a4 = [595.28, 841.89]; // for a4 size paper width and height

            $('#create_pdf').on('click', function () {
                $('body').scrollTop(0);
                createPDF();
            });

            function createPDF() {
                getCanvas().then(function (canvas) {
                    var
                     img = canvas.toDataURL("image/png"),
                     doc = new jsPDF({
                         unit: 'px',
                         format: 'a4'
                     });
                    doc.addImage(img, 'JPEG', 20, 20);
                    doc.save('profile.pdf');
                    form.width(cache_width);
                });
            }

            function getCanvas() {
                form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }
        });
    </script>
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
@endsection --}}

@extends('layouts.new_app')
@section('home' ,'active')
@section('css')
    <link rel="stylesheet" href="/sneat/libs/toastr/toastr.css" />
@endsection
@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header"><h4><strong>{{ __('Home') }}</strong></h4></div>
        <div class="card-body">
            <p class="mb-0">
                <center>
                <img src="{{ asset('/picture/logo.png') }}" width="400" height="200" ><br>
                <h4>Aplikasi Kepegawaian dan Manajemen Kearsipan (Apk-KMK)<br>Dinas Satuan Polisi Pamong Praja dan Damkar Tapin</h4>
              </p>
            </center>
        </div>
    </div>
    @if (auth()->user()->role == 'Admin')
    <div class="card mb-3">
        <div class="card-header"><h3 class="text-danger"><i class="bx bxs-bell bx-tada"></i> Pemberitahuan..</h3></div>
        <div class="card-body">
            @foreach($reminderPangkat as $p)
            <div class="alert alert-danger my-4">
              <strong><i class="bx bxs-bell bx-tada"></i></strong> {{ $p->name }} - NIP:{{ $p->nip }} Sudah Waktunya Naik Pangkat <strong>{{ $p->jabatan }}</strong> pada tanggal {{ $p->naik_selanjutnya }}. .
              <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="/Admin/hapus-reminder" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger btn-sm float-end" type="submit" name="id" value="{{ $p->id }}"><i class="bx bx-trash"></i></button>
              </form>
            </div>
        @endforeach
        <hr>
        @foreach($reminderGaji as $p)
        <div class="alert alert-secondary my-4">
          <strong><i class="bx bxs-bell bx-tada"></i></strong> {{ $p->name }} - NIP:{{ $p->nip }} Sudah Waktunya Gaji Berkala pada tanggal <strong>{{ $p->naik_selanjutnya }}</strong>. <strong><a class="alert-link" href="https://boxicons.com/" target="_blank" rel="noopener noreferrer">.
          <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="/Admin/hapus-reminder-berkala" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm float-end" type="submit" name="id" value="{{ $p->id }}"><i class="bx bx-trash"></i></button>
        </form>
    </div>
    @endforeach
        </div>
    </div>



    <div class="card mb-3">
        <div class="card-body">
            <p><h3>Data Kenaikan Pangkat :</h3></p>
            @foreach($kenaikan_pangkat as $p)
        <div class="alert alert-info my-4">
          <strong><i class="bx bxs-bell bx-tada"></i></strong> {{ $p->name }} - NIP:{{ $p->nip }} telah submit kenaikan pangkat <strong>{{ $p->jabatan }}</strong> pada tanggal {{ $p->tgl_usulan }}. <strong><a class="alert-link" href="https://boxicons.com/" target="_blank" rel="noopener noreferrer"><br>Silahkan klik menuju <a href="{{ str_replace('index','approval',$p->link_approve) }}/{{ $p->id }}">Approval</a>/<a href="{{ $p->link_approve }}">List Approval</a></strong>.
        </div>
    @endforeach
        <hr>
        <p><h3>Data Kenaikan Gaji berkala :</h3></p>
    @foreach($kenaikan_berkala as $d)
    <div class="alert alert-warning my-4">
      <strong><i class="bx bxs-bell bx-tada"></i></strong> {{ $d->name }} - NIP:{{ $d->nip }} telah submit kenaikan Gaji Berkala  pada tanggal {{ $p->tgl_usulan }}. <strong><a class="alert-link" href="https://boxicons.com/" target="_blank" rel="noopener noreferrer"><br>Silahkan klik menuju <a href="{{ route('approval.berkala.admin',[$d->id]) }}">Approval</a>/<a href="{{ route('berkala.admin') }}">List Approval</a></strong>.
    </div>
@endforeach
        </div>
    </div>
    @endif
</div>
@endsection
@section('js')
    <script src="/sneat/libs/toastr/toastr.js"></script>
@endsection

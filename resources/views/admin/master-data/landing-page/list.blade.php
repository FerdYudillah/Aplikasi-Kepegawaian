@extends('layouts.new_app')
@section('dm','active')
@section('landing','active')
<title>SI-KMK | Landing Page Settings - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <!-- Grid Card -->
    <h2 class="pb-1 mb-4 text-muted">Landing Page List <a href="/Admin/landing-page/new" class="btn btn-success"> <i class="tf-icons bx bx-plus"></i>Tambah Data</a></h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach($list as $l)
          <div class="col">
            <div class="card h-100">
              <img class="card-img-top" src="/storage/uploads/landing_page/{{ $l->foto_landing_page }}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">{{ $l->tittle }}
                    <form onsubmit="return confirm('Yakin Mau Hapus Data??')" action="/Admin/landing-page-delete" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn rounded-pill btn-icon btn-danger float-end ms-1" name="id" value="{{ $l->id }}">
                            <span class="tf-icons bx bx-trash"></span>
                        </button>
                    </form>
                    <a href="/Admin/landing-page/{{ $l->id }}" class="btn rounded-pill btn-icon btn-primary float-end ms-1">  <i class="tf-icons bx bx-edit"></i></a>
                </h5>
                <p class="card-text">{{ $l->deskripsi }}</p>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>
@endsection

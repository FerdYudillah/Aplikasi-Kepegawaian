@extends('layouts.new_app')
@section('dm','active')
@section('landing','active')
<title>SI-KMK | Tambah Data Gaji - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Tambah Data Landing Page</strong></h3>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="mb-3">
                                    <label for="tittle" class="form-label">Tittle</label>
                                    <input class="form-control @error('tittle') is-invalid @enderror" type="text" id="tittle" name="tittle" placeholder="Isi Title" value="{{ isset($data->tittle)?$data->tittle : old('title') }}"/>
                                    @error('tittle')
                                        <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Isi Deskripsi">{{ isset($data->deskripsi)?$data->deskripsi : old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback mb-3">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/Admin/landing-pages" class="btn btn-danger">Kembali</a>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="mb-3">
                                    <label for="foto_landing_page" class="form-label">Foto</label>
                                    <input class="form-control @error('foto_landing_page') is-invalid @enderror" type="file" id="foto_landing_page" name="foto_landing_page"  onchange="previewImage()" accept="image/*"/>
                                </div>
                                @error('foto_landing_page')
                                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <?php
                                        $file = isset($data->foto_landing_page)?$data->foto_landing_page:'new';
                                    ?>
                                    @if (file_exists(public_path().'/storage/uploads/landing_page/'.$file))
                                      <img src="/storage/uploads/landing_page/{{ $file }}" alt="user-avatars" class="d-block img-preview img-fluid " />
                                    @else
                                        <img class="img-preview img-fluid mb-3">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
      function previewImage(){
        const foto = document.querySelector('#foto_landing_page');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endsection

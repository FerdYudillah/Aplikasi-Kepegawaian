@extends('layouts.new_app')
<title>SI-KMK | Settings - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Settings Akun</strong></h3>
                    </div>
                    <form action="{{route('pegawai.update', $user->id)}}" method="POST">
                        {{-- @dd($user->email); --}}
                        @method('PUT')
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="text"id="password" name="password" value=""/>
                            </div>
                         </div>
                         <button type="submit" class="btn btn-success ">Update Akun</button>
                         <a href="{{ route('home') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action="{{ route('update.foto', $user->id) }}" method="POST" enctype="multipart/form-data">
        {{-- @method('put') --}}
        @csrf
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                @if (file_exists(public_path().'/images/'.$user->id.'.png'))
                  <img src="/images/{{ $user->id }}.png" alt="user-avatar" class="d-block rounded" height="130" width="100" id="uploadedAvatar" />
                @else
                    <img src="/placeholder.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                @endif
                <div class="button-wrapper">
                    <label for="foto">Foto</label>
                    <input type="hidden" name="oldFoto" value="{{ $user->foto }}">
                    <img class="img-preview img-fluid mb-3 col-sm-2">
                    <input type="file" class="form-control col-4 @error('foto') is-invalid @enderror" id="foto" name="foto"  onchange="previewImage()" accept="image/*" >
                    @error('foto')
                        <div class="invalid-feedback">
                         {{ $message }}
                         </div>
                     @enderror
                     <button type="submit" class="btn btn-info btn-sm mt-2">Simpan</button>
                </div>
            </div>
        </div>
        </form>
          <hr class="my-0" />
          <form action="{{ route('update.pegawai', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="nip" class="form-label">NIP</label>
                <input class="form-control @error('nip') is-invalid @enderror" type="text"id="nip" name="nip" value="{{ $user->nip }}"/>
                @error('nip')
                    <div class="invalid-feedback">
                     {{ $message }}
                     </div>
                 @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text"id="name" name="name" value="{{ $user->name }}"/>
            </div>
            <div class="mb-3 col-md-6 ">
                <label for="email" class="form-label">Tempat, Tanggal lahir</label>
                <div class="d-flex">
                    <input class="form-control" name="t_lahir" value="{{ $user->t_lahir }}"/>
                    <p>,</p>
                    <input class="form-control" type="date"  name="tgl_lahir" value="{{ $user->tgl_lahir }}" />
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input class="form-control" type="text" id="jenis_kelamin" name="jenis_kelamin" value="{{ $user->jenis_kelamin }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="nohp" class="form-label">No HP/WA</label>
                <input class="form-control" type="text"id="nohp" name="nohp" value="{{ $user->nohp }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text"id="email" name="email" value="{{ $user->email }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input class="form-control" type="text"id="alamat" name="alamat" value="{{ $user->alamat }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="agama" class="form-label">Agama</label>
                <input class="form-control" type="text"id="agama" name="agama" value="{{ $user->agama }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="status_kawin" class="form-label">Status Menikah</label>
                <input class="form-control" type="text"id="status_kawin" name="status_kawin" value="{{ $user->status_kawin }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                <input class="form-control" type="text"id="pendidikan" name="pendidikan" value="{{ $user->pendidikan }}"/>
                <a href="{{ route('riwayat.pend') }}">[Riwayat pendidikan]</a>
            </div>
            <div class="mb-3 col-md-6">
                <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                <input class="form-control" type="text"id="jumlah_anak" name="jumlah_anak" value="{{ $user->jumlah_anak }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="nik" class="form-label">NIK</label>
                <input class="form-control" type="text"id="nik" name="nik" value="{{ $user->nik }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_kk" class="form-label">Nomor KK</label>
                <input class="form-control" type="text"id="no_kk" name="no_kk" value="{{ $user->no_kk }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_rek" class="form-label">Nomor Rekening</label>
                <input class="form-control" type="text"id="no_rek" name="no_rek" value="{{ $user->no_rek }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="npwp" class="form-label">NPWP</label>
                <input class="form-control" type="text"id="npwp" name="npwp" value="{{ $user->npwp }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_bpjs" class="form-label">Nomor BPJS</label>
                <input class="form-control" type="text"id="no_bpjs" name="no_bpjs" value="{{ $user->no_bpjs }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_karsu" class="form-label">Nomor Karsu</label>
                <input class="form-control" type="text"id="no_karsu" name="no_karsu" value="{{ $user->no_karsu }}"/>
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control @error('password')
                        is-invalid
                    @enderror"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
              </div>
        </div>
    </div>
        <button type="submit" class="btn btn-success ">Update Data Pribadi</button>
        {{-- <a href="{{ route('pegawai.edit',$user->id) }}" class="btn btn-warning">Edit Data Pegawai</a> --}}
    </form>
</div>

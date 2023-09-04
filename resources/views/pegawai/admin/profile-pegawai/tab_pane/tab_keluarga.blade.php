<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <form action="" method="POST">
    @method('put')
    @csrf
    <div class="row">
        <p class="mb-4"><strong>Data Suami/Istri :</strong></p>
        <div class="mb-3 col-md-6">
            <label for="nama_si" class="form-label">Nama Suami/Istri</label>
            <input class="form-control @error('nama_si') is-invalid @enderror" type="text"id="nama_si" name="nama_si" value="{{ isset($user->suami_istri->nama_si) ? $user->suami_istri->nama_si : ' ' }}"/>
            @error('nama_si')
                <div class="invalid-feedback">
                 {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="status_si" class="form-label">Status</label>
            <input class="form-control @error('status_si') is-invalid @enderror" type="text"id="status_si" name="status_si" value="{{ isset($user->suami_istri->status_si) ? $user->suami_istri->status_si : ' ' }}"/>
            @error('status_si')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
             @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input class="form-control @error('pekerjaan') is-invalid @enderror" type="text"id="pekerjaan" name="pekerjaan" value="{{ isset($user->suami_istri->pekerjaan) ? $user->suami_istri->pekerjaan : ' ' }}"/>
            @error('pekerjaan')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
             @enderror
        </div>
        <div class="mb-3 col-md-6 ">
            <label for="email" class="form-label">Tempat, Tanggal lahir Suami/Istri</label>
            <div class="d-flex">
                <input class="form-control @error('t_lahir') is-invalid @enderror" name="t_lahir" value="{{ isset($user->suami_istri->t_lahir) ? $user->suami_istri->t_lahir : ' ' }}"/>
                @error('t_lahir')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                 @enderror
                <p>,</p>
                <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date"  name="tgl_lahir" value="{{ isset($user->suami_istri->tgl_lahir) ? $user->suami_istri->tgl_lahir : ' ' }}" />
                @error('tgl_lahir')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                 @enderror
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="status_tunjangan" class="form-label">Status Tunjangan</label>
            <input class="form-control @error('status_tunjangan') is-invalid @enderror" type="text"id="status_tunjangan" name="status_tunjangan" value="{{ isset($user->suami_istri->status_tunjangan) ? $user->suami_istri->status_tunjangan : ' ' }}"/>
            @error('status_tunjangan')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="umur" class="form-label">Umur </label>
            <input class="form-control @error('umur') is-invalid @enderror" type="text"id="umur" name="umur" value="{{ isset($user->suami_istri->umur) ? $user->suami_istri->umur : ' ' }}"/>
            @error('umur')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="no_hp" class="form-label">No HP/WA </label>
            <input class="form-control @error('no_hp') is-invalid @enderror" type="text"id="no_hp" name="no_hp" value="{{ isset($user->suami_istri->no_hp) ? $user->suami_istri->no_hp : ' ' }}"/>
            @error('no_hp')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
    </div>

</form>
    <div class="row">
        <hr class="dropdown-divider">
        <p class="mb-4"><strong>Data Anak :</strong></p>
        <table class="table table-bordered table-sm">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>Status Anak</th>
                    <th>Umur</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Status Tunjangan</th>

                </tr>
            </thead>
            <tbody>
                @php
                     $no = 1;
                @endphp
                @forelse ($user->anak_pns as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_anak }}</td>
                    <td>{{ $item->status_anak }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->t_lahir }}, {{ $item->tgl_lahir }}</td>
                    <td>{{ $item->status_tunjangan }}</td>
                    
                </tr>
                @empty
                <td colspan="4">Data Tidak Ada</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

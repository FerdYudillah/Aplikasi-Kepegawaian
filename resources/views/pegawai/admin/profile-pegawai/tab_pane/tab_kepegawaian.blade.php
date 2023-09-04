
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form action="" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="mb-3 col-md-6 ">
                <label for="email" class="form-label">Pangkat, Golongan</label>
                <div class="d-flex">
                    <input class="form-control" name="pangkat" value="{{ isset($user->kepegawaian_pns->pangkat) ? $user->kepegawaian_pns->pangkat : ' ' }}"/>
                    <p>,</p>
                    <input class="form-control"  name="golongan" value="{{ isset($user->kepegawaian_pns->golongan) ? $user->kepegawaian_pns->golongan : ' ' }}" />
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input class="form-control" type="text"id="jabatan" name="jabatan" value="{{ isset($user->kepegawaian_pns->jabatan) ? $user->kepegawaian_pns->jabatan : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="jenis_jabatan" class="form-label">Jenis Jabatan</label>
                <input class="form-control" type="text"id="jenis_jabatan" name="jenis_jabatan" value="{{ isset($user->kepegawaian_pns->jenis_jabatan) ? $user->kepegawaian_pns->jenis_jabatan : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="sts_pegawai" class="form-label">Status Pegawai</label>
                <input class="form-control" type="text"id="status_pegawai" name="status_pegawai" value="{{ isset($user->kepegawaian_pns->status_pegawai) ? $user->kepegawaian_pns->status_pegawai : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                <input class="form-control" type="text"id="masa_kerja" name="masa_kerja" value="{{ isset($user->kepegawaian_pns->masa_kerja) ? $user->kepegawaian_pns->masa_kerja : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="gaji" class="form-label">Gaji</label>
                <input class="form-control" type="text"id="gaji" name="gaji" value="{{ isset($user->kepegawaian_pns->gaji) ? $user->kepegawaian_pns->gaji : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="satuan_kerja" class="form-label">Satuan Kerja</label>
                <input class="form-control" type="text"id="satuan_kerja" name="satuan_kerja" value="{{ isset($user->kepegawaian_pns->satuan_kerja) ? $user->kepegawaian_pns->satuan_kerja : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="satuan" class="form-label">Satuan</label>
                <input class="form-control" type="text"id="satuan" name="satuan" value="{{ isset($user->kepegawaian_pns->satuan) ? $user->kepegawaian_pns->satuan : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="nomor_sk_cpns" class="form-label">Nomor SK CPNS</label>
                <input class="form-control" type="text"id="nomor_sk_cpns" name="nomor_sk_cpns" value="{{ isset($user->kepegawaian_pns->nomor_sk_cpns) ? $user->kepegawaian_pns->nomor_sk_cpns : ' ' }}"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="tgl_sk_cpns" class="form-label">Tanggal SK CPNS</label>
                <input class="form-control @error('tgl_sk_cpns') is-invalid @enderror" type="date"id="tgl_sk_cpns" name="tgl_sk_cpns" value="{{ isset($user->kepegawaian_pns->tgl_sk_cpns) ? $user->kepegawaian_pns->tgl_sk_cpns : ' ' }}"/>
                @error('tgl_sk_cpns')
                    <div class="invalid-feedback">
                     {{ $message }}
                     </div>
                 @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="nomor_sk_pns" class="form-label">Nomor SK PNS</label>
                <input class="form-control @error('nomor_sk_pns') is-invalid @enderror" type="text"id="nomor_sk_pns" name="nomor_sk_pns" value="{{ isset($user->kepegawaian_pns->nomor_sk_pns) ? $user->kepegawaian_pns->nomor_sk_pns : ' ' }}"/>
                @error('nomor_sk_pns')
                    <div class="invalid-feedback">
                     {{ $message }}
                     </div>
                 @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="tgl_sk_pns" class="form-label">Tanggal SK PNS</label>
                <input class="form-control @error('tgl_sk_pns') is-invalid @enderror" type="date"id="tgl_sk_pns" name="tgl_sk_pns" value="{{ isset($user->kepegawaian_pns->tgl_sk_pns) ? $user->kepegawaian_pns->tgl_sk_pns : ' ' }}"/>
                @error('tgl_sk_pns')
                    <div class="invalid-feedback">
                     {{ $message }}
                     </div>
                 @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="no_karpeg" class="form-label">Nomor Karpeg</label>
                <input class="form-control @error('no_karpeg') is-invalid @enderror" type="text"id="no_karpeg" name="no_karpeg" value="{{ isset($user->kepegawaian_pns->no_karpeg) ? $user->kepegawaian_pns->no_karpeg : ' ' }}"/>
                @error('no_karpeg')
                    <div class="invalid-feedback">
                     {{ $message }}
                     </div>
                 @enderror
            </div>
        </div>
    </form>
</div>

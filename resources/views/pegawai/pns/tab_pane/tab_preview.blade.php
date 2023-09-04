<div class="tab-pane fade show active" id="tab_preview" role="tabpanel" aria-labelledby="pills-preview-tab">

    <button type="button" class="btn btn-info btn-sm mb-2" id="create_pdf">Print</button>
    <div class="card py-4 px-4 print">
        <div class="row">
            <div class="col-md-1">
              <img src="/1.png" alt="Avatar" class="rounded" height="100" width="100">
            </div>
            <div class="col-md-11">
                <div class="text-center fs-5">PEMERINTAH KABUPATEN TAPIN</div>
                <div class="text-center fs-5"><b>DINAS SATUAN POLISI PAMONG PRAJA &</b></div>
                <div class="text-center fs-5"><b>DAMKAR TAPIN</b></div>
                <div class="text-center fs-6">Jalan Brigjen H. Hassan Basry No. 22, Kode Pos 71111, RANTAU</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">_______________________________________________________________________________</div>
        </div>
        <div class="row py-4">
            <div class="col-md-12 text-center"><b>PROFILE PEGAWAI</b></div>
        </div>
        <div class="row py-1">
            <div class="col-md-12">Mengetahui Bahwa pegawai dibawah ini merupakan Pegawai Dinas Satuan Polisi Pamong Praja</div>
        </div>
        <div class="row py-1 pb-4">
            <div class="col-md-12">& Pemadam Kebakaran Tapin Yang bernama :</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">NIP</div><div class="col-md-1">:</div><div class="col-md-8">{{ $user->nip ?: 'Not Filled' }}</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">Nama</div><div class="col-md-1">:</div><div class="col-md-8">{{ $user->name ?: 'Not Filled'}}</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">Jenis Kelamin</div><div class="col-md-1">:</div><div class="col-md-8">{{ $user->jenis_kelamin ?: 'Not Filled' }}</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">Tempat, Tanggal Lahir</div><div class="col-md-1">:</div><div class="col-md-8">{{ $user->t_lahir  ?: 'Not Filled'}}, {{ $user->tgl_lahir ?: 'Not Filled'}}</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">Jabatan</div><div class="col-md-1">:</div><div class="col-md-8">{{ isset($user->kepegawaian_pns->jabatan) ? $user->kepegawaian_pns->jabatan : 'Not Filled' }}</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">Pangkat/Golongan</div><div class="col-md-1">:</div><div class="col-md-8">{{ isset($user->kepegawaian_pns->pangkat) ? $user->kepegawaian_pns->pangkat : 'Not Filled' }}/{{ isset($user->kepegawaian_pns->golongan) ? $user->kepegawaian_pns->golongan : 'Not Filled' }}</div>
        </div>
        <div class="row ps-2 py-1">
            <div class="col-md-3">Masa Kerja</div><div class="col-md-1">:</div><div class="col-md-8">{{ isset($user->kepegawaian_pns->masa_kerja) ? $user->kepegawaian_pns->masa_kerja : 'Not Filled' }}</div>
        </div>
        <div class="row ps-2 py-1 pb-5">
            <div class="col-md-3">Status Pegawai</div><div class="col-md-1">:</div><div class="col-md-8">{{ isset($user->kepegawaian_pns->satuan_kerja) ? $user->kepegawaian_pns->satuan_kerja : 'Not Filled' }}</div>
        </div>

        <div class="row mb-8 pt-5">
            <div class="col-md-4 offset-md-8">
                <div class="p-8">Mengetahui</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-8">
                {{-- <div class="py-1 pb-5">Kepala Satuan</div>
                <div class="pt-5">{{ $qbkepalasatuan->name ?: 'Not Filled' }}</div>
                <div class="py-1">{{ $qbkepalasatuan->pangkat ?: 'Not Filled' }}/{{ $qbkepalasatuan->golongan ?: 'Not Filled' }}</div>
                <div class="py-1">NIP. {{ $qbkepalasatuan->nip ?: 'Not Filled' }}</div> --}}
            </div>
        </div>
    </div>
</div>

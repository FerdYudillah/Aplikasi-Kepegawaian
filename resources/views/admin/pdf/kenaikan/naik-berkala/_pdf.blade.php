<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Daftar PNS</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }
         td,
         th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
            tr:nth-child(even) {
            background-color: #dddddd;
            }
        .footer{
            position: fixed;
            bottom: 0;
            right: 0;
            height: 50px;
            text-align: right;
            font-size: 12px;
            color: #000;
        }
    </style>
</head>
<body>
    <table style="width: 90%;">
        <tr >
            <td><img src="{{ public_path('satpol.png') }}" width="80" height="80"></td>
            {{-- <td><img src="\image\Logo Satpol.png" width="80" height="80"></td> --}}
            <td>
                <center>
                    <font size="4">PEMERINTAH KABUPATEN TAPIN</font><br>
                    <font size="4"><b>SATUAN POLISI PAMONG PRAJA DAN KEBAKARAN</b></font><br>
                    <font size="2"><i>Jl.Brigjend H. Hasan Baseri RT.01 (Ex. SDN Rantau Kiwa 1) Kelurahan Rantau kiwa</i></font><br>
                    <font size="2"><i>Posel : pamongpraja.tapin@gmail.com</i></font><br>
                    <font size="2"><i>RANTAU                        Kode Pos: 71111</i></font>
                </center>
                </td>
        </tr>
    </table>
    <hr>
    <h2 style="text-align: center">REKAP KENAIKAN GAJI BERKALA PNS SATPOL PP </h2>
    <p style="text-align: right">Tanggal : Rantau,<small> <?php echo date('d-m-y'); ?></p>
    <br>
    <table class="table-sm">
        <tr>
            <th>NO.</th>
            <th>NAMA PNS</th>
            <th>NIP</th>
            <th>PANGKAT|GOLONGAN</th>
            <th>JABATAN</th>
            <th>GAJI LAMA</th>
            <th>GAJI BARU</th>
            <th>MULAI TANGGAL</th>

        </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($naikBerkala as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $item->user_pegawai->nip }}</td>
        <td>{{ $item->user_pegawai->name }}</td>
        <td>{{ isset($item->user_pegawai->kepegawaian_pns->pangkat)?$item->user_pegawai->kepegawaian_pns->pangkat:'' }} - {{ isset($item->user_pegawai->kepegawaian_pns->golongan)?$item->user_pegawai->kepegawaian_pns->golongan:'' }}</td>
        <td>{{ isset($item->user_pegawai->kepegawaian_pns->jabatan)?$item->user_pegawai->kepegawaian_pns->jabatan:'' }}</td>
        <td>Rp.{{ isset($item->user_pegawai->kepegawaian_pns->gaji)?$item->user_pegawai->kepegawaian_pns->gaji:'' }}</td>
        <td>Rp.{{ $item->gaji->gaji_pokok }}</td>
        <td>{{ $item->mulai_tanggal }}</td>

    </tr>
@endforeach
    </table>

    <div style="display: flex;">
        <div style="float: right;margin-right: 4rem;">
            <br><br>
            @foreach ($kepala as $item)
            <p>Kepala Satuan <br>{{ $item->name }}<br>{{ $item->pangol }}<br>NIP. {{ $item->nip }}</p>
            @endforeach
        </div>
    </div>

</body>
 </html>

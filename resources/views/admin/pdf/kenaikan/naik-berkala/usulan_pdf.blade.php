<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    {{-- <style>
        table {
            font-family: arial, sans-serif;
            /* border-collapse: collapse; */
            width: 100%;
            }
         td,
         th {
            /* border: 1px solid #dddddd; */
            text-align: left;
            padding: 8px;
        }
            tr:nth-child(even) {
            /* background-color: #dddddd; */
            }
            </style> --}}
</head>
<body>
    <table style="width: 90%;">
        <tr>
            <td><img src="{{ public_path('lambang.jpg') }}" width="80" height="80"></td>
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
    <div style="display: flex;">
        <div style="float: right;margin-right: 4rem;">
            <?php echo date('d F Y'); ?>
        </div>
    </div>
<div class="page">
    <table style="margin-top: 20px">
        <tr>
            <td style="width: 100px;">Nomor</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>1 (satu) berkas</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td>Usul Kenaikan Gaji Berkala</td>
        </tr>
    </table>
    <div style="display: flex;">
        <div style="float: right;margin-right: 4rem;">
    <table>
        <tr>
            <td>Yth.Bupati Tapin</td>
        </tr>
        <tr>
            <td>Up. Kepala Badan Kepegawaian</td>
        </tr>
        <tr>
            <td>dan Pengembangan SDM</td>
        </tr>
        <tr>
            <td>Kabupaten Tapin</td>
        </tr>
        <tr>
            <td>Di-</td>
        </tr>
        <tr>
            <td>Rantau</td>
        </tr>
    </table>
</div>
</div>
</div>
<br><br><br><br><br><br><br>
<div style="display: flex;">
    <div style="float: left;margin-left: 3rem;">
    <table>
        <tr>
            <td>Dengan Hormat,</td>
        </tr>
    </table>
</div>
<br>
<table>
    <tr>
        <td>Bersama dengan ini disampaikan Usul Pemberitahuan Permintaan Kenaikan Gaji Berkala adalah Sebagai Berikut :</td>
    </tr>
</table>
<br>
<table>
    @foreach ($naikBerkala as $jb)
    <tr>
        <td >1.</td>
        <td style="width: 200;">Nama</td>
        <td style="width: 10;">:</td>
        <td>{{ $jb->user_pegawai->name }}</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Tempat Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $jb->user_pegawai->t_lahir }}.{{ $jb->user_pegawai->tgl_lahir }}</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>NIP</td>
        <td>:</td>
        <td>{{ $jb->user_pegawai->nip }}</td>
    </tr>
    <tr>
        <td>4.</td>
        <td>Pangkat/Gol.Ruang</td>
        <td>:</td>
        <td>{{ isset($jb->user_pegawai->kepegawaian_pns->pangkat)?$jb->user_pegawai->kepegawaian_pns->pangkat:'' }}/{{ isset($jb->user_pegawai->kepegawaian_pns->golongan)?$jb->user_pegawai->kepegawaian_pns->golongan:'' }}</td>
    </tr>
    <tr>
        <td>5.</td>
        <td>Jabatan Pekerjaan</td>
        <td>:</td>
        <td>{{ isset($jb->user_pegawai->kepegawaian_pns->jabatan)?$jb->user_pegawai->kepegawaian_pns->jabatan:'' }}</td>
    </tr>
    <tr>
        <td>6.</td>
        <td>Kesatuan Kerja</td>
        <td>:</td>
        <td>{{ isset($jb->user_pegawai->kepegawaian_pns->satuan_kerja)?$jb->user_pegawai->kepegawaian_pns->satuan_kerja:'' }}</td>
    </tr>
    <tr>
        <td>7.</td>
        <td>Kantor/Instansi</td>
        <td>:</td>
        <td>Satuan Polisi Pamong Praja dan Kebakaran Kabupaten Tapin</td>
    </tr>
    <br>
    <tr>
        <td>8.</td>
        <td>Keputusan Dari</td>
        <td>:</td>
        <td>Bupati Tapin</td>
    </tr>
    @endforeach
</table>
<div style="display: flex;">
    <div style="float: left;margin-left: 1rem;">
    <table>
        <tr>
            <td>a)</td>
            <td style="width: 188;">Nomor</td>
            <td  style="width: 10;">:</td>
        </tr>
        <tr>
            <td>b)</td>
            <td>Tanggal</td>
            <td>:</td>
        </tr>
        <tr>
            <td>c)</td>
            <td>Terhitung Mulai Tgl.</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>d)</td>
            <td>Masa Kerja</td>
            <td>:</td>
            <td>{{ isset($jb->user_pegawai->kepegawaian_pns->masa_kerja)?$jb->user_pegawai->kepegawaian_pns->masa_kerja:'' }} 00 bulan</td>
        </tr>
        <tr>
            <td>e)</td>
            <td>Gaji Pokok</td>
            <td>:</td>
            <td>Rp. {{ isset($jb->user_pegawai->kepegawaian_pns->gaji)?$jb->user_pegawai->kepegawaian_pns->gaji:'' }}</td>
        </tr>
    </table>
</div>
</div>
<br><br><br><br><br><br>
<table>
    <tr>
        <td>9.</td>
        <td style="width: 200;">Kenaikan Gaji berkala yang diminta</td>
        <td>:</td>
    </tr>
</table>
<div style="display: flex;">
    <div style="float: left;margin-left: 1rem;">
    <table>
        <tr>
            <td>a)</td>
            <td style="width: 188;">Terhitung Mulai Tgl.</td>
            <td style="width: 10;">:</td>
        </tr>
        <tr>
            <td>b)</td>
            <td>Masa Kerja</td>
            <td>:</td>
        </tr>
        <tr>
            <td>c)</td>
            <td>Gaji Pokok</td>
            <td>:</td>
            <td></td>
        </tr>
    </table>
</div>
</div>
<br><br><br><br>
<table>
    <tr>
        <td>Dengan Demikian Untuk mendapatkan penyelesaian lebih lanjut.</td>
    </tr>
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

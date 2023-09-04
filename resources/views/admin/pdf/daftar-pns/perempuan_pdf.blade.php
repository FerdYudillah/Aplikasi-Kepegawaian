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
        <tr>
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
    <h2 style="text-align: center">DAFTAR PNS PEREMPUAN SATPOL PP & DAMKAR TAPIN</h2>
    <p style="text-align: right">Tanggal : Rantau,<small> <?php echo date('d-m-y'); ?></p>
    <br>
    <table>
        <tr>
            <th>NO.</th>
            <th>NAMA PNS</th>
            <th>NIP</th>
            <th>PANGKAT|GOLONGAN</th>
            <th>JABATAN</th>
            <th>JENIS KELAMIN</th>

        </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($user as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ isset($item->kepegawaian_pns->pangkat) ? $item->kepegawaian_pns->pangkat : ' ' }} - {{ isset($item->kepegawaian_pns->golongan) ? $item->kepegawaian_pns->golongan : ' ' }}</td>
            <td>{{ isset($item->kepegawaian_pns->jabatan) ? $item->kepegawaian_pns->jabatan : ' ' }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
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
    {{-- <div style="position: fixed;
    bottom: 500px;
    right: 400px;
    height: 50px;
    text-align: right;
    font-size: 12px;
    color: #000;">
        <p>test</p>
    </div> --}}
</body>
 </html>

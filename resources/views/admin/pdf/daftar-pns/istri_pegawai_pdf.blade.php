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
    <h2 style="text-align: center">Laporan Daftar PNS</h2>
    <hr>
    <p style="text-align: right">Tanggal : Rantau,<small> <?php echo date('d-m-y'); ?></p>
    <br>
    <table>
        <tr>
            <th>NO.</th>
            <th>NAMA PNS</th>
            <th>NIP</th>
            <th>PANGKAT|GOLONGAN</th>
            <th>JABATAN</th>

        </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($user as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ isset($item->kepegawaian_pns->pangkat) ? $item->kepegawaian_pns->pangkat : ' ' }} - {{ isset($item->kepegawaian_pns->golongan) ? $item->kepegawaian_pns->golongan : ' ' }}</td>
            <td>{{ isset($item->kepegawaian_pns->jabatan) ? $item->kepegawaian_pns->jabatan : ' ' }}</td>
        </tr>
    @endforeach
    </table>

    <div style="display: flex;">
        <div style="float: right;margin-right: 4rem;">
            <br>
            <br>
            <br>
            <br>
            <br>
            <p>Kepala Satuan <br>Drs. H. Mahyudin, M.Pd<br>Pembina UTama Muda/IVc<br>NIP. 196309161992031011</p>
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

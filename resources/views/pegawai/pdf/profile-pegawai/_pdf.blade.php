<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Pegawai</title>
    <style>
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
            </style>
            </head>
            <body>
                <table>
                    <tr>
                        <td><img src="{{ public_path('satpol.png') }}" width="80" height="80"></td>
                        {{-- <td><img src="\image\Logo Satpol.png" width="80" height="80"></td> --}}
                        <td>
                            <center>
                                <font size="4">PEMERINTAH KABUPATEN TAPIN</font><br>
                                <font size="5"><b>DINAS SATUAN POLISI PAMONG PRAJA & DAMKAR TAPIN</b></font><br>
                                <font size="2"><i>Jalan Brigjen H. Hasan Basry No.22, Kode Pos 71111, RANTAU</i></font>
                            </center>
                            </td>
                    </tr>
                </table>
            <hr>
            <br>
            <table width="770">
                <center>
                    <font size="4"><b>PROFILE PEGAWAI NEGERI SIPIL</b></font><br>
                </center>
            </table>
            <p>Mengetahui Bahwa pegawai dibawah Ini merupakan Pegawai Negeri Sipil Di Dinas Satuan Polisi Pamong Praja & Pemadam Kebakaran Tapin Yang bernama :</p>
            <br>
            <table>
            @foreach ($user as $jb)
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $jb->nip }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $jb->name }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $jb->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $jb->t_lahir }},{{ $jb->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $jb->kepegawaian_pns->jabatan }}</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td>:</td>
                    <td>{{ $jb->kepegawaian_pns->pangkat }}/{{ $jb->kepegawaian_pns->golongan }}</td>
                </tr>
                <tr>
                    <td>Masa Kerja</td>
                    <td>:</td>
                    <td>{{ $jb->kepegawaian_pns->masa_kerja }}</td>
                </tr>
                <tr>
                    <td>Status Pegawai</td>
                    <td>:</td>
                    <td>{{ $jb->kepegawaian_pns->status_pegawai }}</td>
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
                <br>
                <br>
                <p>Mengetahui<br>Kepala Satuan</p>
                <br>
                <br>
                <br>
                <br>
                @foreach ($kepala as $item)
                <p> <br>{{ $item->name }}<br>{{ $item->pangol }}<br>NIP. {{ $item->nip }}</p>
                @endforeach
            </div>
        </div>
      </body>
 </html>

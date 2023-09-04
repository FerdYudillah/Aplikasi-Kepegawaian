<!DOCTYPE html>
<html lang="en">

<head>
    <title>Usulan Kenaikan Gaji Berkala</title>
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
                    <font size="4"><b>USULAN KENAIKAN PANGKAT JABATAN PELAKSANA/STAF PENYESUAIAN IJAZAH</b></font><br>
                </center>
            </table>
            <P>Dengan hormat diberitahukan bahwa berhubungan telah terpenuhinya masa kerja dan syarat-syarat lainnya maka pegawai yang bernama dibawah ini akan menerima Kenaikan Pangkat : </P>
            <br>
            <table>
            @foreach ($naikPangkat as $jb)
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $jb->user_pegawai->nip }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $jb->user_pegawai->name }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $jb->user_pegawai->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $jb->user_pegawai->t_lahir }},{{ $jb->user_pegawai->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ isset($jb->user_pegawai->kepegawaian_pns->jabatan)?$jb->user_pegawai->kepegawaian_pns->jabatan:'' }}</td>
                </tr>
                <tr>
                    <td>Jenis Jabatan</td>
                    <td>:</td>
                    <td>{{ isset($jb->user_pegawai->kepegawaian_pns->jenis_jabatan)?$jb->user_pegawai->kepegawaian_pns->jenis_jabatan:'' }}<</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>:</td>
                    <td>{{ isset($jb->user_pegawai->kepegawaian_pns->golongan)?$jb->user_pegawai->kepegawaian_pns->golongan:'' }}</td>
                </tr>
                <tr>
                    <td>Pangkat Lama</td>
                    <td>:</td>
                    <td>{{ isset($jb->user_pegawai->kepegawaian_pns->pangkat)?$jb->user_pegawai->kepegawaian_pns->pangkat:'' }}</td>
                </tr>
                <tr>
                    <td>Pangkat Baru</td>
                    <td>:</td>
                    <td>{{ $jb->pangkat_pns->nama_pangkat }}</td>
                </tr>
                <tr>
                    <td>Mulai Tanggal</td>
                    <td>:</td>
                    <td>{{ $jb->mulai_tanggal }}</td>
                </tr>
            @endforeach
        </table>
        <div style="display: flex;">
            <div style="float: right;margin-right: 4rem;">
                <br>
                <br>
                <br>
                <p>Mengetahui<br>Kepala Satuan</p>
                <br>
                <br>
                @foreach ($kepala as $item)
                <p> <br>{{ $item->name }}<br>{{ $item->pangol }}<br>NIP. {{ $item->nip }}</p>
                @endforeach
            </div>
        </div>
      </body>
 </html>

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
                                <font size="4"><b>SATUAN POLISI PAMONG PRAJA DAN KEBAKARAN</b></font><br>
                                <font size="2"><i>Jl.Brigjend H. Hasan Baseri RT.01 (Ex. SDN Rantau Kiwa 1) Kelurahan Rantau kiwa</i></font><br>
                                <font size="2"><i>Posel : pamongpraja.tapin@gmail.com</i></font><br>
                                <font size="2"><i>RANTAU                        Kode Pos: 71111</i></font>
                            </center>
                            </td>
                    </tr>
                </table>
            <hr>
                <p style="text-align: right"><small> <?php echo date('d F Y'); ?></p>

            <P>Nomor        :<br>Lampiran : 1 (satu) berkas<br>Perihal : Usul Kenaikan Gaji berkala</P>
            {{-- <p style="text-align: right">Yth. Bupati Tapin<br>Up. Kendala Badan Kepegawaian<br>dan pengembang SDM<br>Kabupaten Tapin<br>Di-<br><a class="text-light">.....</a> Rantau</p> --}}
            <table>
                <tr>
                    <td>

                            <font size="2" style="text-align: right">Yth. Bupati Tapin<</font><br>
                            <font size="2">Up. Kepala Badan Kepegawaian</font><br>
                            <font size="2">dan Pengembangan SDM</font>
                            <font size="2">Kabupaten Tapin</font>
                            <font size="2">Di-</font>
                            <font size="2">Rantau</font>
                        </td>
                </tr>
            </table>
            <table width="350">
                <tr>
                    <td><i class="hidden">...</i>dengan hormat,</td>
                </tr>
                <tr>
                    <td>Bersama ini disampaikan Usul Pemberitahuan Kenaikan Gaji Berkala adalah sebagai berikut :</td>
                </tr>
            </table>
            <br>
            <table>
            @foreach ($naikBerkala as $jb)
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
                    <td>Pangkat/Golongan</td>
                    <td>:</td>
                    <td>{{ isset($jb->user_pegawai->kepegawaian_pns->pangkat)?$jb->user_pegawai->kepegawaian_pns->pangkat:'' }}/{{ isset($jb->user_pegawai->kepegawaian_pns->golongan)?$jb->user_pegawai->kepegawaian_pns->golongan:'' }}</td>
                </tr>
                <tr>
                    <td>Gaji Lama</td>
                    <td>:</td>
                    <td>Rp.{{ isset($jb->user_pegawai->kepegawaian_pns->gaji)?$jb->user_pegawai->kepegawaian_pns->gaji:'' }}</td>
                </tr>
                <tr>gaji
                    <td>Gaji Baru</td>
                    <td>:</td>
                    <td>Rp.{{ $jb->gaji->gaji_pokok }}</td>
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

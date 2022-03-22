<!DOCTYPE html>
<html>

<head>
    <title>Cetak AK1 - {{$kartu_kuning->nik}}/{{$kartu_kuning->nama_lengkap}}</title>
</head>

<body>
    <div style="width: 50%; float:left">
        <br>
        <hr>
        <table style="border: 1px solid black; border-collapse: collapse;background-color:white; width:100%;">
            <thead>
                <tr>
                    <td colspan="12" style="font-weight: bold;text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">KARTU TANDA BUKTI PENDAFTARAN PENCARI KERJA</td>

                </tr>
            </thead>
        </table>

        <div style="width: 50%; float:left">
            <table>
                <tr>
                    <td>

                    </td>
                </tr>
            </table>
        </div>

        <div style="width: 50%;">
            <table>
                <thead>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td style=" text-align:left; color:black; font-family: 'Times New Roman' , 'Times' , 'serif' ; font-size:12px;">Nomor Pencari Kerja</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$kartu_kuning->no_pencari_kerja}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Nomor Induk Kependudukan</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$kartu_kuning->nik}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Nama Lengkap</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->nama_lengkap}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Tempat/Tanggal Lahir</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->tempat_lahir}}/{{$personal->tgl_lahir}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Jenis Kelamin</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Status Perkawinan</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->status_perkawinan}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Agama</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->agama}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Alamat</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->alamat}} RT/RW {{$personal->rt}}/{{$personal->rw}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Kode Pos</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$personal->kode_pos}}</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Berlaku s.d</td>
                        <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">: {{$kartu_kuning->masa_berlaku}}</td>
                    </tr>
                </thead>
            </table>
        </div>


        <table style="border: 1px solid black; border-collapse: collapse;">
            <thead>
                <tr style="border: 1px solid black; border-collapse: collapse;">
                    <th style="height:70px;width: 150px;border: 1px solid black; border-collapse: collapse;">LAPORAN</th>
                    <th style="height:70px;border: 1px solid black; border-collapse: collapse;">TGL - BULAN - TAHUN</th>
                    <th style="height:70px;border: 1px solid black; border-collapse: collapse;">Tanda Tangan Pengantar Kerja Petugas Pendaftar (Cantumkan NIP)</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border: 1px solid black; border-collapse: collapse;">
                    <td style="height:70px; text-align:center;border: 1px solid black; border-collapse: collapse;">Pertama</td>
                    <td style="height:70px;border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="height:70px;border: 1px solid black; border-collapse: collapse;"></td>
                </tr>
                <tr style="border: 1px solid black; border-collapse: collapse;">
                    <td style="height:70px; text-align:center;border: 1px solid black; border-collapse: collapse;">Kedua</td>
                    <td style="height:70px;border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="height:70px;border: 1px solid black; border-collapse: collapse;"></td>
                </tr>
                <tr style="border: 1px solid black; border-collapse: collapse;">
                    <td style="height:70px; text-align:center;border: 1px solid black; border-collapse: collapse;">Ketiga</td>
                    <td style="height:70px;border: 1px solid black; border-collapse: collapse;"></td>
                    <td style="height:70px;border: 1px solid black; border-collapse: collapse;"></td>
                </tr>
            </tbody>
        </table>
        <!-- </div> -->


    </div>




    <div style="width: 48%; float:right;">

        <table style="background-color:white; width:100%;">
            <thead>
                <tr>
                    <td colspan="12" style="font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">RIWAYAT PENDIDIKAN FORMAL</td>
                </tr>
                <hr>

                <!-- <tr>
                    <td colspan="12" style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">{{$education!=""?$education->pendidikan:""}} - {{$education!=""?$education->tahun_lulus:""}}</td>
                </tr> -->

                <tr>
                    <td colspan="12" style="text-align:left; font-weight: bold;color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">KETERAMPILAN</td>
                </tr>
                <tr>
                    <td colspan="12" style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;"><span>-&ensp;</span>{{$skill_language!=""?$skill_language->keterampilan:""}}</td>
                </tr>
                <tr>
                    <td colspan="12" style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;"><span>-&ensp;</span>{{$skill_language!=""?$skill_language->bahasa:""}}</td>
                </tr>
            </thead>
        </table>
        <table style="background-color:white; width:100%;">
            <thead>
                <!-- <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr> -->
                <tr>
                    <td colspan="12" style="font-weight: bold;text-align:right; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">PENGANTAR KERJA</td>

                </tr>
                <!-- <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr> -->
                <tr>
                    <td colspan="12" style="font-weight: bold;text-align:right; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">DRA. RIKA YUSTIKA</td>

                </tr>
                <tr>
                    <td colspan="12" style="font-weight: bold;text-align:right; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">NIP. 196702081994032001</td>

                </tr>
            </thead>
        </table>
    </div>

</body>

</html>
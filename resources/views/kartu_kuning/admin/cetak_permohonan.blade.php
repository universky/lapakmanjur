<!DOCTYPE html>
<html>

<head>
    <title>Cetak AK1 - {{$kartu_kuning->nik}}/{{$kartu_kuning->nama_lengkap}}</title>
</head>

<body>
    <!-- Page 1 -->
    <table style="background-color:white; width:100%;">
        <thead>
            <tr>
                <td colspan="12" style="font-weight: bold;text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">PEMERINTAH KABUPATEN CIANJUR</td>
            </tr>

            <tr>
                <td colspan="12" style="font-weight: bold;text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">DINAS TENAGA KERJA DAN TRANSMIGRASI</td>
            </tr>

            <tr>
                <td colspan="12" style="text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">Jalan Pangeran Hidayatullah No. 102 Cianjur 43212 Telp./Fax. (0263)</td>
            </tr>

            <tr>
                <td colspan="12" style="text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:12px;">E-mail: disnakertranscianjur@yahoo.com</td>
            </tr>
            <hr>

        </thead>
    </table>

    <table border="1" style="background-color:white; width:100%;">
        <thead>
            <tr>
                <td colspan="12" style="font-weight: bold;text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">DATA PEMOHON AK1 / KARTU KUNING</td>

            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="12" style="text-decoration: underline;font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">INFORMASI AK1</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Nomor Pencari Kerja</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$kartu_kuning->no_pencari_kerja}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Nomor Induk Kependudukan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$kartu_kuning->nik}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Tgl. Pendaftaran</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$kartu_kuning->date}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Masa Berlaku</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$kartu_kuning->masa_berlaku}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Status</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$kartu_kuning->status}}</td>
            </tr>
        </thead>
    </table>

    <!-- Page 2 -->

    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="12" style="text-decoration: underline;font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">IDENTITAS PEMOHON</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Nama Lengkap</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->nama_lengkap}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Jenis Kelaminn</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Kewarganegaraan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->kewarganegaraan}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Kondisi Fisik</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->kondisi_fisik}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Tempat/Tanggal Lahir</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->tempat_lahir}}/{{$personal->tgl_lahir}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Status Perkawinan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->status_perkawinan}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Agama</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->agama}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Alamat</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->alamat}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">RT/RW</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->rt}}/{{$personal->rw}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Kode Pos</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->kode_pos}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">No. HP</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->no_hp}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Tinggi Badan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->tinggi_badan}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Berat Badan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$personal->berat_badan}}</td>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="12" style="text-decoration: underline;font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">DATA PENDIDIKAN</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Pendidikan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$education!=""?$education->pendidikan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Jurusan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$education!=""?$education->jurusan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Nama Institusi</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$education!=""?$education->nama_institusi:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Tahun Lulus</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$education!=""?$education->tahun_lulus:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Lama Pendidikan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$education!=""?$education->lama_pendidikan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Nilai Ijazah/IPK</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$education!=""?$education->ipk:""}}</td>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="12" style="text-decoration: underline;font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">DATA HARAPAN KERJA</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Penempatan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$job_expectation!=""?$job_expectation->penempatan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Provinsi</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$job_expectation!=""?$job_expectation->provinsi_harapan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Kabupaten</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$job_expectation!=""?$job_expectation->kab_harapan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Sistem Pembayaran</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$job_expectation!=""?$job_expectation->sistem_pembayaran_harapan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Minimal Gaji</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$job_expectation!=""?$job_expectation->min_gaji_harapan:""}}</td>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="12" style="text-decoration: underline;font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">DATA PENGALAMAN KERJA </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            @foreach ($experiences as $experience)
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Nama Perusahaan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$experience!=""?$experience->nama_perusahaan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Jabatan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$experience!=""?$experience->jabatan:""}}""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Deskripsi Pekerjaan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$experience!=""?$experience->deskripsi_pekerjaan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Lama Kerja</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$experience!=""?$experience->lama_kerja:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Gaji</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$experience!=""?$experience->gaji:""}}</td>
            </tr>

            @endforeach
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="12" style="text-decoration: underline;font-weight: bold;text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">PENGUASAAN KETERAMPILAN DAN BAHASA</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Keterampilan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$skill_language!=""?$skill_language->keterampilan:""}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">Bahasa</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:14px;">: {{$skill_language!=""?$skill_language->bahasa:""}}</td>
            </tr>
        </thead>
    </table>
</body>

</html>
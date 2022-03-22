<!DOCTYPE html>
<html>

<head>
    <title>Cetak No. Registrasi - {{$pelatihans->nama_lpk}}/{{$pelatihans->nama_pelatihan}}</title>
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
                <td colspan="12" style="font-weight: bold;text-align:center; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">KARTU TANDA BUKTI REGISTRASI PELATIHAN</td>

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
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">Nomor Registrasi</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">: {{$pelatihans->no_registrasi}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">Nama Pelatihan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">: {{$pelatihans->nama_pelatihan}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">Nama LPK</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">: {{$pelatihans->nama_lpk}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">Email</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">: {{$pelatihans->email}}</td>
            </tr>
            <tr>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">Tanggal Pelatihan</td>
                <td style="text-align:left; color:black; font-family: 'Times New Roman', 'Times', 'serif'; font-size:16px;">: {{$pelatihans->date}}</td>
            </tr>

        </thead>
    </table>


</body>

</html>
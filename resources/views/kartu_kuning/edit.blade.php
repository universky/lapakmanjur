@extends('layouts.app')
@section('title')
Edit AK1 - {{ $kartu_kuning->nik }}/{{ $kartu_kuning->nama_lengkap }}
@endsection

@section('head')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
@endsection

@section('content')
<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row" id="app">
        <div class="pt-1 pb-0" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title"><span>Edit AK1 - {{ $kartu_kuning->nik }}/{{ $kartu_kuning->nama_lengkap }}</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/homepage">Kembali</a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Edit AK1 - {{ $kartu_kuning->nik }}/{{ $kartu_kuning->nama_lengkap }}
                            </li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="seaction">

                    <div class="card-alert card cyan">
                        <div class="card-content white-text">
                            <p>Beberapa info pendaftaran AK1 Kabupaten Cianjur:</p>
                            <br>
                            <p><span>&#8226;</span> NIK harus terdaftar di dalam database Kabupaten Cianjur </p>
                            <p><span>&#8226;</span> Usia minimal pendaftar adalah 18 Tahun
                            </p>
                        </div>
                    </div>

                    <!--Basic Form-->

                    <!-- jQuery Plugin Initialization -->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="basic-form" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <div class="card-alert card cyan lighten-5">
                                        <div class="card-content">
                                            <h6 class="cyan-text">Data Pribadi</h6>
                                        </div>
                                    </div>
                                    <form @submit.prevent="submitForm">
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="nik" disabled>
                                                <label for="nik">NIK</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="no_pencari_kerja" disabled>
                                                <label for="no_pencari_kerja">No. Pencari Kerja</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" v-model="nama_lengkap">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="jenis_kelamin">
                                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                                <label>Jenis Kelamin</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="kewarganegaraan">
                                                    <option value="" disabled selected>Pilih Kewarganegaraan</option>
                                                    <option value="WNI">WNI</option>
                                                    <option value="WNA">WNA</option>
                                                </select>
                                                <label>Kewarganegaraan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="kondisi_fisik">
                                                    <option value="" disabled selected>Pilih Kondisi Fisik</option>
                                                    <option value="Normal">Normal</option>
                                                </select>
                                                <label>Kondisi Fisik</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="tempat_lahir">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="date" v-model="tgl_lahir">
                                                <label for="tgl_lahir">Tgl. Lahir</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="status_perkawinan">
                                                    <option value="" disabled selected>Pilih Status Kawin</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                </select>
                                                <label>Status Kawin</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="agama">
                                                    <option value="" disabled selected>Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Khonghucu">Khonghucu</option>
                                                </select>
                                                <label>Agama</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="alamat">
                                                <label for="alamat">Alamat</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" v-model="rt">
                                                <label for="rt">No. RT</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" v-model="rw">
                                                <label for="rw">No. RW</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="kode_pos">
                                                <label for="kode_pos">Kode Pos</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="no_hp">
                                                <label for="no_hp">No. HP</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s3">
                                                <input type="text" v-model="tinggi_badan">
                                                <label for="tinggi_badan">Tinggi Badan</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" v-model="berat_badan">
                                                <label for="berat_badan">Berat Badan</label>
                                            </div>
                                        </div>
                                        <div class="card-alert card cyan lighten-5">
                                            <div class="card-content">
                                                <h6 class="cyan-text">Data Pendidikan</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="pendidikan">
                                                    <option value="" disabled selected>Pilih Pendidikan</option>
                                                    <option value="TIDAK TAMAT SD">TIDAK TAMAT SD</option>
                                                    <option value="TAMAT SD/SEDERAJAT">TAMAT SD/SEDERAJAT</option>
                                                    <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                                    <option value="SLTA/SMK/SEDERAJAT">SLTA/SMK/SEDERAJAT</option>
                                                    <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                                                    <option value="AKADEMI/DIPLOMA III/S. MUDA">AKADEMI/DIPLOMA III/S. MUDA</option>
                                                    <option value="DIPLOMA IV/STRATA-I">DIPLOMA IV/STRATA-I</option>
                                                    <option value="STRATA-II">STRATA-II</option>
                                                    <option value="STRATA-III">STRATA-III</option>
                                                </select>
                                                <label>Pendidikan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="jurusan">
                                                    <option value="" disabled selected>Pilih Jurusan</option>
                                                    <option value="KIMIA">KIMIA</option>
                                                    <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                                                    <option value="ANIMASI">ANIMASI</option>
                                                    <option value="AKUNTANSI">AKUNTANSI</option>
                                                </select>
                                                <label>Jurusan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="nama_institusi">
                                                <label for="nama_institusi">Nama Institusi Pendidikan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="tahun_lulus">
                                                <label for="tahun_lulus">Tahun Lulus</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s3">
                                                <input type="text" v-model="lama_pendidikan">
                                                <label for="lama_pendidikan">Lama Pendidikan</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" v-model="ipk">
                                                <label for="ipk">Nilai Ijazah/IPK</label>
                                            </div>
                                        </div>

                                        <div class="card-alert card cyan lighten-5">
                                            <div class="card-content">
                                                <h6 class="cyan-text">Data Harapan Kerja <span style="color:red">(*opsional)</span></h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="penempatan">
                                                    <option value="" disabled selected>Pilih Penempatan Harapan</option>
                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                </select>
                                                <label>Penempatan Harapan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="provinsi_harapan">
                                                    <option value="" disabled selected>Pilih Provinsi Harapan</option>
                                                    <option value="Jawa Barat">Jawa Barat</option>
                                                </select>
                                                <label>Provinsi Harapan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="kab_harapan">
                                                    <option value="" disabled selected>Pilih Kabupaten/Kota Harapan</option>
                                                    <option value="Cianjur">Cianjur</option>
                                                </select>
                                                <label>Kabupaten/Kota Harapan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="sistem_pembayaran_harapan">
                                                    <option value="" disabled selected>Pilih Sistem Pembayaran</option>
                                                    <option value="Borongan">Borongan</option>
                                                </select>
                                                <label>Sistem Pembayaran</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="min_gaji_harapan">
                                                <label for="min_gaji_harapan">Min. Gaji Harapan</label>
                                            </div>
                                        </div>

                                        <!-- <div class="card-alert card cyan lighten-5">
                                            <div class="card-content">
                                                <h6 class="cyan-text">Data Pengalaman Kerja <span style="color:red">(*opsional)</span></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <table class="display">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-sm-2" style="text-align: left;">Nama Perusahaan</th>
                                                            <th class="col-sm-2" style="text-align: left;">Jabatan</th>
                                                            <th class="col-sm-2" style="text-align: left;">Deskripsi Pekerjaan</th>
                                                            <th class="col-sm-2" style="text-align: left;">Lama Kerja</th>
                                                            <th class="col-sm-2" style="text-align: left;">Gaji</th>
                                                            <th class="col-sm-2" style="text-align: right;">
                                                                <span class="mb-6 btn waves-effect waves-light cyan" v-on:click="addRow"><span class="fas fa-plus"></span> Add</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(experience, index) in experienceList">
                                                            <td style="text-align: left;">
                                                                <input class="form-control align-right" type="text" v-model="experience.nama_perusahaan" required>
                                                            </td>
                                                            <td style="text-align: left;">
                                                                <input class="form-control align-right text-right" type="text" v-model="experience.jabatan" required>
                                                            </td>
                                                            <td style="text-align: left;">
                                                                <input class="form-control align-right" type="text" v-model="experience.deskripsi_pekerjaan">
                                                            </td>
                                                            <td style="text-align: left;">
                                                                <input class="form-control align-right" type="text" v-model="experience.lama_kerja">
                                                            </td>
                                                            <td style="text-align: left;">
                                                                <input class="form-control align-right" type="text" v-model="experience.gaji">
                                                            </td>
                                                            <td style="text-align: right;">
                                                                <a href="#" @click.prevent="deleteRow(index)" class="mb-6 btn waves-effect waves-light red accent-2"><i class="material-icons">close</i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> -->

                                        <div class="card-alert card cyan lighten-5">
                                            <div class="card-content">
                                                <h6 class="cyan-text">Data Keterampilan dan Bahasa <span style="color:red">(*opsional)</span></h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="keterampilan">
                                                <label for="keterampilan">Keterampilan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="bahasa">
                                                <label for="bahasa">Bahasa</label>
                                            </div>
                                        </div>

                                        <div class="card-alert card cyan lighten-5">
                                            <div class="card-content">
                                                <h6 class="cyan-text">Upload File</h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="file-field input-field col s6">
                                                <div class="btn">
                                                    <span>file</span>
                                                    <input type="file" ref="foto" class="custom-file-input" accept=".png, .pdf" v-on:change="handleFotoUpload">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>

                                                <img class="materialboxed" data-caption="A picture of a way with a group of trees in a park" width="250" src="{{ asset('files/foto/' .$kartu_kuning->foto) }}">
                                            </div>
                                            <div class="file-field input-field col s6">
                                                <div class="btn">
                                                    <span>Ijazah</span>
                                                    <input type="file" ref="ijazah" class="custom-file-input" accept=".png, .pdf" v-on:change="handleIjazahUpload">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>

                                                <a href="../../files/ijazah/{{$kartu_kuning->ijazah}}" target="_blank">
                                                    <div class="col xl5 l5 m5 s5">
                                                        <div class="card hoverable" id="profile-card" style="color: black; border: radius 25px;">
                                                            <div class="card-content">
                                                                <div class="app-file-content-logo lighten-4">
                                                                    <img class="recent-file" style="font-size: .8rem;font-weight: 900;margin-left: 3px;text-transform: uppercase;color: #bdbdbd;" src="{{ asset('assets/images/icon/pdf-image.png') }}" height="38" width="30" alt="Card image cap">
                                                                </div>
                                                                <div class="app-file-content-details">
                                                                    <div class="app-file-name font-weight-600">{{$kartu_kuning->ijazah}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                                    <i class="material-icons right">save</i>Save
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
@endsection

@section('pagescript')
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<script>
    let app = new Vue({
        el: '#app',
        data: {
            nik: '{{$kartu_kuning->nik}}',
            email: '{{$kartu_kuning->email}}',
            no_pencari_kerja: '{{$kartu_kuning->no_pencari_kerja}}',
            nama_lengkap: '{{$kartu_kuning->nama_lengkap}}',
            jenis_kelamin: '{{$kartu_kuning->jenis_kelamin}}',
            kewarganegaraan: '{{$kartu_kuning->kewarganegaraan}}',
            kondisi_fisik: '{{$kartu_kuning->kondisi_fisik}}',
            tempat_lahir: '{{$kartu_kuning->tempat_lahir}}',
            tgl_lahir: '{{$kartu_kuning->tgl_lahir}}',
            status_perkawinan: '{{$kartu_kuning->status_perkawinan}}',
            agama: '{{$kartu_kuning->agama}}',
            alamat: '{{$kartu_kuning->alamat}}',
            rt: '{{$kartu_kuning->rt}}',
            rw: '{{$kartu_kuning->rw}}',
            kode_pos: '{{$kartu_kuning->kode_pos}}',
            no_hp: '{{$kartu_kuning->no_hp}}',
            tinggi_badan: '{{$kartu_kuning->tinggi_badan}}',
            berat_badan: '{{$kartu_kuning->berat_badan}}',
            pendidikan: '{{$kartu_kuning->pendidikan}}',
            jurusan: '{{$kartu_kuning->jurusan}}',
            nama_institusi: '{{$kartu_kuning->nama_institusi}}',
            tahun_lulus: '{{$kartu_kuning->tahun_lulus}}',
            lama_pendidikan: '{{$kartu_kuning->lama_pendidikan}}',
            ipk: '{{$kartu_kuning->ipk}}',
            penempatan: '{{$kartu_kuning->penempatan}}',
            provinsi_harapan: '{{$kartu_kuning->provinsi_harapan}}',
            kab_harapan: '{{$kartu_kuning->kab_harapan}}',
            sistem_pembayaran_harapan: '{{$kartu_kuning->sistem_pembayaran_harapan}}',
            min_gaji_harapan: '{{$kartu_kuning->min_gaji_harapan}}',
            keterampilan: '{{$kartu_kuning->keterampilan}}',
            bahasa: '{{$kartu_kuning->bahasa}}',


            foto: '{{$kartu_kuning->foto}}',
            ijazah: '{{$kartu_kuning->ijazah}}',
            created_at: '',
            updated_at: '',

            loading: false,
        },
        methods: {
            submitForm: function() {
                this.sendData();
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.patch('/kartu_kuning/{{$kartu_kuning->id}}', {
                        no_pencari_kerja: this.no_pencari_kerja,
                        nik: this.nik,
                        nama_lengkap: this.nama_lengkap,
                        jenis_kelamin: this.jenis_kelamin,
                        kewarganegaraan: this.kewarganegaraan,
                        kondisi_fisik: this.kondisi_fisik,
                        tempat_lahir: this.tempat_lahir,
                        tgl_lahir: this.tgl_lahir,
                        status_perkawinan: this.status_perkawinan,
                        agama: this.agama,
                        alamat: this.alamat,
                        rt: this.rt,
                        rw: this.rw,
                        kode_pos: this.kode_pos,
                        no_hp: this.no_hp,
                        tinggi_badan: this.tinggi_badan,
                        berat_badan: this.berat_badan,
                        pendidikan: this.pendidikan,
                        jurusan: this.jurusan,
                        nama_institusi: this.nama_institusi,
                        tahun_lulus: this.tahun_lulus,
                        lama_pendidikan: this.lama_pendidikan,
                        ipk: this.ipk,
                        penempatan: this.penempatan,
                        provinsi_harapan: this.provinsi_harapan,
                        kab_harapan: this.kab_harapan,
                        sistem_pembayaran_harapan: this.sistem_pembayaran_harapan,
                        min_gaji_harapan: this.min_gaji_harapan,
                        keterampilan: this.keterampilan,
                        bahasa: this.bahasa,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'AK1 telah diperbaharui.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/kartu_kuning';
                            }
                        })
                        // console.log(response);
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        console.log(error);
                        Swal.fire(
                            'Terjadi Kesalahan!',
                            'Pastikan data terisi dengan benar.',
                            'error'
                        )
                    });
            },
        }
    })
</script>
@endsection
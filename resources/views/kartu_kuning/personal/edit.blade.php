@extends('layouts.app')
@section('title')
Pembuatan AK1
@endsection

@section('head')
<!-- <style>
    .tm {
        position: relative;
        /*width: 150px; height: 20px;*/
        /*color: white;*/

        display: block;
        width: 100%;
        height: 2.4rem;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        align-content: center;
    }

    .tm:before {
        position: absolute;
        top: 10px;
        left: 3px;
        content: attr(data-date);
        display: block;
        color: #495057;
    }

    .tm::-webkit-datetime-edit,
    .tm::-webkit-inner-spin-button,
    .tm::-webkit-clear-button {
        display: none;
    }

    .tm::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 10px;
        right: 0;
        color: #495057;
    }
</style> -->
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
                        <h5 class="breadcrumbs-title"><span>Pengisian Form Data Pribadi</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/kartu_kuning">Kembali</a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Pembuatan AK1
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
                                    <!-- <div class="card-alert card cyan lighten-5">
                                        <div class="card-content">
                                            <h6 class="cyan-text">Data Pribadi</h6>
                                        </div>
                                    </div> -->
                                    <form @submit.prevent="submitForm" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" v-model="nama_lengkap">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="jenis_kelamin">
                                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
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
                                                    <option value="Disabilitas">Disabilitas</option>
                                                </select>
                                                <label>Kondisi Fisik</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="tempat_lahir">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                            </div>
                                            <div class="input-field tm col s6">
                                                <input type="date" v-model="tgl_lahir">
                                                <label for=" tgl_lahir">Tgl. Lahir</label>
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
                                                <input type="text" v-model="rt" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="3">
                                                <label for="rt">No. RT</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" v-model="rw" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="3">
                                                <label for="rw">No. RW</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="kode_pos" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="5">
                                                <label for="kode_pos">Kode Pos</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="no_hp" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="13">
                                                <label for="no_hp">No. HP</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s3">
                                                <input type="text" v-model="tinggi_badan" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="3"><span>cm</span>
                                                <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" v-model="berat_badan" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="3">
                                                <label for="berat_badan">Berat Badan (kg)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col s6">
                                                <label for="foto">
                                                    <h6>File Foto (.jpeg/png/jpg)</h6>
                                                </label>
                                                <div class="file-field input-field">

                                                    <div class="btn">
                                                        <span>Pilih File</span>
                                                        <input type="file" ref="foto" class="custom-file-input" accept=".jpeg, .png, .jpg" v-on:change="handleFotoUpload">

                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col s6">
                                                <label for="ijazah">
                                                    <h6>File Ijazah (.pdf)</h6>
                                                </label>
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span>Pilih File</span>
                                                        <input type="file" ref="ijazah" class="custom-file-input" accept=".png, .jpg, .jpeg, .pdf" v-on:change="handleIjazahUpload">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js">
</script>

<script>
    $(".tm").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
        )
    }).trigger("change")
</script> -->

<script>
    let app = new Vue({
        el: '#app',
        data: {
            nama_lengkap: '{{$personal->nama_lengkap}}',
            jenis_kelamin: '{{$personal->jenis_kelamin}}',
            kewarganegaraan: '{{$personal->kewarganegaraan}}',
            kondisi_fisik: '{{$personal->kondisi_fisik}}',
            tempat_lahir: '{{$personal->tempat_lahir}}',
            tgl_lahir: '{{$personal->tgl_lahir}}',
            status_perkawinan: '{{$personal->status_perkawinan}}',
            agama: '{{$personal->agama}}',
            alamat: '{{$personal->alamat}}',
            rt: '{{$personal->rt}}',
            rw: '{{$personal->rw}}',
            kode_pos: '{{$personal->kode_pos}}',
            no_hp: '{{$personal->no_hp}}',
            tinggi_badan: '{{$personal->tinggi_badan}}',
            berat_badan: '{{$personal->berat_badan}}',
            created_at: '',
            updated_at: '',

            date2: '{{$date2}}',
            foto: '',
            ijazah: '',

            loading: false,
        },
        methods: {
            handleFotoUpload: function() {
                this.foto = this.$refs.foto.files[0];
                console.log(this.foto)

                console.log(this.foto['name'])
            },
            handleIjazahUpload: function() {
                this.ijazah = this.$refs.ijazah.files[0];
                console.log(this.ijazah)

                console.log(this.ijazah['name'])
            },
            submitForm: function() {
                if (this.email == '') {
                    Swal.fire(
                        'Terjadi Kesalahan!',
                        'Email tidak boleh kosong.',
                        'error'
                    )
                } else {
                    if (this.nama_lengkap == '') {
                        Swal.fire(
                            'Terjadi Kesalahan!',
                            'Nama tidak boleh kosong.',
                            'error'
                        )
                    } else {
                        if (this.jenis_kelamin == '') {
                            Swal.fire(
                                'Terjadi Kesalahan!',
                                'Jenis Kelamin tidak boleh kosong.',
                                'error'
                            )
                        } else {
                            if (this.kewarganegaraan == '') {
                                Swal.fire(
                                    'Terjadi Kesalahan!',
                                    'Kewarganegaraan tidak boleh kosong.',
                                    'error'
                                )
                            } else {
                                if (this.kondisi_fisik == '') {
                                    Swal.fire(
                                        'Terjadi Kesalahan!',
                                        'Kondisi Fisik tidak boleh kosong.',
                                        'error'
                                    )
                                } else {
                                    if (this.tempat_lahir == '') {
                                        Swal.fire(
                                            'Terjadi Kesalahan!',
                                            'Tempat Lahir tidak boleh kosong.',
                                            'error'
                                        )
                                    } else {
                                        if (this.tgl_lahir == '') {
                                            Swal.fire(
                                                'Terjadi Kesalahan!',
                                                'Tanggal Lahir tidak boleh kosong.',
                                                'error'
                                            )
                                        } else {
                                            if (this.tgl_lahir > this.date2) {
                                                Swal.fire(
                                                    'Terjadi Kesalahan!',
                                                    'Umur anda minimal 18 tahun.',
                                                    'error'
                                                )
                                            } else {
                                                if (this.status_perkawinan == '') {
                                                    Swal.fire(
                                                        'Terjadi Kesalahan!',
                                                        'Status Perkawinan tidak boleh kosong.',
                                                        'error'
                                                    )
                                                } else {
                                                    if (this.agama == '') {
                                                        Swal.fire(
                                                            'Terjadi Kesalahan!',
                                                            'Agana tidak boleh kosong.',
                                                            'error'
                                                        )
                                                    } else {
                                                        if (this.alamat == '') {
                                                            Swal.fire(
                                                                'Terjadi Kesalahan!',
                                                                'Alamat tidak boleh kosong.',
                                                                'error'
                                                            )
                                                        } else {
                                                            if (this.rt == '') {
                                                                Swal.fire(
                                                                    'Terjadi Kesalahan!',
                                                                    'RT tidak boleh kosong.',
                                                                    'error'
                                                                )
                                                            } else {
                                                                if (this.rw == '') {
                                                                    Swal.fire(
                                                                        'Terjadi Kesalahan!',
                                                                        'RW tidak boleh kosong.',
                                                                        'error'
                                                                    )
                                                                } else {
                                                                    if (this.kode_pos == '') {
                                                                        Swal.fire(
                                                                            'Terjadi Kesalahan!',
                                                                            'Kode Pos tidak boleh kosong.',
                                                                            'error'
                                                                        )
                                                                    } else {
                                                                        if (this.no_hp == '') {
                                                                            Swal.fire(
                                                                                'Terjadi Kesalahan!',
                                                                                'No. HP tidak boleh kosong.',
                                                                                'error'
                                                                            )
                                                                        } else {
                                                                            if (this.tinggi_badan == '') {
                                                                                Swal.fire(
                                                                                    'Terjadi Kesalahan!',
                                                                                    'Tinggi Badan tidak boleh kosong.',
                                                                                    'error'
                                                                                )
                                                                            } else {
                                                                                if (this.berat_badan == '') {
                                                                                    Swal.fire(
                                                                                        'Terjadi Kesalahan!',
                                                                                        'Berat Badan tidak boleh kosong.',
                                                                                        'error'
                                                                                    )
                                                                                } else {
                                                                                    if (this.foto == '') {
                                                                                        Swal.fire(
                                                                                            'Terjadi Kesalahan!',
                                                                                            'Foto tidak boleh kosong.',
                                                                                            'error'
                                                                                        )
                                                                                    } else {
                                                                                        if (this.ijazah == '') {
                                                                                            Swal.fire(
                                                                                                'Terjadi Kesalahan!',
                                                                                                'Ijazah tidak boleh kosong.',
                                                                                                'error'
                                                                                            )
                                                                                        } else {
                                                                                            this.sendData();
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            sendData: function() {
                let vm = this;
                //vm.loading = true;

                let data = {
                    id: vm.id,
                    foto: vm.foto,
                    ijazah: vm.ijazah,

                    foto_name: this.foto['name'],
                    ijazah_name: this.ijazah['name'],

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

                    created_at: this.created_at,
                    updated_at: this.updated_at,
                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/personal/edit/{{$personal->id}}', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data Pribadi berhasil disimpan.',
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
            // sendData: function() {
            //     let vm = this;
            //     vm.loading = true;
            //     axios.post('/personal', {
            //             no_pencari_kerja: this.no_pencari_kerja,
            //             nik: this.nik,
            //             nama_lengkap: this.nama_lengkap,
            //             jenis_kelamin: this.jenis_kelamin,
            //             kewarganegaraan: this.kewarganegaraan,
            //             kondisi_fisik: this.kondisi_fisik,
            //             tempat_lahir: this.tempat_lahir,
            //             tgl_lahir: this.tgl_lahir,
            //             status_perkawinan: this.status_perkawinan,
            //             agama: this.agama,
            //             alamat: this.alamat,
            //             rt: this.rt,
            //             rw: this.rw,
            //             kode_pos: this.kode_pos,
            //             no_hp: this.no_hp,
            //             tinggi_badan: this.tinggi_badan,
            //             berat_badan: this.berat_badan,

            //             created_at: this.created_at,
            //             updated_at: this.updated_at,
            //         })
            //         .then(function(response) {
            //             vm.loading = false;
            //             Swal.fire({
            //                 title: 'Berhasil',
            //                 text: 'Data Pribadi berhasil disimpan.',
            //                 icon: 'success',
            //                 allowOutsideClick: false,
            //             }).then((result) => {
            //                 if (result.isConfirmed) {
            //                     window.location.href = '/kartu_kuning';
            //                 }
            //             })
            //             // console.log(response);
            //         })
            //         .catch(function(error) {
            //             vm.loading = false;
            //             console.log(error);
            //             Swal.fire(
            //                 'Terjadi Kesalahan!',
            //                 'Pastikan data terisi dengan benar.',
            //                 'error'
            //             )
            //         });
            // },
            sendFile: function() {
                let vm = this;
                //vm.loading = true;

                let data = {
                    id: vm.id,
                    foto: vm.foto,
                    ijazah: vm.ijazah,

                    foto_name: this.foto['name'],
                    ijazah_name: this.ijazah['name'],

                    created_at: this.created_at,
                    updated_at: this.updated_at,

                    experienceList: [],
                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/upload_file', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Upload File berhasil disimpan.',
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
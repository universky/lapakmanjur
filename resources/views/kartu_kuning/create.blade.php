@extends('layouts.app')
@section('title')
Pembuatan Kartu Kuning
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
                        <h5 class="breadcrumbs-title"><span>Pembuatan Kartu Kuning</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Pembuatan Kartu Kuning
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="seaction">

                    <div class="card">
                        <div class="card-content">
                            <p class="caption mb-0">Pastikan data anda sesuai.</p>
                        </div>
                    </div>

                    <!--Basic Form-->

                    <!-- jQuery Plugin Initialization -->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="basic-form" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <form @submit.prevent="submitForm">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" v-model="nik">
                                                <label for="nik">NIK</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" v-model="nama_lengkap">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="date" v-model="tgl_lahir">
                                                <label for="tgl_lahir">Tgl. Lahir</label>
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
                                                <select v-model="status_perkawinan">
                                                    <option value="" disabled selected>Pilih Status Perkawinan</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                </select>
                                                <label>Status</label>
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
                                                <select v-model="provinsi">
                                                    <option value="" disabled selected>Pilih Provinsi</option>
                                                    <option value="Jawa Barat">Jawa Barat</option>
                                                </select>
                                                <label>Provinsi</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <select v-model="kota">
                                                    <option value="" disabled selected>Pilih Kota</option>
                                                    <option value="Bandung">Bandung</option>
                                                </select>
                                                <label>Kota</label>
                                            </div>
                                            <div class="input-field col s2">
                                                <input type="text" v-model="kode_pos">
                                                <label for="kode_pos">Kode Pos</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" v-model="alamat">
                                                <label for="alamat">Alamat</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="date" v-model="date">
                                                <label for="date">Tanggal</label>
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
<script>
    let app = new Vue({
        el: '#app',
        data: {
            nik: '',
            nama_lengkap: '',
            tgl_lahir: '',
            jenis_kelamin: '',
            status_perkawinan: '',
            agama: '',
            alamat: '',
            provinsi: '',
            kota: '',
            kode_pos: '',
            date: '',
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
                axios.post('/kartu_kuning', {
                        nik: this.nik,
                        nama_lengkap: this.nama_lengkap,
                        tgl_lahir: this.tgl_lahir,
                        jenis_kelamin: this.jenis_kelamin,
                        status_perkawinan: this.status_perkawinan,
                        agama: this.agama,
                        alamat: this.alamat,
                        provinsi: this.provinsi,
                        kota: this.kota,
                        kode_pos: this.kode_pos,
                        date: this.date,
                        created_at: this.created_at,
                        updated_at: this.updated_at,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Data has been saved',
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
                            'Oops!',
                            'Something wrong',
                            'error'
                        )
                    });
            },
        }
    })
</script>
@endsection
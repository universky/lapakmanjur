@extends('layouts.app')
@section('title')
Daftar LPK
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
                        <h5 class="breadcrumbs-title"><span>Daftar LPK</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/perusahaan">Kembali</a>
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
                            <p>Pastikan data yang dimasukkan sesuai.</p>
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
                                            <div class="input-field col s6">
                                                <input type="text" v-model="nama_lpk">
                                                <label for="nama_lpk">Nama LPK</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="phone">
                                                <label for="phone">No. HP</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="alamat" v-model="alamat" class="materialize-textarea"></textarea>
                                                <label for="alamat">Alamat</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                                    <i class="material-icons right">save</i>Daftar
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
            nama_lpk: '',
            phone: '',
            email: '',
            alamat: '',
            created_at: '',
            updated_at: '',

            loading: false,
        },
        methods: {
            submitForm: function() {
                // this.sendData();
                window.location.href = `/lpk/daftar/halaman_cetak?nama_lpk=${this.nama_lpk}&phone=${this.phone}&email=${this.email}&alamat=${this.alamat}`;
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/lpk', {
                        nama_lpk: this.nama_lpk,
                        phone: this.phone,
                        alamat: this.alamat,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        // vm.loading = false;
                        // Swal.fire({
                        //     title: 'Berhasil',
                        //     text: 'LPK berhasil didaftarkan.',
                        //     icon: 'success',
                        //     allowOutsideClick: false,
                        // }).then((result) => {
                        //     if (result.isConfirmed) {

                        //         window.location.href = '/lpk/daftar/halaman_cetak/'; 
                        //     }
                        // })
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
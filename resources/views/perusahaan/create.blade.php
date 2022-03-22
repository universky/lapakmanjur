@extends('layouts_admin.app')
@section('title')
Tambah Perusahaan
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
                        <h5 class="breadcrumbs-title"><span>Tambah Perusahaan</span></h5>
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
                                                <input type="text" v-model="name">
                                                <label for="name">Nama Perusahaan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="industri">
                                                    <option value="" disabled selected>Pilih Industri</option>
                                                    <option value="IT Development">IT Development</option>
                                                    <option value="IT Support">IT Support</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                </select>
                                                <label>Industri</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="lokasi">
                                                <label for="lokasi">Lokasi</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="website">
                                                <label for="website">Website</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="phone">
                                                <label for="phone">Phone</label>
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
            name: '',
            industri: '',
            lokasi: '',
            website: '',
            phone: '',
            alamat: '',
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
                axios.post('/perusahaan', {
                        name: this.name,
                        industri: this.industri,
                        lokasi: this.lokasi,
                        website: this.website,
                        phone: this.phone,
                        alamat: this.alamat,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data Perusahaan telah dibuat.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/perusahaan';
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
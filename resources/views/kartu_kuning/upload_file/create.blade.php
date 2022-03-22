@extends('layouts.app')
@section('title')
Pengisian Form AK1 - Upload Berkas
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
                        <h5 class="breadcrumbs-title"><span>Pengisian Form Data AK1 - Upload Berkas</span></h5>
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
                            <p>Pastikan data sesuai.
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
                                            <div class="col s6">
                                                <label for="foto">
                                                    <h6>File Foto</h6>
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
                                                    <h6>File Ijazah</h6>
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
<script>
    let app = new Vue({
        el: '#app',
        data: {
            id: '{{$id}}',
            foto: '',
            ijazah: '',
            created_at: '',
            updated_at: '',

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
            // previewFiles(event) {
            //     this.foto = event.target.files[0];
            //     this.ijazah = event.target.files[0];
            // },

            submitForm: function() {
                this.sendData();
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

                    created_at: this.created_at,
                    updated_at: this.updated_at,
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
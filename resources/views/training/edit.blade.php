@extends('layouts.app')
@section('title')
Edit Pelatihan
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
                        <h5 class="breadcrumbs-title"><span>Edit Pelatihan</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/lpk/detail/{{$training->lpk_id}}">Kembali</a>
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
                                                <select v-model="lpk_id" disabled>
                                                    <option value="" disabled selected>Pilih LPK</option>
                                                    <option v-for="(lpk,index) in lpks" :value="lpk.id">@{{ lpk.nama_lpk }}</option>
                                                </select>
                                                <label>Nama LPK</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="nama_pelatihan">
                                                <label for="nama_pelatihan">Nama Program Pelatihan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="kategori">
                                                    <option value="" disabled selected>Pilih Kategori</option>
                                                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                                                    <option value="Graphic Design">Graphic Design</option>
                                                    <option value="Web Programming">Web Programming</option>
                                                    <option value="Network Administrator">Network Administrator</option>
                                                    <option value="Digital Marketing">Digital Marketing</option>
                                                    <option value="English for Frontliner">English for Frontliner</option>
                                                </select>
                                                <label>Kategori</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="jumlah_paket">
                                                <label for="jumlah_paket">Jumlah Paket</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="jumlah_peserta">
                                                <label for="jumlah_peserta">Jumlah Peserta</label>
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
            lpk_id: '{{$training->lpk_id}}',
            nama_pelatihan: '{{$training->nama_pelatihan}}',
            kategori: '{{$training->kategori}}',
            jumlah_paket: '{{$training->jumlah_paket}}',
            jumlah_peserta: '{{$training->jumlah_peserta}}',
            created_at: '',
            updated_at: '',

            lpks: JSON.parse('{!! $lpks !!}'),

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
                axios.patch('/training/{{$training->id}}', {
                        lpk_id: this.lpk_id,
                        nama_pelatihan: this.nama_pelatihan,
                        kategori: this.kategori,
                        jumlah_paket: this.jumlah_paket,
                        jumlah_peserta: this.jumlah_peserta,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Program Pelatihan telah diperbaharui.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/lpk/detail/{{$training->lpk_id}}';
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
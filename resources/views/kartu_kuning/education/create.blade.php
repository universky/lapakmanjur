@extends('layouts.app')
@section('title')
Pengisian Form AK1 - Pendidikan
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
                        <h5 class="breadcrumbs-title"><span>Pengisian Form Data AK1 - Pendidikan</span></h5>
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
                                                <label for="ipk">Nilai Ijazah/IPK (contoh : 2.75)</label>
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
            pendidikan: '',
            jurusan: '',
            nama_institusi: '',
            tahun_lulus: '',
            lama_pendidikan: '',
            ipk: '',
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
                axios.post('/education', {
                        id: this.id,
                        pendidikan: this.pendidikan,
                        jurusan: this.jurusan,
                        nama_institusi: this.nama_institusi,
                        tahun_lulus: this.tahun_lulus,
                        lama_pendidikan: this.lama_pendidikan,
                        ipk: this.ipk,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data Pendidikan berhasil disimpan.',
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
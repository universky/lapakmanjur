@extends('layouts_admin.app')
@section('title')
Tambah Pekerjaan
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
                        <h5 class="breadcrumbs-title"><span>Tambah Pekerjaan</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/loker">Kembali</a>
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
                                                <select v-model="company_id">
                                                    <option value="" disabled selected>Pilih Perusahaan</option>
                                                    <option v-for="(company, index) in companies" :value="company.id">@{{company.name}}</option>
                                                </select>
                                                <label>Perusahaan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select v-model="kategori">
                                                    <option value="" disabled selected>Pilih Kategori Pekerjaan</option>
                                                    <option value="Web Programming">Web Programming</option>
                                                    <option value="IT Support">IT Support</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                </select>
                                                <label>Kategori Pekerjaan</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="nama_pekerjaan">
                                                <label for="nama_pekerjaan">Nama Pekerjaan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="gaji1" v-cleave="cleaveCurrency">
                                                <label for="gaji1">Gaji Minimum</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="gaji2" v-cleave="cleaveCurrency">
                                                <label for="gaji2">Gaji Maksimum</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="jam_kerja">
                                                <label for="jam_kerja">Jam Kerja</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="pengalaman">
                                                    <option value="" disabled selected>Pilih Pengalaman</option>
                                                    <option value="0 - 1 Tahun">0 - 1 Tahun</option>
                                                    <option value="1 - 3 Tahun">1 - 3 Tahun</option>
                                                    <option value="> 3 Tahun">> 3 Tahun</option>
                                                </select>
                                                <label>Pilih Pengalaman</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="kemampuan_wajib">
                                                <label for="kemampuan_wajib">Kemampuan Wajib</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" v-model="kemampuan_tambahan">
                                                <label for="kemampuan_tambahan">Kemampuan Tambahan</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="deskripsi" v-model="deskripsi" class="materialize-textarea"></textarea>
                                                <label for="deskripsi">Deskripsi</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="date" v-model="tgl_buat">
                                                <label for="tgl_buat">Tanggal Buat</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="date" v-model="batas_tgl">
                                                <label for="batas_tgl">Batas</label>
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
<script>
    Vue.directive('cleave', {
        inserted: (el, binding) => {
            el.cleave = new Cleave(el, binding.value || {})
        },
        update: (el) => {
            const event = new Event('input', {
                bubbles: true
            });
            setTimeout(function() {
                el.value = el.cleave.properties.result
                el.dispatchEvent(event)
            }, 100);
        }
    });

    let app = new Vue({
        el: '#app',
        data: {
            company_id: '',
            kategori: '',
            nama_pekerjaan: '',
            gaji1: '',
            gaji2: '',
            jam_kerja: '',
            pengalaman: '',
            kemampuan_wajib: '',
            kemampuan_tambahan: '',
            deskripsi: '',
            tgl_buat: '',
            batas_tgl: '',
            created_at: '',
            updated_at: '',

            companies: JSON.parse(String.raw `{!! $companies !!}`),
            loading: false,

            cleaveCurrency: {
                delimiter: '.',
                numeralDecimalMark: ',',
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            },
        },
        methods: {
            submitForm: function() {
                this.sendData();
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/loker', {
                        company_id: this.company_id,
                        kategori: this.kategori,
                        nama_pekerjaan: this.nama_pekerjaan,
                        gaji1: this.gaji1,
                        gaji2: this.gaji2,
                        jam_kerja: this.jam_kerja,
                        pengalaman: this.pengalaman,
                        kemampuan_wajib: this.kemampuan_wajib,
                        kemampuan_tambahan: this.kemampuan_tambahan,
                        deskripsi: this.deskripsi,
                        tgl_buat: this.tgl_buat,
                        batas_tgl: this.batas_tgl,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data Pekerjaan telah dibuat.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/loker';
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
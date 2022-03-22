@extends('layouts.app')
@section('title')
Pengisian Form AK1 - Harapan Pekerjaan
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
                        <h5 class="breadcrumbs-title"><span>Pengisian Form Data AK1 - Harapan Pekerjaan</span></h5>
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
                                                <select class="select2 browser-default" v-model="provinsi_harapan" id="selectProvinsi">
                                                    <option value="" disabled selected>Pilih Provinsi Harapan</option>
                                                    <optgroup label="SUMATRA">
                                                        <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                                        <option value="Bengkulu">Bengkulu</option>
                                                        <option value="Riau">Riau</option>
                                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                        <option value="Jambi">Jambi</option>
                                                        <option value="Lampung">Lampung</option>
                                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                                    </optgroup>
                                                    <optgroup label="KALIMANTAN">
                                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                                    </optgroup>
                                                    <optgroup label="JAWA">
                                                        <option value="Banten">Banten</option>
                                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                                        <option value="Jawa Barat">Jawa Barat</option>
                                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                                                        <option value="Jawa timur">Jawa timur</option>
                                                    </optgroup>
                                                    <optgroup label="NUSA TENGGARA & BALI">
                                                        <option value="Bali">Bali</option>
                                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                                    </optgroup>
                                                    <optgroup label="SULAWESI">
                                                        <option value="Gorontalo">Gorontalo</option>
                                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                    </optgroup>
                                                    <optgroup label="MALUKU & PAPUA">
                                                        <option value="Maluku Utara">Maluku Utara</option>
                                                        <option value="Maluku">Maluku</option>
                                                        <option value="Papua Barat">Papua Barat</option>
                                                        <option value="Papua">Papua</option>
                                                    </optgroup>
                                                </select>
                                                <label>Provinsi Harapan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <select class="select2 browser-default" v-model="kab_harapan" id="selectKab">
                                                    <option value="" disabled selected>Pilih Kabupaten/Kota Harapan</option>
                                                    <template v-if="provinsi_harapan == 'Nanggroe Aceh Darussalam'">
                                                        <option value="Banda Aceh">Banda Aceh</option>
                                                        <option value="Langsa">Langsa</option>
                                                        <option value="Lhokseumawe">Lhokseumawe</option>
                                                        <option value="Sabang">Sabang</option>
                                                        <option value="Subulussalam">Subulussalam</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sumatera Utara'">
                                                        <option value="Binjai">Binjai</option>
                                                        <option value="Gunungsitoli">Gunungsitoli</option>
                                                        <option value="Medan">Medan</option>
                                                        <option value="Padang Sidempuan">Padang Sidempuan</option>
                                                        <option value="Pematangsiantar">Pematangsiantar</option>
                                                        <option value="Sibolga">Sibolga</option>
                                                        <option value="Tanjungbalai">Tanjungbalai</option>
                                                        <option value="Tebing Tinggi">Tebing Tinggi</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sumatera Selatan'">
                                                        <option value="Lubuklinggau">Lubuklinggau</option>
                                                        <option value="Pagar Alam">Pagar Alam</option>
                                                        <option value="Palembang">Palembang</option>
                                                        <option value="Prabumulih">Prabumulih</option>
                                                        <option value="Sekayu">Sekayu</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sumatera Barat'">
                                                        <option value="Bukittinggi">Bukittinggi</option>
                                                        <option value="Padang">Padang</option>
                                                        <option value="Padang Panjang">Padang Panjang</option>
                                                        <option value="Pariaman">Pariaman</option>
                                                        <option value="Payakumbuh">Payakumbuh</option>
                                                        <option value="Sawahlunto">Sawahlunto</option>
                                                        <option value="Solok">Solok</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Bengkulu'">
                                                        <option value="Bengkulu">Bengkulu</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Riau'" label="RIAU">
                                                        <option value="Dumai">Dumai</option>
                                                        <option value="Pekanbaru">Pekanbaru</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Kepulauan Riau'">
                                                        <option value="Batam">Batam</option>
                                                        <option value="Tanjungpinang">Tanjungpinang</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Jambi'">
                                                        <option value="Sungai Penuh">Sungai Penuh</option>
                                                        <option value="Jambi">Jambi</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Lampung'">
                                                        <option value="Bandar Lampung">Bandar Lampung</option>
                                                        <option value="Metro">Metro</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Bangka Belitung'">
                                                        <option value="Pangkal Pinang">Pangkal Pinang</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Kalimantan Barat'">
                                                        <option value="Pontianak">Pontianak</option>
                                                        <option value="Singkawang">Singkawang</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Kalimantan Timur'">
                                                        <option value="Balikpapan">Balikpapan</option>
                                                        <option value="Bontang">Bontang</option>
                                                        <option value="Samarinda">Samarinda</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Kalimantan Selatan'">
                                                        <option value="Banjarbaru">Banjarbaru</option>
                                                        <option value="Banjarmasin">Banjarmasin</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Kalimantan Tengan'">
                                                        <option value="Palangkaraya">Palangkaraya</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Kalimantan Utara'">
                                                        <option value="Tarakan">Tarakan</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Banten'">
                                                        <option value="Cilegon">Cilegon</option>
                                                        <option value="Serang">Serang</option>
                                                        <option value="Tangerang Selatan">Tangerang Selatan</option>
                                                        <option value="Tangerang">Tangerang</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'DKI Jakarta'">
                                                        <option value="Jakarta Barat">Jakarta Barat</option>
                                                        <option value="Jakarta Pusat">Jakarta Pusat</option>
                                                        <option value="Jakarta Selatan">Jakarta Selatan</option>
                                                        <option value="Jakarta Timur">Jakarta Timur</option>
                                                        <option value="Jakarta Utara">Jakarta Utara</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Jawa Barat'">
                                                        <option value="Bandung">Bandung</option>
                                                        <option value="Bekasi">Bekasi</option>
                                                        <option value="Bogor">Bogor</option>
                                                        <option value="Cimahi">Cimahi</option>
                                                        <option value="Cirebon">Cirebon</option>
                                                        <option value="Depok">Depok</option>
                                                        <option value="Sukabumi">Sukabumi</option>
                                                        <option value="Tasikmalaya">Tasikmalaya</option>
                                                        <option value="Banjar">Banjar</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Jawa Tengah'">
                                                        <option value="Magelang">Magelang</option>
                                                        <option value="Pekalongan">Pekalongan</option>
                                                        <option value="Salatiga">Salatiga</option>
                                                        <option value="Semarang">Semarang</option>
                                                        <option value="Surakarta">Surakarta</option>
                                                        <option value="Tegal">Tegal</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'DI Yogyakarta'">
                                                        <option value="Yogyakarta">Yogyakarta</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Jawa Timur'">
                                                        <option value="Batu">Batu</option>
                                                        <option value="Blitar">Blitar</option>
                                                        <option value="Kediri">Kediri</option>
                                                        <option value="Madiun">Madiun</option>
                                                        <option value="Malang">Malang</option>
                                                        <option value="Mojokerto">Mojokerto</option>
                                                        <option value="Pasuruan">Pasuruan</option>
                                                        <option value="Probolinggo">Probolinggo</option>
                                                        <option value="Surabaya">Surabaya</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Bali'">
                                                        <option value="Denpasar">Denpasar</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Nusa Tenggara Timur'">
                                                        <option value="Kupang">Kupang</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Nusa Tenggara Barat'">
                                                        <option value="Bima">Bima</option>
                                                        <option value="Mataram">Mataram</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Gorontalo'">
                                                        <option value="Gorontalo">Gorontalo</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sulawesi Barat'">
                                                        <option value="Kabupaten Majene">Kabupaten Majene</option>
                                                        <option value="Kabupaten Mamasa">Kabupaten Mamasa</option>
                                                        <option value="Kabupaten Mamuju">Kabupaten Mamuju</option>
                                                        <option value="Kabupaten Mamuju Tengah">Kabupaten Mamuju Tengah</option>
                                                        <option value="Kabupaten Pasangkayu">Kabupaten Pasangkayu</option>
                                                        <option value="Kabupaten Polewali Mandar">Kabupaten Polewali Mandar</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sulawesi Tengah'">
                                                        <option value="Palu">Palu</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sulawesi Utara'">
                                                        <option value="Bitung">Bitung</option>
                                                        <option value="Kotamobagu">Kotamobagu</option>
                                                        <option value="Manado">Manado</option>
                                                        <option value="Tomohon">Tomohon</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sulawesi Tenggara'">
                                                        <option value="Baubau">Baubau</option>
                                                        <option value="Kendari">Kendari</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Sulawesi Selatan'">
                                                        <option value="Makassar">Makassar</option>
                                                        <option value="Palopo">Palopo</option>
                                                        <option value="Parepare">Parepare</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Maluku Utara'">
                                                        <option value="Ternate">Ternate</option>
                                                        <option value="Tidoro Kepulauan">Tidoro Kepulauan</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Maluku'">
                                                        <option value="Ambon">Ambon</option>
                                                        <option value="Tual">Tual</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Papua Barat'">
                                                        <option value="Sorong">Sorong</option>
                                                    </template>
                                                    <template v-if="provinsi_harapan == 'Papua'">
                                                        <option value="Jayapura">Jayapura</option>
                                                    </template>
                                                </select>
                                                <label>Kabupaten/Kota Harapan</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" v-model="min_gaji_harapan" v-cleave="cleaveCurrency">
                                                <label for="min_gaji_harapan">Min. Gaji Harapan</label>
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
    $(document).ready(function() {
        $('#selectProvinsi').select2({
            search: true,
        });
    });

    $(document).ready(function() {
        $('#selectKab').select2({
            search: true,
        });
    });
</script>
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
            id: '{{$id}}',
            penempatan: '',
            provinsi_harapan: '',
            kab_harapan: '',
            min_gaji_harapan: '',
            created_at: '',
            updated_at: '',

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
                axios.post('/job_expectation', {
                        id: this.id,
                        penempatan: this.penempatan,
                        provinsi_harapan: this.provinsi_harapan,
                        kab_harapan: this.kab_harapan,
                        min_gaji_harapan: this.min_gaji_harapan,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data Pekerjaan Harapan berhasil disimpan.',
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
<script>
    $('#selectProvinsi').on('change', function() {
        app.$data.provinsi_harapan = $(this).val()
        console.log($(this).val())
    });

    $('#selectKab').on('change', function() {
        app.$data.kab_harapan = $(this).val()
        console.log($(this).val())
    });
</script>
@endsection
@extends('layouts.app')
@section('title')
Pengisian Form AK1 - Pengalaman Bekerja
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
                        <h5 class="breadcrumbs-title"><span>Pengisian Form Data AK1 - Pengalaman Bekerja</span></h5>
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
                                            <div class="col s12">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <div class="row">
                                                                <div class="col s11">
                                                                    <h6>Pengalaman Bekerja</h6>
                                                                </div>
                                                                <div class="col s1">
                                                                    <!-- <th class="col-sm-2" style="text-align: right;"> -->
                                                                    <span class="mb-6 btn waves-effect waves-light cyan" v-on:click="addRow"><i class="material-icons">add</i></span>
                                                                    <!-- </th> -->
                                                                </div>
                                                            </div>
                                                        </tr>
                                                        <template v-for="(experience, index) in experienceList">
                                                            <tr>
                                                                <td style="text-align: left;">
                                                                    <div class="row">
                                                                        <div class="input-field col s6">
                                                                            <input type="text" v-model="experience.nama_perusahaan">
                                                                            <label for="nama_perusahaan">Nama Perusahaan</label>
                                                                        </div>
                                                                        <div class="input-field col s6">
                                                                            <input type="text" v-model="experience.jabatan">
                                                                            <label for="jabatan">Jabatan</label>
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: left;">
                                                                    <div class="row">
                                                                        <div class="input-field col s6">
                                                                            <input type="text" v-model="experience.deskripsi_pekerjaan">
                                                                            <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                                                                        </div>
                                                                        <div class="input-field col s6">
                                                                            <input type="text" v-model="experience.lama_kerja">
                                                                            <label for="lama_kerja">Lama Kerja</label>
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: left;">
                                                                    <div class="row">
                                                                        <div class="input-field col s6">
                                                                            <input type="text" v-model="experience.gaji">
                                                                            <label for="gaji">Gaji</label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: right;">
                                                                    <a href="#" @click.prevent="deleteRow(index)" class="mb-6 btn waves-effect waves-light red accent-2"><i class="material-icons">close</i></a>
                                                                </td>
                                                            </tr>
                                                        </template>


                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                                            <i class="material-icons right">save</i>Save
                                                        </button>
                                                    </div>
                                                </div>
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

            experienceList: [],

            loading: false,
        },
        methods: {

            addRow: function(event) {
                // console.log("masuk");
                const data = {
                    ...[]
                };
                data['nama_perusahaan'] = "";
                data['jabatan'] = "";
                data['deskripsi_pekerjaan'] = "";
                data['lama_kerja'] = "";
                data['gaji'] = "";

                this.experienceList.push(data);
            },
            deleteRow: function(index) {
                this.experienceList.splice(index, 1);
            },
            submitForm: function() {
                console.log(this.data['nama_perusahaan'])
                // this.sendData();
                console.log(this.experienceList);
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/experience', {
                        id: this.id,
                        experienceList: this.experienceList,

                        created_at: this.created_at,
                        updated_at: this.updated_at,
                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data Pengalaman berhasil disimpan.',
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

        },
        mounted() {
            this.addRow()
        }
    })
</script>
@endsection
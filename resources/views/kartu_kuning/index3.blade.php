@extends('layouts.app')

@section('title')
AK1
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
                        <h5 class="breadcrumbs-title"><span>AK1</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/homepage">Kembali</a>
                            </li>
                            <!-- <li class="breadcrumb-item active">AK1
                            </li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <!-- users view start -->
                <div class="section users-view">
                    <!-- users view media object start -->
                    <div class="card-alert card cyan">
                        <div class="card-content white-text">
                            <p>Beberapa info pendaftaran AK1 Kabupaten Cianjur:</p>
                            <br>
                            <p><span>&#8226;</span> NIK harus terdaftar di dalam database Kabupaten Cianjur </p>
                            <p><span>&#8226;</span> Usia minimal pendaftar adalah 18 Tahun
                            </p>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="row">

                            <div class="col s12 m7">
                                <div class="display-flex media">
                                    <a href="#" class="avatar">
                                        <img src="{{ asset('assets/images/avatar/avatar-15.png') }}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name"></span>
                                            <span class="grey-text">{{$user->name}}</span>
                                            <span class="users-view-username grey-text">{{ $user->username }}</span>
                                        </h6>
                                        <span>NIK:</span>
                                        <span class="users-view-id">{{$user->nik}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users view media object ends -->
                    <!-- users view card data start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>No. Pencari Kerja:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tgl. Pendaftaran:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Masa Berlaku:</td>
                                                <td class="users-view-latest-activity"></td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td></td>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users view card data ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Personal Info</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">

                                        <a class="btn cyan waves-effect waves-light" href="/personal/create">
                                            <i class="material-icons">add</i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>NIK:</td>
                                                <td class="users-view-username"></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap:</td>
                                                <td class="users-view-name"></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Kondisi Fisik</td>
                                                <td class="users-view-email"></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Lahir:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Status Kawin:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Agama:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>RT:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>RW:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>No. HP:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi Badan:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Berat Badan:</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Data Pendidikan</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" disabled>
                                            <i class="material-icons">add</i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Pendidikan:</td>
                                                <td class="users-view-username"></td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan:</td>
                                                <td class="users-view-name"></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Institusi Pendidikan:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Lulus</td>
                                                <td class="users-view-email"></td>
                                            </tr>
                                            <tr>
                                                <td>Lama Pendidikan:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Ijazah/IPK:</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Data Harapan Kerja</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" disabled>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Penempatan:</td>
                                                <td class="users-view-username"></td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi:</td>
                                                <td class="users-view-name"></td>
                                            </tr>
                                            <tr>
                                                <td>Kabupaten/Kota:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Sistem Pembayaran:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Min. Gaji</td>
                                                <td class="users-view-email"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Data Pengalaman Kerja</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" disabled>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Nama Perusahaan:</td>
                                                <td class="users-view-username"></td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan:</td>
                                                <td class="users-view-name"></td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi Pekerjaan:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Lama Kerja:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Gaji</td>
                                                <td class="users-view-email"></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Penguasaan Keterampilan dan Bahasa</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" disabled>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Keterampilan:</td>
                                                <td class="users-view-username"></td>
                                            </tr>
                                            <tr>
                                                <td>Bahasa:</td>
                                                <td class="users-view-name"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Upload Berkas</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" disabled>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>File Foto:</td>
                                                <td class="users-view-username"></td>
                                            </tr>
                                            <tr>
                                                <td>File Ijazah:</td>
                                                <td class="users-view-name"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->
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
            alasan: '',
        },
        methods: {
            submit: function() {
                this.sendDataApprove();
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/kartu_kuning/', {
                        alasan: this.alasan,

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
                                window.location.href = '/kartu_kuning/';
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
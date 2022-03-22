@extends('layouts.app')

@section('title')
Detail Permohonan LPK
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
                        <h5 class="breadcrumbs-title"><span>Detail Permohonan LPK</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <!-- <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li> -->
                            <li class="breadcrumb-item"><a href="/lpk">Kembali</a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Detail Kartu Kuning
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
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12 m7">
                                <div class="display-flex media">
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name">{{$lpk->nama_lpk}}</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                <?php if ($lpk->status == "Approved") { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger disabled">Approve</a>

                                    <a href="#reject" class="btn-small btn-light-indigo modal-trigger">Reject</a>
                                    <div id="reject" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitReject">
                                            <div class="modal-content">
                                                <h5>Reject LPK</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menolak permohonan LPK atas nama {{$lpk->nama_lpk}} dengan No. Registrasi {{$lpk->no_registrasi}}?</p>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input type="text" placeholder="Masukkan Alasan" v-model="alasan" required>
                                                        <label for="alasan">Alasan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Ya, Tolak.</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } else if ($lpk->status == "Rejected") { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger">Approve</a>
                                    <div id="approve" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitApprove">
                                            <div class="modal-content">
                                                <h5>Approve LPK</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menyetujui permohonan LPK atas nama <span style="font-weight:bold;">{{$lpk->nama_lpk}}</span> dengan No. Registrasi <span>{{$lpk->no_registrasi}}</span>?</p>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input type="text" placeholder="Masukkan Alasan" v-model="alasan" required>
                                                        <label for="alasan">Alasan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Ya, Setujui.</button>
                                            </div>
                                        </form>
                                    </div>

                                    <a href="#reject" class="btn-small btn-light-indigo modal-trigger disabled">Reject</a>

                                <?php } else { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger">Approve</a>
                                    <div id="approve" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitApprove">
                                            <div class="modal-content">
                                                <h5>Approve LPK</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menyetujui permohonan LPK atas nama <span style="font-weight:bold;">{{$lpk->nama_lpk}}</span> dengan No. Registrasi <span>{{$lpk->no_registrasi}}</span>?</p>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input type="text" placeholder="Masukkan Alasan" v-model="alasan" required>
                                                        <label for="alasan">Alasan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Ya, Setujui.</button>
                                            </div>
                                        </form>
                                    </div>

                                    <a href="#reject" class="btn-small btn-light-indigo modal-trigger">Reject</a>
                                    <div id="reject" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitReject">
                                            <div class="modal-content">
                                                <h5>Reject LPK</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menolak permohonan LPK atas nama {{$lpk->nama_lpk}} dengan No. Registrasi {{$lpk->no_registrasi}}?</p>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input type="text" placeholder="Masukkan Alasan" v-model="alasan" required>
                                                        <label for="alasan">Alasan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Ya, Tolak.</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                                <a href="/lpk/cetak_lpk/{{$lpk->id}}" class="btn-small cyan waves-effect waves-light modal-trigger" target="_blank"><i class="material-icons">archive</i></a>
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
                                                <td>No. Registrasi LPK</td>
                                                <td>:&ensp;{{ $lpk->no_registrasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl. Pengajuan</td>
                                                <td>:&ensp;{{ $lpk->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama LPK</td>
                                                <td>:&ensp;{{ $lpk->nama_lpk }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <?php if ($lpk->status == "Approved") { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip green lighten-5 green-text">{{ $lpk->status }}</span></td>
                                                <?php } else if ($lpk->status == "Rejected") { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip red lighten-5 red-text">{{ $lpk->status }}</span></td>
                                                <?php } else { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip blue lighten-5 blue-text">{{ $lpk->status }}</span></td>
                                                <?php } ?>
                                            </tr>
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
                                    <h6 class="indigo-text m-0">Informasi Pemohon LPK</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Nama LPK</td>
                                                <td class="users-view-username">:&ensp;{{ $lpk->nama_lpk }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. HP</td>
                                                <td class="users-view-name">:&ensp;{{ $lpk->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:&ensp;{{ $lpk->alamat }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <?php if ($lpk->status == "Approved") { ?>
                        <!-- <div class="col s12"> -->
                        <!-- <div class="container"> -->
                        <div class="section section-data-tables">

                            <!-- Page Length Options -->
                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-header">
                                            <br>
                                            <div class="row">
                                                <div class="col s7 m7 users-view-timeline">
                                                    <h5 class="indigo-text m-0 right">&ensp;Program Pelatihan</h5><br>
                                                </div>
                                                <div class="col s5 users-view-timeline">
                                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                                        <a class="mb-6 btn btn-light-indigo" href="/training/create/{{$lpk->id}}">
                                                            <i class="material-icons">add</i>&ensp;Buat Pelatihan
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="divider"></div>
                                        </div>

                                        <div class="card-content">
                                            <div class="row">
                                                <div class="col s12">
                                                    <br><br>
                                                    <table id="page-length-option" class="display">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">Tanggal</th>
                                                                <th style="text-align: center;">Program Pelatihan</th>
                                                                <th style="text-align: center;">Kategori</th>
                                                                <th style="text-align: center;">Jumlah Paket</th>
                                                                <th style="text-align: center;">Jumlah Peserta</th>
                                                                <th style="text-align: center;">Status</th>
                                                                <th style="text-align: center;">Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(training, index) in trainings">
                                                                <td style="text-align: center;">@{{training.date}}</td>
                                                                <td style="text-align: center;">@{{training.nama_pelatihan}}</td>
                                                                <td style="text-align: center;">@{{training.kategori}}</td>
                                                                <td style="text-align: center;">@{{training.jumlah_paket}}</td>
                                                                <td style="text-align: center;">@{{training.jumlah_peserta}}</td>
                                                                <td style="text-align: center;" v-if="training.status == 'Aktif'"><span class=" users-view-status chip green lighten-5 green-text">@{{ training.status }}</span></td>
                                                                <td style="text-align: center;" v-if="training.status == 'Tidak Aktif'"><span class=" users-view-status chip red lighten-5 red-text">@{{ training.status }}</span></td>
                                                                <!-- <td style="text-align: center;">
                                                                    <a class='btn-small btn-light-indigo dropdown-trigger' style="color:black;" href='#' data-target='option'><i class="material-icons">more_horiz</i></a>
                                                                    <ul id='option' class='dropdown-content'>
                                                                        <li><a :href="`/training/edit/` + training.id">Edit</a></li>
                                                                        <li><a href="#" @click.prevent="deleteRecord(training.id)">Hapus</a></li>
                                                                    </ul>
                                                                </td> -->
                                                                <td style="text-align: center;">
                                                                    <a :href="`/training/edit/` + training.id" class="mb-6 btn waves-effect waves-light cyan"><i class="material-icons">create</i></a>

                                                                    <a href="#" @click.prevent="deleteRecord(training.id)" class="mb-6 btn waves-effect waves-light red accent-2"><i class="material-icons">delete</i></a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th style="text-align: center;">Tanggal</th>
                                                                <th style="text-align: center;">Program Pelatihan</th>
                                                                <th style="text-align: center;">Kategori</th>
                                                                <th style="text-align: center;">Jumlah Paket</th>
                                                                <th style="text-align: center;">Jumlah Peserta</th>
                                                                <th style="text-align: center;">Status</th>
                                                                <th style="text-align: center;">Opsi</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-overlay"></div>
                        <!-- </div> -->
                        <!-- </div> -->
                    <?php } ?>
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
            trainings: JSON.parse(String.raw `{!! $trainings !!}`)
        },
        methods: {
            deleteRecord: function(id) {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data Pelatihan akan dihapus",
                    icon: 'warning',
                    reverseButtons: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return axios.delete('/training/' + id)
                            .then(function(response) {
                                console.log(response.data);
                            })
                            .catch(function(error) {
                                console.log(error.data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops',
                                    text: 'Something wrong',
                                })
                            });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data Pelatihan berhasil dihapus',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    }
                })
            },
            submitApprove: function() {
                this.sendDataApprove();
            },
            sendDataApprove: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/lpk/detail/approval/{{$lpk->id}}', {
                        alasan: this.alasan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'LPK Disetujui',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/lpk/detail/{{$lpk->id}}';
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
            submitReject: function() {
                this.sendDataReject();
            },
            sendDataReject: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/lpk/detail/reject/{{$lpk->id}}', {
                        alasan: this.alasan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'LPK Ditolak',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/lpk/detail/{{$lpk->id}}';
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
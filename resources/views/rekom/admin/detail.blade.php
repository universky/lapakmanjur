@extends('layouts.app')

@section('title')
Detail Permohonan Rekom Passport
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
                        <h5 class="breadcrumbs-title"><span>Detail Permohonan Rekom Passport</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <!-- <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li> -->
                            <li class="breadcrumb-item"><a href="/rekom_passport/admin">Kembali</a>
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
                                    <a href="#" class="avatar">
                                        <img src="{{ asset('assets/images/avatar/avatar-15.png') }}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name">{{$personal->nama_lengkap}}</span>
                                        </h6>
                                        <span>NIK:</span>
                                        <span class="users-view-id">{{$kartu_kuning->nik}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                <?php if ($rekom_passport->status == "Approved") { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger disabled">Approve</a>

                                    <a href="#reject" class="btn-small btn-light-indigo modal-trigger">Reject</a>
                                    <div id="reject" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitReject">
                                            <div class="modal-content">
                                                <h5>Reject Rekom Passport</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menolak permohonan Rekom Passport atas nama {{$personal->nama_lengkap}} dengan NIK {{$personal->nik}}?</p>
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
                                <?php } else if ($rekom_passport->status == "Rejected") { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger">Approve</a>
                                    <div id="approve" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitApprove">
                                            <div class="modal-content">
                                                <h5>Approve Rekom Passport</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menyetujui permohonan Rekom Passport atas nama <span style="font-weight:bold;">{{$personal->nama_lengkap}}</span> dengan NIK <span>{{$kartu_kuning->nik}}</span>?</p>
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
                                                <h5>Approve Rekom Passport</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menyetujui permohonan Rekom Passport atas nama {{$personal->nama_lengkap}} dengan NIK {{$kartu_kuning->nik}}?</p>
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
                                                <h5>Reject Rekom Passport</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menolak permohonan Rekom Passport atas nama {{$personal->nama_lengkap}} dengan NIK {{$personal->nik}}?</p>
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
                                <a href="/kartu_kuning/cetak_permohonan/{{$kartu_kuning->id}}" class="btn-small cyan waves-effect waves-light modal-trigger" target="_blank"><i class="material-icons">archive</i></a>
                                <!-- <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" href="/upload_file/cetak_permohonan/{{$kartu_kuning->id}}">
                                            <i class="material-icons right">download</i>Download Berkas
                                        </a>
                                    </div>
                                </div> -->
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
                                                <td>{{ $kartu_kuning->no_pencari_kerja }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. Registrasi:</td>
                                                <td>{{ $rekom_passport->no_registrasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl. Pengajuan:</td>
                                                <td>{{ $rekom_passport->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tujuan Negara:</td>
                                                <td>{{ $rekom_passport->tujuan_negara }}</td>
                                            </tr>
                                            <tr>
                                                <td>Skema Penempatan:</td>
                                                <td>{{ $rekom_passport->skema_penempatan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <?php if ($rekom_passport->status == "Approved") { ?>
                                                    <td><span class=" users-view-status chip green lighten-5 green-text">{{ $rekom_passport->status }}</span></td>
                                                <?php } else if ($rekom_passport->status == "Rejected") { ?>
                                                    <td><span class=" users-view-status chip red lighten-5 red-text">{{ $rekom_passport->status }}</span></td>
                                                <?php } else { ?>
                                                    <td><span class=" users-view-status chip blue lighten-5 blue-text">{{ $rekom_passport->status }}</span></td>
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
                                    <h6 class="indigo-text m-0">Informasi Pemohon Rekom Passport</h6>
                                </div>

                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <a class="btn cyan waves-effect waves-light" href="/kartu_kuning/cetak_permohonan/{{$kartu_kuning->id}}" target="_blank">
                                            <i class="material-icons">archive</i>
                                        </a>
                                        <a class="btn cyan waves-effect waves-light" href="/rekom_passport/detail_pelamar/{{$rekom_passport->id}}">
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>NIK:</td>
                                                <td class="users-view-username">{{ $kartu_kuning->nik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap:</td>
                                                <td class="users-view-name">{{ $personal->nama_lengkap }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin:</td>
                                                <td>{{ $personal->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan:</td>
                                                <td>{{ $personal->kewarganegaraan }}</td>
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
            submitApprove: function() {
                this.sendDataApprove();
            },
            sendDataApprove: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/rekom_passport/detail/approval/{{$rekom_passport->id}}', {
                        alasan: this.alasan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Rekom Passport Disetujui',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/rekom_passport/detail/{{$rekom_passport->id}}';
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
                axios.post('/rekom_passport/detail/reject/{{$rekom_passport->id}}', {
                        alasan: this.alasan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Rekom Passport Ditolak',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/rekom_passport/detail/{{$rekom_passport->id}}';
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
@extends('layouts.app')

@section('title')
Detail Pengajuan Pelatihan
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
                        <h5 class="breadcrumbs-title"><span>Detail Pengajuan Pelatihan</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <!-- <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li> -->
                            <li class="breadcrumb-item"><a href="/training">Kembali</a>
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
                                            <span class="users-view-name">{{$training->nama_pelatihan}}</span>
                                            <p>{{$training->nama_lpk}}</p>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                <?php if ($training->status == "Approved") { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger disabled">Approve</a>

                                    <a href="#reject" class="btn-small btn-light-indigo modal-trigger">Reject</a>
                                    <div id="reject" class="modal modal-fixed-footer" style="width: 600px; height:400px; border-radius: 25px;">
                                        <form @submit.prevent="submitReject">
                                            <div class="modal-content">
                                                <h5>Reject Pengajuan Pelatihan</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menolak pengajuan Pelatihan {{$training->nama_pelatihan}} yang diajukan oleh {{$training->nama_lpk}}?</p>
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
                                <?php } else if ($training->status == "Rejected") { ?>

                                    <a href="#approve" class="btn-small btn-light-indigo modal-trigger">Approve</a>
                                    <div id="approve" class="modal modal-fixed-footer" style="width: 600px; height:450px; border-radius: 25px;">
                                        <form @submit.prevent="submitApprove">
                                            <div class="modal-content">
                                                <h5>Approve Pengajuan Pelatihan</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menyetujui pengajuan Pelatihan <span style="font-weight:bold;">{{$training->nama_pelatihan}}</span> yang diajukan oleh <span>{{$training->nama_lpk}}</span>?</p>
                                                <div class="row">
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
                                    <div id="approve" class="modal modal-fixed-footer" style="width: 600px; height:450px; border-radius: 25px;">
                                        <form @submit.prevent="submitApprove">
                                            <div class="modal-content">
                                                <h5>Approve Pengajuan Pelatihan</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menyetujui pengajuan Pelatihan <span style="font-weight:bold;">{{$training->nama_pelatihan}}</span> yang diajukan oleh <span>{{$training->nama_lpk}}</span>?</p>
                                                <div class="row">
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
                                                <h5>Reject Pengajuan Pelatihan</h5>
                                                <br>
                                                <p>Apakah anda yakin untuk menolak pengajuan Pelatihan {{$training->nama_pelatihan}} yang diajukan oleh {{$training->nama_lpk}}?</p>
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
                                <!-- <a href="/training/cetak" class="btn-small cyan waves-effect waves-light modal-trigger" target="_blank"><i class="material-icons">archive</i></a> -->
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
                                                <td>No. Registrasi Pelatihan</td>
                                                <td>:&ensp;{{ $training->no_registrasi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama LPK</td>
                                                <td>:&ensp;{{ $training->nama_lpk }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. HP</td>
                                                <td>:&ensp;{{ $training->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:&ensp;{{ $training->email }}</td>
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
                                    <h6 class="indigo-text m-0">Informasi Pelatihan</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Nama Pelatihan</td>
                                                <td>:&ensp;{{ $training->nama_pelatihan }}</td>
                                            </tr>
                                            <?php if ($training->kategori != null) { ?>
                                                <tr>
                                                    <td>Kategori</td>
                                                    <td>:&ensp;{{ $training->kategori }}</td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($training->jumlah_paket != null) { ?>
                                                <tr>
                                                    <td>Jumlah Paket</td>
                                                    <td>:&ensp;{{ $training->jumlah_paket }}</td>
                                                </tr>
                                            <?php } ?>
                                            <?php if ($training->jumlah_peserta) { ?>
                                                <tr>
                                                    <td>Jumlah Peserta</td>
                                                    <td>:&ensp;{{ $training->jumlah_peserta }}</td>
                                                </tr>
                                            <?php } ?>

                                            <tr>
                                                <td>Tgl. Pengajuan</td>
                                                <td>:&ensp;{{ $training->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <?php if ($training->status == "Approved") { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip green lighten-5 green-text">{{ $training->status }}</span></td>
                                                <?php } else if ($training->status == "Rejected") { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip red lighten-5 red-text">{{ $training->status }}</span></td>
                                                <?php } else { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip blue lighten-5 blue-text">{{ $training->status }}</span></td>
                                                <?php } ?>
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
            kategori: '',
            jumlah_paket: '',
            jumlah_peserta: '',
            training: JSON.parse(String.raw `{!! $training !!}`)
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
                axios.post('/training/detail/approval/{{$training->id}}', {
                        kategori: this.kategori,
                        jumlah_paket: this.jumlah_paket,
                        jumlah_peserta: this.jumlah_peserta,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Pelatihan Disetujui',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/training/detail/{{$training->id}}';
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
                axios.post('/training/detail/reject/{{$training->id}}', {
                        alasan: this.alasan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Pelatihan Ditolak',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/training/detail/{{$training->id}}';
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
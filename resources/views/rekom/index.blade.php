@extends('layouts.app')

@section('title')
Permohonan Rekom Passport
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
                        <h5 class="breadcrumbs-title"><span>Permohonan Rekom Passport</span></h5>
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
                            <p>Beberapa info pendaftaran Rekom Passport Kabupaten Cianjur:</p>
                            <br>
                            <p><span>&#8226;</span> AK1 harus sudah disetujui terlebih dahulu dan tidak ada perubahan. </p>
                            <p><span>&#8226;</span> Pemohon tidak dapat mengajukan permohonan Rekom Passport apabila AK1 belum disetujui.
                            </p>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="row">

                            <div class="col s6">
                                <div class="display-flex media">
                                    <a href="#" class="avatar">
                                        <img src="{{ asset('assets/images/avatar/avatar-15.png') }}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name"></span>
                                            <span class="grey-text">{{$personal->nama_lengkap}}</span>
                                            <span class="users-view-username grey-text">{{ $kartu_kuning->users->username }}</span>
                                        </h6>
                                        <span>NIK:</span>
                                        <span class="users-view-id">{{$kartu_kuning->nik}}</span>
                                    </div>


                                </div>
                            </div>
                            <div class="col s6 m6 users-view-timeline">
                                <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">

                                    <?php if ($kartu_kuning->status == "Approved") {
                                        if ($rekom_passport == null) { ?>

                                            <a href="#ajukan" class="btn-small btn-light-indigo modal-trigger">Ajukan</a>
                                            <div id="ajukan" class="modal modal-fixed-footer" style="width: 600px; height:600px; border-radius: 25px;">
                                                <form @submit.prevent="submitForm">
                                                    <div class="modal-content">
                                                        <h5>Pengajuan Permohonan Rekom Passport</h5>
                                                        <p style="color:red;">Pastikan AK1 sudah disetujui. Apabila sudah silahkan isi form dibawah:</p>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input type="text" placeholder="Masukkan Tujuan Negara" v-model="tujuan_negara" required>
                                                                <label for="tujuan_regara">Tujuan Negara</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <select v-model="skema_penempatan">
                                                                    <option value="" disabled selected>Pilih Skema Penempatan</option>
                                                                    <option value="PERSEORANGAN">PERSEORANGAN</option>
                                                                    <option value="UKPS">UKPS</option>
                                                                    <option value="P TO P">P TO P</option>
                                                                    <option value="P TO G">P TO G</option>
                                                                    <option value="G TO G">G TO G</option>
                                                                </select>
                                                                <label>Skema Penempatan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Lanjut.</button>
                                                    </div>
                                                </form>
                                            </div>

                                        <?php } else { ?>
                                            <?php if ($rekom_passport->status == "Rejected") { ?>
                                                <a href="#ajukan" class="btn-small btn-light-indigo modal-trigger">Ajukan</a>
                                                <div id="ajukan" class="modal modal-fixed-footer" style="width: 600px; height:600px; border-radius: 25px;">
                                                    <form @submit.prevent="submitFormReject">
                                                        <div class="modal-content">
                                                            <h5>Pengajuan Permohonan Rekom Passport</h5>
                                                            <p style="color:red;">Pastikan AK1 sudah disetujui. Apabila sudah silahkan isi form dibawah:</p>
                                                            <br>
                                                            <div class="row">
                                                                <div class="input-field col s12">
                                                                    <input type="text" placeholder="Masukkan Tujuan Negara" v-model="tujuan_negara" required>
                                                                    <label for="tujuan_regara">Tujuan Negara</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="input-field col s12">
                                                                    <select v-model="skema_penempatan">
                                                                        <option value="" disabled selected>Pilih Skema Penempatan</option>
                                                                        <option value="PERSEORANGAN">PERSEORANGAN</option>
                                                                        <option value="UKPS">UKPS</option>
                                                                        <option value="P TO P">P TO P</option>
                                                                        <option value="P TO G">P TO G</option>
                                                                        <option value="G TO G">G TO G</option>
                                                                    </select>
                                                                    <label>Skema Penempatan</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Lanjut.</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php } elseif ($rekom_passport->status == 'Pending') { ?>
                                                <a class="btn-small disabled mr-1">
                                                    Ajukan
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- <a href=" /kartu_kuning/cetak_permohonan/{{$kartu_kuning->id}}" class="btn-small cyan waves-effect waves-light modal-trigger" target="_blank"><i class="material-icons">archive</i></a> -->
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
                                                <td>No. Registrasi Rekom Passport</td>
                                                <td>:&ensp;{{$rekom_passport!=""?$rekom_passport->no_registrasi:""}}</td>
                                            </tr>
                                            <?php if ($rekom_passport != null) { ?>
                                                <tr>
                                                    <td>Status Rekom Passport</td>
                                                    <?php if ($rekom_passport->status == "Approved") { ?>
                                                        <td>:&ensp;<span class=" users-view-status chip green lighten-5 green-text">{{ $rekom_passport->status }}</span></td>
                                                    <?php } else if ($rekom_passport->status == "Rejected") { ?>
                                                        <td>:&ensp;<span class=" users-view-status chip red lighten-5 red-text">{{ $rekom_passport->status }}</span></td>
                                                    <?php } else { ?>
                                                        <td>:&ensp;<span class=" users-view-status chip blue lighten-5 blue-text">{{ $rekom_passport->status }}</span></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>No. Pencari Kerja</td>
                                                <td>:&ensp;{{$kartu_kuning->no_pencari_kerja}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status AK1</td>
                                                <?php if ($kartu_kuning->status == "Approved") { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip green lighten-5 green-text">{{ $kartu_kuning->status }}</span></td>
                                                <?php } else if ($kartu_kuning->status == "Rejected") { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip red lighten-5 red-text">{{ $kartu_kuning->status }}</span></td>
                                                <?php } else { ?>
                                                    <td>:&ensp;<span class=" users-view-status chip blue lighten-5 blue-text">{{ $kartu_kuning->status }}</span></td>
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
                                    <h6 class="indigo-text m-0">Personal Info</h6>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>NIK</td>
                                                <td class="users-view-username">:&ensp;{{ $kartu_kuning->nik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td class="users-view-name">:&ensp;{{ $personal->nama_lengkap }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:&ensp;{{ $personal->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan</td>
                                                <td>:&ensp;{{ $personal->kewarganegaraan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kondisi Fisik</td>
                                                <td class="users-view-email">:&ensp;{{ $personal->kondisi_fisik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td>:&ensp;{{ $personal->tempat_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Lahir</td>
                                                <td>:&ensp;{{ $personal->tgl_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kawin</td>
                                                <td>:&ensp;{{ $personal->status_perkawinan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:&ensp;{{ $personal->agama }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:&ensp;{{ $personal->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td>RT</td>
                                                <td>:&ensp;{{ $personal->rt }}</td>
                                            </tr>
                                            <tr>
                                                <td>RW</td>
                                                <td>:&ensp;{{ $personal->rw }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos</td>
                                                <td>:&ensp;{{ $personal->kode_pos }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. HP</td>
                                                <td>:&ensp;{{ $personal->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi Badan</td>
                                                <td>:&ensp;{{ $personal->tinggi_badan }} cm</td>
                                            </tr>
                                            <tr>
                                                <td>Berat Badan</td>
                                                <td>:&ensp;{{ $personal->berat_badan }} kg</td>
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
            tujuan_negara: '',
            skema_penempatan: '',
        },
        methods: {
            submitForm: function() {
                // console.log(this.skema_penempatan)
                this.sendData();
            },
            sendData: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.post('/rekom_passport', {
                        tujuan_negara: this.tujuan_negara,
                        skema_penempatan: this.skema_penempatan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Permohonan Rekom Passport telah Diajukan',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/rekom_passport';
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

            submitFormReject: function() {
                // console.log(this.skema_penempatan)
                this.sendDataReject();
            },
            sendDataReject: function() {
                // console.log('submitted');
                let vm = this;
                vm.loading = true;
                axios.patch('/rekom_passport/{{$rekom_passport!=""?$rekom_passport->id:""}}', {
                        tujuan_negara: this.tujuan_negara,
                        skema_penempatan: this.skema_penempatan,

                    })
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Permohonan Rekom Passport telah Diajukan',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/rekom_passport';
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
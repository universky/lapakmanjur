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

                            <div class="col s6">
                                <div class="display-flex media">
                                    <a href="#" class="avatar">
                                        <img src="{{ asset('assets/images/avatar/avatar-15.png') }}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name"></span>
                                            <span class="grey-text">{{$personal!=""?$personal->nama_lengkap:$user->name}}</span>
                                            <span class="users-view-username grey-text">{{ $user->username }}</span>
                                        </h6>
                                        <span>NIK:</span>
                                        <span class="users-view-id">{{$user->nik}}</span>
                                    </div>


                                </div>
                            </div>
                            <div class="col s6 m6 users-view-timeline">
                                <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                    <?php if ($kartu_kuning != null) { ?>
                                        <?php if ($kartu_kuning->status == "Not Registered Yet" || $kartu_kuning->status == "Rejected") { ?>
                                            <a href="#ajukan" class="btn-small btn-light-indigo modal-trigger">Ajukan</a>
                                            <div id="ajukan" class="modal modal-fixed-footer" style="width: 600px; height:200px; border-radius: 25px;">
                                                <div class="modal-content">
                                                    <h5>Ajukan Permohanan AK1</h5>

                                                    <p>Pastikan data AK1 terisi dengan benar. Lanjut?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                                                    <a href="/kartu_kuning/edit_status/{{$kartu_kuning->id}}" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
                                                </div>
                                            </div>
                                        <?php } else if ($kartu_kuning->status == "Pending") { ?>
                                            <a class="btn disabled mb-1 mr-1" href="/kartu_kuning/edit/{{$kartu_kuning->id}}">
                                                Ajukan
                                            </a>
                                        <?php } else if ($kartu_kuning->status == "Approved") { ?>
                                            <a class="mb-6 btn waves-effect waves-light green darken-1" href="/kartu_kuning/cetak/{{$kartu_kuning->id}}" target="_blank">
                                                Cetak
                                            </a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <a class="btn cyan waves-effect waves-light" href="/personal/create">
                                            Buat AK1
                                        </a>
                                    <?php } ?>
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
                                                <td>No. Pencari Kerja</td>
                                                <td>:&ensp;{{$kartu_kuning!=""?$kartu_kuning->no_pencari_kerja:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl. Pendaftaran</td>
                                                <td>:&ensp;{{$kartu_kuning!=""?$kartu_kuning->date:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Masa Berlaku</td>
                                                <td class="users-view-latest-activity">:&ensp;{{$kartu_kuning!=""?$kartu_kuning->masa_berlaku:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <?php if ($kartu_kuning != null) { ?>
                                                    <?php if ($kartu_kuning->status == "Approved") { ?>
                                                        <td>:&ensp;<span class=" users-view-status chip green lighten-5 green-text">{{ $kartu_kuning->status }}</span></td>
                                                    <?php } else if ($kartu_kuning->status == "Rejected") { ?>
                                                        <td>:&ensp;<span class=" users-view-status chip red lighten-5 red-text">{{ $kartu_kuning->status }}</span></td>
                                                    <?php } else { ?>
                                                        <td>:&ensp;<span class=" users-view-status chip blue lighten-5 blue-text">{{ $kartu_kuning->status }}</span></td>
                                                    <?php } ?>
                                                <?php } ?>

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
                                        <?php if ($kartu_kuning != null && $kartu_kuning->status != "Approved") { ?>
                                            <a class="btn cyan waves-effect waves-light" href="/personal/edit/{{$personal->id}}">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>NIK</td>
                                                <td class="users-view-username">:&ensp;{{ $user->nik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td class="users-view-name">:&ensp;{{$personal!=""?$personal->nama_lengkap:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:&ensp;{{$personal!=""?$personal->jenis_kelamin:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kewarganegaraan</td>
                                                <td>:&ensp;{{$personal!=""?$personal->kewarganegaraan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kondisi Fisik</td>
                                                <td class="users-view-email">:&ensp;{{$personal!=""?$personal->kondisi_fisik:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td>:&ensp;{{$personal!=""?$personal->tempat_lahir:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Lahir</td>
                                                <td>:&ensp;{{$personal!=""?$personal->tgl_lahir:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kawin</td>
                                                <td>:&ensp;{{$personal!=""?$personal->status_perkawinan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:&ensp;{{$personal!=""?$personal->agama:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:&ensp;{{$personal!=""?$personal->alamat:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>RT</td>
                                                <td>:&ensp;{{$personal!=""?$personal->rt:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>RW</td>
                                                <td>:&ensp;{{$personal!=""?$personal->rw:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos</td>
                                                <td>:&ensp;{{$personal!=""?$personal->kode_pos:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>No. HP</td>
                                                <td>:&ensp;{{$personal!=""?$personal->no_hp:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi Badan</td>
                                                <td>:&ensp;{{$personal!=""?$personal->tinggi_badan:""}} cm</td>
                                            </tr>
                                            <tr>
                                                <td>Berat Badan</td>
                                                <td>:&ensp;{{$personal!=""?$personal->berat_badan:""}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>File Foto</td>
                                                <td class="users-view-username">
                                                    <?php if ($upload_files != null) { ?>
                                                        <img class="materialboxed" data-caption="A picture of a way with a group of trees in a park" width="100" src="{{ asset('files/foto/' .$upload_files->foto) }}">
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>File Ijazah</td>
                                                <td class="users-view-name">
                                                    <?php if ($upload_files != null) { ?>
                                                        <a href="../../files/ijazah/{{$upload_files->ijazah}}" target="_blank">
                                                            <div class="col xl3 l3 m3 s3">
                                                                <div class="card hoverable" id="profile-card" style="color: black; border: radius 25px;">
                                                                    <div class="card-content">
                                                                        <div class="app-file-content-logo lighten-4">
                                                                            <img class="recent-file" style="font-size: .8rem;font-weight: 900;margin-left: 3px;text-transform: uppercase;color: #bdbdbd;" src="{{ asset('assets/images/icon/pdf-image.png') }}" height="38" width="30" alt="Card image cap">
                                                                        </div>
                                                                        <div class="app-file-content-details">
                                                                            <div class="app-file-name font-weight-200">{{$upload_files->ijazah}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php } ?>
                                                </td>
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
                                        <?php if ($kartu_kuning != null && $kartu_kuning->status != "Approved") { ?>
                                            <?php if ($education == null) { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/education/create/{{$kartu_kuning->id}}">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/education/edit/{{$education->id}}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Pendidikan</td>
                                                <td class="users-view-username">:&ensp;{{$education!=""?$education->pendidikan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan</td>
                                                <td class="users-view-name">:&ensp;{{$education!=""?$education->jurusan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Institusi Pendidikan</td>
                                                <td>:&ensp;{{$education!=""?$education->nama_institusi:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Lulus</td>
                                                <td class="users-view-email">:&ensp;{{$education!=""?$education->tahun_lulus:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Lama Pendidikan</td>
                                                <td>:&ensp;{{$education!=""?$education->lama_pendidikan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Ijazah/IPK</td>
                                                <td>:&ensp;{{$education!=""?$education->ipk:""}}</td>
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
                                        <?php if ($kartu_kuning != null && $kartu_kuning->status != "Approved") { ?>
                                            <?php if ($job_expectation == null) { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/job_expectation/create/{{$kartu_kuning->id}}">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/job_expectation/edit/{{$job_expectation->id}}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Penempatan</td>
                                                <td class="users-view-username">:&ensp;{{$job_expectation!=""?$job_expectation->penempatan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td class="users-view-name">:&ensp;{{$job_expectation!=""?$job_expectation->provinsi_harapan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kabupaten/Kota</td>
                                                <td>:&ensp;{{$job_expectation!=""?$job_expectation->kab_harapan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sistem Pembayaran</td>
                                                <td>:&ensp;{{$job_expectation!=""?$job_expectation->sistem_pembayaran_harapan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Min. Gaji</td>
                                                <td class="users-view-email">:&ensp;{{$job_expectation!=""?$job_expectation->min_gaji_harapan:""}}</td>
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
                                        <?php if ($kartu_kuning != null && $kartu_kuning->status != "Approved") { ?>
                                            <?php if ($experiences == '[]') { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/experience/create/{{$kartu_kuning->id}}">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/experience/edit/{{$kartu_kuning->id}}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($experiences as $experience) { ?>
                                <div class="row">

                                    <div class="col s12">
                                        <div class="card">
                                            <div class="card-content">
                                                <table class="striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama Perusahaan</td>
                                                            <td class="users-view-username">:&ensp;{{$experience!=""?$experience->nama_perusahaan:""}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jabatan</td>
                                                            <td class="users-view-name">:&ensp;{{$experience!=""?$experience->jabatan:""}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Deskripsi Pekerjaan</td>
                                                            <td>:&ensp;{{$experience!=""?$experience->deskripsi:""}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lama Kerja</td>
                                                            <td>:&ensp;{{$experience!=""?$experience->lama_kerja:""}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gaji</td>
                                                            <td class="users-view-email">:&ensp;{{$experience!=""?$experience->gaji:""}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- users view card details ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s6 m6 users-view-timeline">
                                    <h6 class="indigo-text m-0">Penguasaaan Keterampilan dan Bahasa</h6>
                                </div>
                                <div class="col s6 m6 users-view-timeline">
                                    <div class="col s12 m12 m-0 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                        <?php if ($kartu_kuning != null && $kartu_kuning->status != "Approved") { ?>
                                            <?php if ($skill_language == null) { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/skill_language/create/{{$kartu_kuning->id}}">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            <?php } else { ?>
                                                <a class="btn cyan waves-effect waves-light" href="/skill_language/edit/{{$skill_language->id}}">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Keterampilan</td>
                                                <td class="users-view-username">:&ensp;{{$skill_language!=""?$skill_language->keterampilan:""}}</td>
                                            </tr>
                                            <tr>
                                                <td>Bahasa</td>
                                                <td class="users-view-name">:&ensp;{{$skill_language!=""?$skill_language->bahasa:""}}</td>
                                            </tr>
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
@extends('layouts_admin.app')

@section('title')
Detail Permohonan AK1
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
                        <h5 class="breadcrumbs-title"><span>Detail Permohonan AK1</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <!-- <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li> -->
                            <li class="breadcrumb-item"><a href="/application/detail/{{$id}}">Kembali</a>
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
                                                <td>Tgl. Pendaftaran:</td>
                                                <td>{{ $kartu_kuning->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Masa Berlaku:</td>
                                                <td class="users-view-latest-activity">{{ $kartu_kuning->masa_berlaku }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <?php if ($kartu_kuning->status == "Approved") { ?>
                                                    <td><span class=" users-view-status chip green lighten-5 green-text">{{ $kartu_kuning->status }}</span></td>
                                                <?php } else if ($kartu_kuning->status == "Rejected") { ?>
                                                    <td><span class=" users-view-status chip red lighten-5 red-text">{{ $kartu_kuning->status }}</span></td>
                                                <?php } else { ?>
                                                    <td><span class=" users-view-status chip blue lighten-5 blue-text">{{ $kartu_kuning->status }}</span></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="col s12 m8">
                                    <table class="responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Module Permission</th>
                                                <th>Read</th>
                                                <th>Write</th>
                                                <th>Create</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Users</td>
                                                <td>Yes</td>
                                                <td>No</td>
                                                <td>No</td>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <td>Articles</td>
                                                <td>No</td>
                                                <td>Yes</td>
                                                <td>No</td>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <td>Staff</td>
                                                <td>Yes</td>
                                                <td>Yes</td>
                                                <td>No</td>
                                                <td>No</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- users view card data ends -->

                    <!-- users view card details start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row indigo lighten-5 border-radius-4 mb-2">
                                <div class="col s12 m4 users-view-timeline">
                                    <h6 class="indigo-text m-0">Personal Info</h6>
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
                                            <tr>
                                                <td>Kondisi Fisik</td>
                                                <td class="users-view-email">{{ $personal->kondisi_fisik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir:</td>
                                                <td>{{ $personal->tempat_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tgl Lahir:</td>
                                                <td>{{ $personal->tgl_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kawin:</td>
                                                <td>{{ $personal->status_perkawinan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama:</td>
                                                <td>{{ $personal->agama }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat:</td>
                                                <td>{{ $personal->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td>RT:</td>
                                                <td>{{ $personal->rt }}</td>
                                            </tr>
                                            <tr>
                                                <td>RW:</td>
                                                <td>{{ $personal->rw }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kode Pos:</td>
                                                <td>{{ $personal->kode_pos }}</td>
                                            </tr>
                                            <tr>
                                                <td>No. HP:</td>
                                                <td>{{ $personal->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi Badan:</td>
                                                <td>{{ $personal->tinggi_badan }} cm</td>
                                            </tr>
                                            <tr>
                                                <td>Berat Badan:</td>
                                                <td>{{ $personal->berat_badan }} kg</td>
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
                                <div class="col s12 m4 users-view-timeline">
                                    <h6 class="indigo-text m-0">Data Pendidikan</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Pendidikan:</td>
                                                <td class="users-view-username">{{ $education->pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan:</td>
                                                <td class="users-view-name">{{ $education->jurusan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Institusi Pendidikan:</td>
                                                <td>{{ $education->nama_institusi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tahun Lulus</td>
                                                <td class="users-view-email">{{ $education->tahun_lulus }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lama Pendidikan:</td>
                                                <td>{{ $education->lama_pendidikan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Ijazah/IPK:</td>
                                                <td>{{ $education->ipk }}</td>
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
                                <div class="col s12 m4 users-view-timeline">
                                    <h6 class="indigo-text m-0">Data Harapan Kerja</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Penempatan:</td>
                                                <td class="users-view-username">{{ $job_expectation->penempatan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi:</td>
                                                <td class="users-view-name">{{ $job_expectation->provinsi_harapan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kabupaten/Kota:</td>
                                                <td>{{ $job_expectation->kab_harapan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Sistem Pembayaran:</td>
                                                <td>{{ $job_expectation->sistem_pembayaran_harapan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Min. Gaji</td>
                                                <td class="users-view-email">{{ $job_expectation->min_gaji_harapan }}</td>
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
                                <div class="col s12 m4 users-view-timeline">
                                    <h6 class="indigo-text m-0">Data Pengalaman Kerja</h6>
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
                                                            <td>Nama Perusahaan:</td>
                                                            <td class="users-view-username">{{ $experience->nama_perusahaan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jabatan:</td>
                                                            <td class="users-view-name">{{ $experience->jabatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Deskripsi Pekerjaan:</td>
                                                            <td>{{ $experience->deskripsi_pekerjaan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lama Kerja:</td>
                                                            <td>{{ $experience->lama_kerja }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gaji</td>
                                                            <td class="users-view-email">{{ $experience->gaji }}</td>
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
                                <div class="col s12 m4 users-view-timeline">
                                    <h6 class="indigo-text m-0">Penguasaan Keterampilan dan Bahasa</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Keterampilan:</td>
                                                <td class="users-view-username">{{ $skill_language->keterampilan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bahasa:</td>
                                                <td class="users-view-name">{{ $skill_language->bahasa }}</td>
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
                                    <h6 class="indigo-text m-0">Berkas</h6>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>File Foto:</td>
                                                <td class="users-view-username">
                                                    <?php if ($upload_files != null) { ?>
                                                        <img class="materialboxed" data-caption="A picture of a way with a group of trees in a park" width="100" src="{{ asset('files/foto/' .$upload_files->foto) }}">
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>File Ijazah:</td>
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
                axios.post('/kartu_kuning/detail/approval/{{$kartu_kuning->id}}', {
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
                                window.location.href = '/kartu_kuning/detail/{{$kartu_kuning->id}}';
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
                axios.post('/kartu_kuning/detail/reject/{{$kartu_kuning->id}}', {
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
                                window.location.href = '/kartu_kuning/detail/{{$kartu_kuning->id}}';
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
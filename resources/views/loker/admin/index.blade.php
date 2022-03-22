@extends('layouts_admin.app')

@section('title')
Manage Lowongan Kerja
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
                        <h5 class="breadcrumbs-title"><span>Manage Lowongan Kerja</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/homepage">Kembali</a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Manage AK1
                            </li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <!-- <div class="card">
                        <div class="card-content">
                            <p class="caption mb-0">Tables are a nice way to organize a lot of data. We provide a few utility classes to help
                                you style your table as easily as possible. In addition, to improve mobile experience, all tables on
                                mobile-screen widths are centered automatically.</p>
                        </div>
                    </div> -->

                    <!-- Page Length Options -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <!-- <div class="card-header"> -->
                                <br>
                                <div class="col s12 m12 quick-action-btns justify-content-end align-items-center">
                                    <a class="btn cyan waves-effect waves-light right" href="/loker/create">
                                        <i class="material-icons right">add</i>Tambah
                                    </a>
                                    <br>
                                </div>
                                <!-- </div> -->
                                <div class="card-content">
                                    <!-- <h4 class="card-title">Manage Lowongan Kerja</h4> -->

                                    <div class="row">


                                        <div class="col s12">
                                            <br><br>
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Perusahaan</th>
                                                        <th style="text-align: center;">Kategori</th>
                                                        <th style="text-align: center;">Nama Pekerjaan</th>
                                                        <th style="text-align: center;">Gaji</th>
                                                        <th style="text-align: center;">Jam Kerja</th>
                                                        <th style="text-align: center;">Tgl. Buat</th>
                                                        <th style="text-align: center;">Batas</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(job, index) in jobs">
                                                        <td style="text-align: center;">@{{job.companies.name}}</td>
                                                        <td style="text-align: center;">@{{job.kategori}}</td>
                                                        <td style="text-align: center;">@{{job.nama_pekerjaan}}</td>
                                                        <td style="text-align: center;">@{{currencyFormat(job.gaji1)}} - @{{currencyFormat(job.gaji2)}}</td>
                                                        <td style="text-align: center;">@{{job.jam_kerja}}</td>
                                                        <td style="text-align: center;">@{{job.tgl_buat}}</td>
                                                        <td style="text-align: center;">@{{job.batas_tgl}}</td>
                                                        <td style="text-align: center;">
                                                            <a :href="`/loker/edit/` + job.id">Edit</a></li>
                                                            <a :href="`/loker/detail/` + job.id">Detail</a></li>
                                                            <!-- <a class='btn-small btn-light-indigo dropdown-trigger' style="color:black;" href='#' data-target='option'><i class="material-icons">more_horiz</i></a>
                                                            <ul id='option' class='dropdown-content'>
                                                                <li><a :href="`/loker/edit/` + job.id">Edit</a></li>
                                                                <li><a href="#" @click.prevent="deleteRecord(job.id)">Hapus</a></li>
                                                                <li class="divider" tabindex="-1"></li>
                                                                <li><a :href="`/loker/detail/` + job.id">Detail</a></li>
                                                            </ul> -->
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">Perusahaan</th>
                                                        <th style="text-align: center;">Kategori</th>
                                                        <th style="text-align: center;">Nama Pekerjaan</th>
                                                        <th style="text-align: center;">Gaji</th>
                                                        <th style="text-align: center;">Jam Kerja</th>
                                                        <th style="text-align: center;">Tgl. Buat</th>
                                                        <th style="text-align: center;">Batas</th>
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
                jobs: JSON.parse(String.raw `{!! $jobs !!}`),
            },
            methods: {
                currencyFormat: function(number) {
                    return Intl.NumberFormat('de-DE').format(number);
                },
                deleteRecord: function(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "The data will be deleted",
                        icon: 'warning',
                        reverseButtons: true,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Cancel',
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            return axios.delete('/loker/' + id)
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
                                text: 'Data Pekerjaan berhasil dihapus',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    })
                }
            }
        })
    </script>
    @endsection
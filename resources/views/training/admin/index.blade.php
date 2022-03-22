@extends('layouts_admin.app')

@section('title')
Manage Pengajuan training
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
                        <h5 class="breadcrumbs-title"><span>Manage Pengajuan training</span></h5>
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

                                <!-- </div> -->
                                <div class="card-content">
                                    <!-- <h4 class="card-title">Manage Lowongan Kerja</h4> -->

                                    <div class="row">


                                        <div class="col s12">
                                            <br><br>
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">No. Registrasi</th>
                                                        <th style="text-align: center;">Tanggal</th>
                                                        <th style="text-align: center;">Nama LPK</th>
                                                        <th style="text-align: center;">Nama Pelatihan</th>
                                                        <th style="text-align: center;">No. HP</th>
                                                        <th style="text-align: center;">Alamat</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(training, index) in trainings">
                                                        <td style="text-align: center;">@{{training.no_registrasi}}</td>
                                                        <td style="text-align: center;">@{{training.date}}</td>
                                                        <td style="text-align: center;">@{{training.nama_lpk}}</td>
                                                        <td style="text-align: center;">@{{training.nama_pelatihan}}</td>
                                                        <td style="text-align: center;">@{{training.phone}}</td>
                                                        <td style="text-align: center;">@{{training.alamat}}</td>
                                                        <td style="text-align: center;" v-if="training.status == 'Approved'"><span class=" users-view-status chip green lighten-5 green-text">@{{ training.status }}</span></td>
                                                        <td style="text-align: center;" v-if="training.status == 'Rejected'"><span class=" users-view-status chip red lighten-5 red-text">@{{ training.status }}</span></td>
                                                        <td style="text-align: center;" v-if="training.status == 'Pending'"><span class=" users-view-status chip blue lighten-5 blue-text">@{{ training.status }}</span></td>

                                                        <td style="text-align: center;">
                                                            <a :href="`/training/detail/` + training.id" class="btn-small btn-light-indigo">Detail</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">No. Registrasi</th>
                                                        <th style="text-align: center;">Tanggal</th>
                                                        <th style="text-align: center;">Nama LPK</th>
                                                        <th style="text-align: center;">Nama Pelatihan</th>
                                                        <th style="text-align: center;">No. HP</th>
                                                        <th style="text-align: center;">Alamat</th>
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
                trainings: JSON.parse('{!! $trainings !!}'),
            },
        })
    </script>
    @endsection
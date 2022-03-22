@extends('layouts_admin.app')

@section('title')
Antrian Pelamar
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
                        <h5 class="breadcrumbs-title"><span>Antrian Pelamar</span></h5>
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
                                <!-- <div class="col s12 m12 quick-action-btns justify-content-end align-items-center">
                                    <a class="btn cyan waves-effect waves-light right" href="/perusahaan/create">
                                        <i class="material-icons right">add</i>Tambah
                                    </a>
                                    <br>
                                </div> -->
                                <!-- </div> -->
                                <div class="card-content">
                                    <!-- <h4 class="card-title">Manage Lowongan Kerja</h4> -->

                                    <div class="row">


                                        <div class="col s12">
                                            <br><br>
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Kategori Pekerjaan</th>
                                                        <th style="text-align: center;">Pekerjaan</th>
                                                        <th style="text-align: center;">Tanggal</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(application, index) in applications">
                                                        <td style="text-align: center;">@{{application.kartu_kunings.nik}}</td>
                                                        <td style="text-align: center;">@{{application.jobs.kategori}}</td>
                                                        <td style="text-align: center;">@{{application.jobs.nama_pekerjaan}}</td>
                                                        <td style="text-align: center;">@{{application.date}}</td>
                                                        <td style="text-align: center;">@{{application.status}}</td>
                                                        <td style="text-align: center;">
                                                            <a :href="`/application/detail/` + application.id" class="btn-small btn-light-indigo">Detail</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Kategori Pekerjaan</th>
                                                        <th style="text-align: center;">Pekerjaan</th>
                                                        <th style="text-align: center;">Tanggal</th>
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
                applications: JSON.parse('{!! $applications !!}'),
            },
        })
    </script>
    @endsection
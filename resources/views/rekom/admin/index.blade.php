@extends('layouts_admin.app')

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
                                                        <th style="text-align: center;">No. Pencari Kerja</th>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Tujuan Negara</th>
                                                        <th style="text-align: center;">Skema Penempatan</th>
                                                        <th style="text-align: center;">Tanggal</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(rekom_passport, index) in rekom_passports" v-if="rekom_passport.status != 'Rejected'">
                                                        <td style="text-align: center;">@{{rekom_passport.no_registrasi}}</td>
                                                        <td style="text-align: center;">@{{rekom_passport.kartu_kunings.no_pencari_kerja}}</td>
                                                        <td style="text-align: center;">@{{rekom_passport.kartu_kunings.nik}}</td>
                                                        <td style="text-align: center;">@{{rekom_passport.tujuan_negara}}</td>
                                                        <td style="text-align: center;">@{{rekom_passport.skema_penempatan}}</td>
                                                        <td style="text-align: center;">@{{rekom_passport.date}}</td>
                                                        <td style="text-align: center;">@{{rekom_passport.status}}</td>
                                                        <td style="text-align: center;">
                                                            <a :href="`/rekom_passport/detail/` + rekom_passport.id" class="btn-small btn-light-indigo">Detail</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">No. Registrasi</th>
                                                        <th style="text-align: center;">No. AK1</th>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">Tujuan Negara</th>
                                                        <th style="text-align: center;">Skema Penempatan</th>
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
                rekom_passports: JSON.parse('{!! $rekom_passports !!}'),
            },
        })
    </script>
    @endsection
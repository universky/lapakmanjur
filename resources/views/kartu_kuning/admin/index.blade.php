@extends('layouts.app')

@section('title')
Manage Kartu Kuning
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
                        <h5 class="breadcrumbs-title"><span>Manage Kartu Kuning</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Manage Kartu Kuning
                            </li>
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
                                <div class="card-content">
                                    <h4 class="card-title">Manage Kartu Kuning</h4>
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">No. Pencari Kerja</th>
                                                        <th style="text-align: center;">Nama Lengkap</th>
                                                        <th style="text-align: center;">Jenis Kelamin</th>
                                                        <th style="text-align: center;">Status Perkawinan</th>
                                                        <th style="text-align: center;">Kota</th>
                                                        <th style="text-align: center;">Date</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(kartu_kuning, index) in kartu_kunings">
                                                        <td style="text-align: center;">@{{kartu_kuning.nik}}</td>
                                                        <td style="text-align: center;">@{{kartu_kuning.no_pencari_kerja}}</td>
                                                        <td style="text-align: center;">@{{kartu_kuning.nama_lengkap}}</td>
                                                        <td style="text-align: center;">@{{kartu_kuning.jenis_kelamin}}</td>
                                                        <td style="text-align: center;">@{{kartu_kuning.status_perkawinan}}</td>
                                                        <td style="text-align: center;">@{{kartu_kuning.kota}}</td>
                                                        <td style="text-align: center;">@{{kartu_kuning.date}}</td>
                                                        <td style="text-align: center;">
                                                            <a href=""><i class="material-icons">check</i></a>
                                                            <a href="" style="color: red"><i class="material-icons">close</i></a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">NIK</th>
                                                        <th style="text-align: center;">No. Pencari Kerja</th>
                                                        <th style="text-align: center;">Nama Lengkap</th>
                                                        <th style="text-align: center;">Jenis Kelamin</th>
                                                        <th style="text-align: center;">Status Perkawinan</th>
                                                        <th style="text-align: center;">Kota</th>
                                                        <th style="text-align: center;">Date</th>
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
                kartu_kunings: JSON.parse('{!! $kartu_kunings !!}'),
            }
        })
    </script>
    @endsection
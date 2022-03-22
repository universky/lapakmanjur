@extends('layouts_admin.app')

@section('title')
Manage AK1
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
                        <h5 class="breadcrumbs-title"><span>Manage AK</span></h5>
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
                                <div class="card-content">
                                    <h4 class="card-title">Manage AK1</h4>
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
                                                        <th style="text-align: center;">Kondisi Fisik</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(personal, index) in personals" v-if="personal.kartu_kunings.status != 'Not Registered Yet'">
                                                        <td style="text-align: center;">@{{personal.kartu_kunings.nik}}</td>
                                                        <td style="text-align: center;">@{{personal.kartu_kunings.no_pencari_kerja}}</td>
                                                        <td style="text-align: center;">@{{personal.nama_lengkap}}</td>
                                                        <td style="text-align: center;">@{{personal.jenis_kelamin}}</td>
                                                        <td style="text-align: center;">@{{personal.status_perkawinan}}</td>
                                                        <td style="text-align: center;">@{{personal.kondisi_fisik}}</td>
                                                        <td style="text-align: center;" v-if="personal.kartu_kunings.status == 'Approved'"><span class=" users-view-status chip green lighten-5 green-text">@{{ personal.kartu_kunings.status }}</span></td>
                                                        <td style="text-align: center;" v-if="personal.kartu_kunings.status == 'Rejected'"><span class=" users-view-status chip red lighten-5 red-text">@{{ personal.kartu_kunings.status }}</span></td>
                                                        <td style="text-align: center;" v-if="personal.kartu_kunings.status == 'Pending'"><span class=" users-view-status chip blue lighten-5 blue-text">@{{ personal.kartu_kunings.status }}</span></td>
                                                        <td style="text-align: center;">
                                                            <a :href="`/kartu_kuning/detail/` + personal.kartu_kunings.id" class="btn-small btn-light-indigo">Detail</a>
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
                personals: JSON.parse('{!! $personals !!}'),
            },
        })
    </script>
    @endsection
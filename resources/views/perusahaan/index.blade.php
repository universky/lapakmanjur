@extends('layouts_admin.app')

@section('title')
Manage Perusahaan
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
                        <h5 class="breadcrumbs-title"><span>Manage Perusahaan</span></h5>
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
                                    <a class="btn cyan waves-effect waves-light right" href="/perusahaan/create">
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
                                                        <th style="text-align: center;">Nama Perusahaan</th>
                                                        <th style="text-align: center;">Industri</th>
                                                        <th style="text-align: center;">Lokasi</th>
                                                        <th style="text-align: center;">Website</th>
                                                        <th style="text-align: center;">Phone</th>
                                                        <th style="text-align: center;">Alamat</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(company, index) in companies">
                                                        <td style="text-align: center;">@{{company.name}}</td>
                                                        <td style="text-align: center;">@{{company.industri}}</td>
                                                        <td style="text-align: center;">@{{company.lokasi}}</td>
                                                        <td style="text-align: center;">@{{company.website}}</td>
                                                        <td style="text-align: center;">@{{company.phone}}</td>
                                                        <td style="text-align: center;">@{{company.alamat}}</td>
                                                        <td style="text-align: center;">
                                                            <a :href="`/company/detail/` + company.id" class="btn-small btn-light-indigo">Detail</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">Nama Perusahaan</th>
                                                        <th style="text-align: center;">Industri</th>
                                                        <th style="text-align: center;">Lokasi</th>
                                                        <th style="text-align: center;">Website</th>
                                                        <th style="text-align: center;">Phone</th>
                                                        <th style="text-align: center;">Alamat</th>
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
                companies: JSON.parse('{!! $companies !!}'),
            },
        })
    </script>
    @endsection
@extends('layouts.app')

@section('title')
Cetak Kartu Registrasi LPK
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
                        <h5 class="breadcrumbs-title"><span>Cetak Kartu Registrasi LPK</span></h5>
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
                            <div class="card" style="height: 500px;">
                                <div class="card-content">
                                    <h4 class="card-title center">CETAK KARTU REGISTRASI LPK</h4>
                                    <hr>
                                    <center>
                                        <div class="card" style="height: 400px; width:400px;">
                                            <div class="card-content">
                                                <i class="material-icons" style="font-size: 100px; color:limegreen;">check_circle</i>
                                                <h6 style="font-weight: bold; text-align:center; color:royalblue;">
                                                    REGISTRASI LPK BERHASIL
                                                </h6>
                                                <p style="text-align: center;">Cetak Kartu Registrasi sebagai tanda bukti registrasi berhasil. Cetak Kartu {{ $url }}</p>

                                                <br><br><br><br>
                                                <a href="{{ $url }}" class="btn cyan waves-effect waves-light center" target="_blank">
                                                    <i class="material-icons right">archive</i>Cetak Kartu
                                                </a>
                                            </div>
                                        </div>
                                    </center>
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
@extends('layouts.app')

@section('title')
Home
@endsection

@section('head')
<style>
    a:hover {
        background-color: yellow;
    }
</style>
@endsection

@section('content')
<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">

                    <!-- Special Options -->
                    <div class="row">
                        <div class="col s12">
                            <div id="view-carousel-carousel-special-options">
                                <div class="row">
                                    <div class="col s12">
                                        <div class="carousel carousel-slider center carousel-indicators" data-indicators="true">
                                            <a class="carousel-item red white-text" href="#">
                                                <!-- <div class="card-image waves-effect waves-block waves-light"> -->
                                                <img class="activator responsive-img" src="{{ asset('assets/images/gallery/gambar1.png') }}" style="height: 370px;" alt="user bg" />
                                                <!-- </div> -->
                                            </a>
                                            <a class="carousel-item amber white-text" href="#">
                                                <!-- <div class="card-image waves-effect waves-block waves-light"> -->
                                                <img class="activator responsive-img" src="{{ asset('assets/images/gallery/gambar2.jpeg') }}" style="height: 370px;" alt="user bg" />
                                                <!-- </div> -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="card-stats" class="col s12">
                    <div class="row">
                        <div class="col s12 m3">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">

                                <a href="/kartu_kuning">
                                    <div class="card-content center-align">
                                        <h6><b>AK1</b></h6>

                                        <i class="material-icons md-48 amber-text">filter_none</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/loker">
                                    <div class="card-content center-align">
                                        <h6><b>LOKER</b></h6>
                                        <i class="material-icons md-48 red-text">import_contacts</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/rekom_passport">
                                    <div class="card-content center-align">
                                        <h6><b>Rekom Passport</b></h6>
                                        <i class="material-icons md-48 green-text">layers</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/info_pelatihan">
                                    <div class="card-content center-align">
                                        <h6><b>Informasi Pelatihan</b></h6>
                                        <i class="material-icons md-48 blue-text">event_note</i>
                                    </div>
                                </a>
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
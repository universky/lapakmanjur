@extends('layouts_admin.app')

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
                <div id="card-stats" class="col s12">
                    <div class="row">
                        <div class="col s12 m2">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">

                                <a href="/kartu_kuning">
                                    <div class="card-content center-align">
                                        <h6><b>Permohonan AK1</b></h6>

                                        <i class="material-icons md-48 amber-text">filter_none</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/application">
                                    <div class="card-content center-align">
                                        <h6><b>Antrian Pelamar</b></h6>
                                        <i class="material-icons md-48 blue-text">person_outline</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/loker">
                                    <div class="card-content center-align">
                                        <h6><b>BURSA KERJA</b></h6>
                                        <i class="material-icons md-48 red-text">import_contacts</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/rekom_passport/admin">
                                    <div class="card-content center-align">
                                        <h6><b>Rekom Passport</b></h6>
                                        <i class="material-icons md-48 green-text">layers</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/perusahaan">
                                    <div class="card-content center-align">
                                        <h6><b>Perusahaan</b></h6>
                                        <i class="material-icons md-48 brown-text">event_note</i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col s12 m2">
                            <div class="card hoverable" id="profile-card" style="border-radius: 25px;">
                                <a href="/training">
                                    <div class="card-content center-align">
                                        <h6><b>Daftar Pelatihan</b></h6>
                                        <i class="material-icons md-48 purple-text">event_note</i>
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
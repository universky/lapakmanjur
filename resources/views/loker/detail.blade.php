@extends('layouts.app')

@section('title')
Detail Pekerjaan - {{ $jobs->nama_pekerjaan }}
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
                        <h5><span>Detail Pekerjaan - {{$jobs->nama_pekerjaan}}</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/loker">Kembali</a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Lowongan Kerja
                            </li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div id="search-page" class="section">
                    <div class="row">
                        <div class="col s12">

                            <!-- <h6>Detail Pekerjaan - {{$jobs->nama_pekerjaan}}</h6> -->
                            <div class="row">
                                <div class="col s12">

                                    <!-- <div class="card hoverable">
                                        <div class="card-content"> -->
                                    <!-- users view card data start -->
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row">
                                                <div class="col s12 m12 quick-action-btns justify-content-end align-items-center">
                                                    <?php if ($applied == 2) { ?>
                                                        <a class="btn cyan waves-effect waves-light right" href="/application/apply/{{$jobs->id}}">
                                                            Lamar
                                                        </a>
                                                    <?php } else if ($applied == 1) { ?>
                                                        <a class="btn cyan waves-effect waves-light right disabled" href="/application/apply/{{$jobs->id}}">
                                                            Lamar
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row">
                                                <div class="col s8 m8">
                                                    <table class="striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>Nama Pekerjaan:</td>
                                                                <td> {{$jobs->nama_pekerjaan}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jam Kerja:</td>
                                                                <td> {{$jobs->jam_kerja}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gaji:</td>
                                                                <td> {{$jobs->gaji1}} - {{$jobs->gaji2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pengalaman:</td>
                                                                <td class="users-view-latest-activity">{{ $jobs->pengalaman }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal dibuat:</td>
                                                                <td class="users-view-verified">{{ $jobs->tgl_buat }}</td>
                                                            </tr>

                                                            <!-- <tr>
                                                                <td>Status:</td>
                                                                <td><span class=" users-view-status chip green lighten-5 green-text">Active</span></td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <h6>Kemampuan Wajib</h6>

                                                    <p>
                                                        <span>&#8226;&ensp;</span>{{ $jobs->kemampuan_wajib }}
                                                    </p>
                                                    <br>
                                                    <h6>Kemampuan Tambahan</h6>

                                                    <p>
                                                        <span>&#8226;&ensp;</span>{{ $jobs->kemampuan_tambahan }}
                                                    </p>
                                                    <br>

                                                    <h6>Deskripsi Pekerjaan</h6>

                                                    <p>
                                                        <span>&#8226;&ensp;</span>{{ $jobs->deskripsi }}
                                                    </p>
                                                    <br>
                                                </div>
                                                <div class="col s4 m4">
                                                    <h5 class="mt-0">{{$jobs->companies->name}} - {{$jobs->companies->industri}}</h5>
                                                    <p>{{$jobs->companies->lokasi}}</p>
                                                    <img class="responsive-img mt-4 p-3 border-radius-6" src="{{ asset('assets/images/gallery/34.png') }}" alt="">
                                                    <!-- <p class="mt-2 mb-2">Materialize is a Material Design Admin Template is the excellent responsive
                                                        google material design inspired multipurpose admin template.</p> -->
                                                    <hr>
                                                    <p class="mt-2"><b class="blue-grey-text text-darken-4">Website:</b><a href="{{$jobs->companies->website}}">&ensp;{{$jobs->companies->website}}</a></p>
                                                    <p class="mt-2"><b class="blue-grey-text text-darken-4">Phone:</b> {{ $jobs->companies->phone }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users view card data ends -->

                                    <!-- 
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- START RIGHT SIDEBAR NAV -->
                <aside id="right-sidebar-nav">
                    <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
                        <div class="row">
                            <div class="slide-out-right-title">
                                <div class="col s12 border-bottom-1 pb-0 pt-1">
                                    <div class="row">
                                        <div class="col s2 pr-0 center">
                                            <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                                        </div>
                                        <div class="col s10 pl-0">
                                            <ul class="tabs">
                                                <li class="tab col s4 p-0">
                                                    <a href="#messages" class="active">
                                                        <span>Messages</span>
                                                    </a>
                                                </li>
                                                <li class="tab col s4 p-0">
                                                    <a href="#settings">
                                                        <span>Settings</span>
                                                    </a>
                                                </li>
                                                <li class="tab col s4 p-0">
                                                    <a href="#activity">
                                                        <span>Activity</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
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
            jobs: JSON.parse('{!! $jobs !!}')
        }
    })
</script>
@endsection
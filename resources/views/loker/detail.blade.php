@extends('layouts.app')

@section('title')
Detail Pekerjaan - {{ $jobs->nama_pekerjaan }}
@endsection

@section('content')
<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row" id="app">
        <div class="col s12">
            <div class="container">
                <div id="search-page" class="section">
                    <div class="row">
                        <div class="col s12">

                            <h6>Detail Pekerjaan - {{$jobs->nama_pekerjaan}}</h6>
                            <div class="row">
                                <div class="col s12">
                                    <div class="card z-depth-1">
                                        <div class="card-content">
                                            <!-- <p class="mb-2">About 62,00,000 results (0.40 seconds)</p> -->
                                            <div class="row">
                                                <div class="col l8 m12 mb-5">
                                                    <div class="result mt-0">
                                                        <h6><i><b>{{$jobs->nama_pekerjaan}}</b></i></h6>
                                                        <p><i class="material-icons">perm_phone_msg</i>&ensp;{{$jobs->gaji1}} - {{$jobs->gaji2}}</p>
                                                        <p><i class="material-icons">email</i>&ensp;{{$jobs->pengalaman}}</p>
                                                        <p><i class="material-icons">cake</i>&ensp;Dibuat pada {{$jobs->tgl_buat}}</p>
                                                    </div>



                                                </div>
                                                <div class="col l4 m12 right-content border-radius-6 mb-5">
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
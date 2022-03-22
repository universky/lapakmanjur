@extends('layouts.app')

@section('title')
Lowongan Kerja
@endsection

@section('head')
<style>
    a {
        text-decoration: none;
    }

    .page {
        display: flex;
        justify-content: center;
        padding: 30px 0;
    }

    .page ul {
        border-radius: 5px;
        overflow: hidden;
    }

    .page li {
        display: inline-block;
        border: 1px solid #ECEEEF;
    }

    .page li a {
        display: flex;
        padding: 12px 15px;
        color: #9013FE;
        background: #fff;
    }

    .page li a:hover {
        background: #D7D7D7;
    }


    .page .pg.active a {
        background: #9013FE;
        color: #fff;
    }

    .page .pg.active a:hover {
        background: #9013FE;
    }

    .page .no a {
        color: gray;
    }

    .page .disabled a {
        background: #dddddd;
        color: grey;
    }
</style>
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
                        <h5><span>Lowongan Kerja</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="/homepage">Kembali</a>
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
                            <form @submit.prevent="submitSearch">
                                <div id="search-wrapper" class="search card z-depth-0 center-align">
                                    <div class="card-content pb-0 pl-1 pr-1">
                                        <div class="input-field col s12">
                                            <h5>Cari Pekerjaan yang anda inginkan</h5>.
                                            <div class="row"></div>
                                            <input placeholder="Masukkan Pekerjaan yang anda cari" type="text" v-model="search" class="search-box validate white search-circle">
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <?php if ($req_search != null && $totalItem != null) { ?>
                                <h6>{{$totalItem}} Hasil Pencarian terkait <span style="font-weight: bold;">{{$req_search}}</span></h6>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- START RIGHT SIDEBAR NAV -->
                <div class="section">
                    <div class="row">

                        <div class="col s12 m3 l3 pr-0 hide-on-med-and-down animate fadeLeft">

                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">Filter</span>
                                    <hr class="p-0 mb-10">

                                    <span class="card-title mt-10">Sort By</span>

                                    <form @submit.prevent="submitForm">
                                        <div class="row">
                                            <div class="input-field col s12" style="text-align: left;">
                                                <select v-model="kategori">
                                                    <option value="0">SEMUA KATEGORI</option>
                                                    <option value="ADMINISTRASI PERKANTORAN">ADMINISTRASI PERKANTORAN</option>
                                                    <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                                                    <option value="AKUNTANSI"> AKUNTANSI</option>
                                                </select>
                                                <label>Kategori</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="sort_by">
                                                    <option value="Relevan">Relevan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                </select>
                                                <label>Sort By</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <select v-model="pengalaman">
                                                    <option value="0 - 1 Tahun">0 - 1 Tahun</option>
                                                    <option value="1 - 3 Tahun">1 - 3 Tahun</option>
                                                    <option value="> 3 Tahun">> 3 Tahun</option>
                                                </select>
                                                <label>Pengalaman</label>
                                            </div>
                                            <div class="input-field col s12" style="text-align: left;">
                                                <select v-model="gaji">
                                                    <option value="1 - 3 juta"> 1 - 3 juta</option>
                                                    <option value="3 - 5 juta">3 - 5 juta</option>
                                                    <option value="Lebih dari 5 juta"> Lebih dari 5 juta</option>
                                                </select>
                                                <label>Gaji</label>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right">
                                                    <i class="material-icons right">save</i>Filter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m12 l9 pr-0">
                            <div class="col s12 m4 l12">
                                <table id="page-length-option" class="display">
                                    <tbody>
                                        <div class="row">
                                            <?php foreach ($jobs as $job) { ?>
                                                <div class="col s6">

                                                    <div class="card hoverable" id="profile-card" style="color:cadetblue;">
                                                        <a href="/loker/detail/{{$job->id}}" style="color:black;">
                                                            <div class="card-content">
                                                                <div class="row">
                                                                    <div class="col s9">
                                                                        <h5 class="card-title activator grey-text text-darken-4 mt-1">{{ $job->nama_pekerjaan }}</h5>
                                                                        <p> {{ $job->companies->name }} - {{$job->companies->lokasi}}</p>

                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <p><i class="material-icons profile-card-i">attach_money</i> {{$job->gaji1}} - {{$job->gaji2}}</p>
                                                                        <p><i class="material-icons profile-card-i">business_center</i> {{$job->pengalaman}}</p>
                                                                        <p><i class="material-icons profile-card-i">date_range</i>&ensp;Dibuat pada {{$job->tgl_buat}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>



                                                </div>
                                            <?php } ?>

                                        </div>

                                        <?php if ($totalItem != null) { ?>
                                            <div class="page" style="color:#9013FE">
                                                <ul>
                                                    <?php if ($currentPage > 1 && $currentPage != $lastPage) { ?>
                                                        <li class="no"><a href="{{$prevPage}}">« Previous</a></li>
                                                        <li class="pg"><a href="{{$prevPage}}">{{$currentPage-1}}</a></li>
                                                        <li class="pg active"><a href="{{$currentUrl}}">{{$currentPage}}</a></li>
                                                        <li class="pg"><a href="{{$nextPage}}">{{$currentPage+1}}</a></li>
                                                        <li class="no"><a href="{{$nextPage}}">Next »</a></li>
                                                    <?php } else if ($currentPage == 1 && $lastPage != 1) { ?>
                                                        <li class="disabled"><a>« Previous</a></li>
                                                        <li class="pg active"><a href="{{$currentUrl}}">{{$currentPage}}</a></li>
                                                        <li class="pg"><a href="{{$nextPage}}">{{$currentPage+1}}</a></li>
                                                        <li class="pg"><a href="{{$next2Url}}">{{$currentPage+2}}</a></li>
                                                        <li class="no"><a href="{{$nextPage}}">Next »</a></li>
                                                    <?php } else if ($currentPage == $lastPage && $currentPage != 1) { ?>
                                                        <li class="no"><a href="{{$prevPage}}">« Previous</a></li>
                                                        <li class="pg"><a href="{{$prev2Url}}">{{$currentPage-2}}</a></li>
                                                        <li class="pg"><a href="{{$prevPage}}">{{$currentPage-1}}</a></li>
                                                        <li class="pg active"><a href="{{$currentUrl}}">{{$currentPage}}</a></li>
                                                        <li class="disabled"><a>Next »</a></li>
                                                    <?php } else if ($currentPage == $lastPage && $lastPage == 1) { ?>
                                                        <li class="disabled"><a>« Previous</a></li>
                                                        <li class="pg active"><a href="{{$currentUrl}}">{{$currentPage}}</a></li>
                                                        <li class="disabled"><a>Next »</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>

                                        <?php } else { ?>

                                            <center><i class="material-icons red-text" style="font-size: 100px;">error_outline</i></center>
                                            <p style="text-align: center;">Hasil Pencarian terkait <span style="font-weight:bold;">{{ $req_search }}</span> tidak ditemukan.</p>

                                        <?php } ?>

                            </div>

                        </div>
                        </tbody>

                        </table>
                    </div>

                    <!-- Pagination -->
                    <!-- <div class="col s12 center">
                                <ul class="pagination">
                                    <li class="disabled">
                                        <a href="#!">
                                            <i class="material-icons">chevron_left</i>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#!">1</a>
                                    </li>
                                    <li class="waves-effect"><a href="#!">2</a>
                                    </li>
                                    <li class="waves-effect"><a href="#!">3</a>
                                    </li>
                                    <li class="waves-effect"><a href="#!">4</a>
                                    </li>
                                    <li class="waves-effect"><a href="#!">5</a>
                                    </li>
                                    <li class="waves-effect">
                                        <a href="#!">
                                            <i class="material-icons">chevron_right</i>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->

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
    $(document).ready(function() {
        $('.page li').click(function() {
            $(this).toggleClass('active').siblings().removeClass('active')

        });
    });
</script>
<script>
    let app = new Vue({
        el: '#app',
        data: {
            sort_by: '{{ $sort_by }}',
            pengalaman: '{{ $pengalaman }}',
            gaji: '{{ $gaji }}',
            kategori: '{{ $kategori }}',
            search: '{{ $req_search }}',
        },
        methods: {
            submitForm: function() {
                // console.log(this.sort_by)
                window.location.href = `/loker?sort_by=${this.sort_by}&pengalaman=${this.pengalaman}&gaji=${this.gaji}&kategori=${this.kategori}`
            },
            submitSearch: function() {
                // console.log(this.sort_by)
                window.location.href = `/loker?search=${this.search}`
            },
        }
    })
</script>
@endsection
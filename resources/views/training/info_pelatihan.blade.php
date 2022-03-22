@extends('layouts.app')

@section('title')
Informasi Pelatihan
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
                        <h5><span>Informasi Pelatihan</span></h5>
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
                <div class="section">
                    <div class="row" id="ecommerce-products">

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
                                            <div class="input-field col s12">
                                                <select v-model="sort_by">
                                                    <option value="Relevan">Relevan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                </select>
                                                <label>Sort By</label>
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
                                            <?php foreach ($trainings as $training) { ?>
                                                <div class="col s6">
                                                    <div class="card hoverable" id="profile-card" style="color:cadetblue;">
                                                        <a href="/training/detail_pelatihan/{{$training->id}}" style="color:black;">
                                                            <div class="card-content">
                                                                <div class="row">
                                                                    <div class="col s9">
                                                                        <h5 class="card-title activator grey-text text-darken-4 mt-1">{{ $training->nama_pelatihan }}</h5>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <p><i class="material-icons profile-card-i">attach_money</i> {{$training->kategori}}</p>
                                                                        <p><i class="material-icons profile-card-i">business_center</i> {{$training->jumlah_paket}} Paket</p>
                                                                        <p><i class="material-icons profile-card-i">business_center</i> {{$training->jumlah_peserta}} Peserta</p>
                                                                        <p><i class="material-icons profile-card-i">date_range</i>&ensp;Dibuat pada {{$training->date}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    </div>


                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- {{ $trainings->links() }} -->

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




                            </div>
                            </tbody>

                            </table>
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
            sort_by: '{{$sort_by}}',
            kategori: '{{$kategori}}',
        },
        methods: {
            submitForm: function() {
                //  this.sendData();
                window.location.href = `/info_pelatihan?kategori=${this.kategori}&sort_by=${this.sort_by}`;
            },
        }
    })
</script>
@endsection
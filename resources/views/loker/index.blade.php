@extends('layouts.app')

@section('title')
Lowongan Kerja
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
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Lowongan Kerja
                            </li>
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

                                    <form action="#" class="display-grid">
                                        <label>
                                            <input type="checkbox" @click="check(filter)" value="2" v-model="filter" />
                                            <span>Relevan</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Terbaru</span>
                                        </label>

                                        <span class="card-title mt-10">Tipe Pekerjaan</span>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Internship</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Full-time</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Part-time</span>
                                        </label>
                                        <label>
                                            <input type="checkbox" />
                                            <span>Freelance</span>
                                        </label>
                                        <br>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
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
                                        <div class="card hoverable" id="profile-card" v-for="(job, index) in jobs">
                                            <div class="card-image waves-effect waves-block waves-light">
                                                <img class="activator responsive-img" src="{{ asset('assets/images/gallery/search.jpg') }}" alt="user bg" />
                                            </div>
                                            <div class="card-content">
                                                <img src="{{ asset('assets/images/avatar/avatar-7.png') }}" alt="" class="circle responsive-img activator card-profile-image blue padding-1" />
                                                <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" :href="`/loker/detail/` + job.id ">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                                <h5 class="card-title activator grey-text text-darken-4 mt-1">@{{ job.nama_pekerjaan }}</h5>
                                                <p><i class="material-icons profile-card-i">perm_identity</i> @{{ job.companies.name }} - @{{job.companies.lokasi}}</p>
                                                <p><i class="material-icons profile-card-i">perm_phone_msg</i> @{{job.gaji1}} - @{{job.gaji2}}</p>
                                                <p><i class="material-icons profile-card-i">email</i> @{{job.pengalaman}}</p>
                                            </div>
                                            <div class="card-reveal">
                                                <span class="card-title grey-text text-darken-4">@{{ job.nama_pekerjaan }} <i class="material-icons right">close</i>
                                                </span>
                                                <p>Informasi Pekerjaan.</p>
                                                <p><i class="material-icons">perm_identity</i>&ensp;@{{ job.companies.name }} - @{{job.companies.lokasi}}</p>
                                                <p><i class="material-icons">perm_phone_msg</i>&ensp;@{{job.gaji1}} - @{{job.gaji2}}</p>
                                                <p><i class="material-icons">email</i>&ensp;@{{job.pengalaman}}</p>
                                                <p><i class="material-icons">cake</i>&ensp;Dibuat pada @{{job.tgl_buat}}</p>
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
    let app = new Vue({
        el: '#app',
        data: {
            jobs: JSON.parse('{!! $jobs !!}'),
            relevan: '',
        },
        methods: {
            // check: function(e) {
            //     console.log(this.report)
            //     //  this.sendData();
            //     window.location.href = `/loker?relevan=${this.relevan}`;
            // },
        }
    })
</script>
@endsection
@extends('layouts_admin.app')

@section('title')
Manage User
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
                        <h5 class="breadcrumbs-title"><span>Manage User</span></h5>
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
                                    <a class="btn cyan waves-effect waves-light right" href="/user/create">
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
                                                        <th style="text-align: center;">NIK/Username</th>
                                                        <th style="text-align: center;">Nama</th>
                                                        <th style="text-align: center;">Group</th>
                                                        <th style="text-align: center;">Email</th>
                                                        <th style="text-align: center;">Status</th>
                                                        <th style="text-align: center;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(user, index) in users">
                                                        <td style="text-align: center;" v-if="user.group_id == 1">@{{user.username}}</td>
                                                        <td style="text-align: center;" v-if="user.group_id == 2">@{{user.nik}}</td>
                                                        <td style="text-align: center;">@{{user.name}}</td>
                                                        <td style="text-align: center;" v-if="user.group_id == 1">Admin</td>
                                                        <td style="text-align: center;" v-if="user.group_id == 2">User</td>
                                                        <td style="text-align: center;">@{{user.email}}</td>
                                                        <td style="text-align: center;">@{{user.status}}</td>
                                                        <td style="text-align: center;">
                                                            <a class='dropdown-trigger' style="color:black;" href='#' data-target='option'><i class="material-icons">more_horiz</i></a>

                                                            <!-- Dropdown Structure -->
                                                            <ul id='option' class='dropdown-content'>
                                                                <li><a href="#!">Edit</a></li>
                                                                <li><a href="#!">Hapus</a></li>
                                                                <li class="divider" tabindex="-1"></li>
                                                                <li><a href="#!">Detail</a></li>
                                                            </ul>
                                                            <!-- <a :href="`/user/detail/` + user.id" class="btn-small btn-light-indigo"><i class="material-icons">more_horiz</i></a> -->
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center;">NIK/Username</th>
                                                        <th style="text-align: center;">Group</th>
                                                        <th style="text-align: center;">Nama</th>
                                                        <th style="text-align: center;">Email</th>
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
                users: JSON.parse('{!! $users !!}'),
            },
        })
    </script>
    @endsection
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Pendaftaran - Lapak Manjur</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/vendors.min.css') }}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/horizontal-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/horizontal-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layouts/style-horizontal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/register.css') }}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom/custom.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="horizontal-layout page-header-light horizontal-menu preload-transitions 1-column register-bg   blank-page blank-page" data-open="click" data-menu="horizontal-menu" data-col="1-column">
    <div class="row" id="app">
        <div class="col s12">
            <div class="container">
                <div id="register-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
                        <form @submit.prevent="submitForm">
                            <div class="row">
                                <div class="input-field col s10">
                                    <h5 class="ml-4">Pendaftaran</h5>
                                </div>
                                <div class="input-field col s2">
                                    <a href="/homepage">
                                        <h5 class="ml-12" style="text-align: right;"><i class="material-icons">home</i></h5>
                                    </a>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">chrome_reader_mode</i>
                                    <input id="nik" type="text" v-model="nik" onkeypress="return /[00000-99999]/i.test(event.key)" maxlength="16">
                                    <label for="nik" class="center-align">NIK (harus berupa angka sebanyak 16 digit)</label>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="name" type="text" v-model="name">
                                    <label for="name" class="center-align">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">mail_outline</i>
                                    <input type="text" v-model="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" v-model="password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12" type="submit">Daftar <i class="fas fa-sign-in-alt ms-1"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <b>
                                        <p class="margin medium-small"><a style="color:blue" href="/login">Sudah memiliki Akun? Masuk.</a></p>
                                    </b>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-script.js') }}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    <!-- Vue -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-cleave-component@2"></script>

    <script>
        let app = new Vue({
            el: '#app',
            data: {
                nik: '',
                name: '',
                username: '',
                password: '',
                email: '',
                created_at: '',
                updated_at: '',

                users: JSON.parse('{!! $users !!}'),

                loading: false,
            },
            methods: {
                checkNIK: function() {
                    window.href.location = `/register?nik=${this.nik}`
                },
                submitForm: function() {
                    console.log(this.name)
                    if (this.nik.length != 16) {
                        console.log(this.users)
                        Swal.fire({
                            title: 'Terjadi Kesalahan!',
                            text: 'NIK kurang dari 16 digit.',
                            icon: 'error',
                            allowOutsideClick: true,
                        })
                    } else {
                        console.log(this.name)
                        if (this.name == '') {
                            Swal.fire({
                                title: 'Terjadi Kesalahan!',
                                text: 'Nama tidak boleh kosong.',
                                icon: 'error',
                                allowOutsideClick: true,
                            })
                        } else {
                            if (this.email == '') {
                                Swal.fire({
                                    title: 'Terjadi Kesalahan!',
                                    text: 'Email tidak boleh kosong.',
                                    icon: 'error',
                                    allowOutsideClick: true,
                                })
                            } else {
                                if (this.password == '') {
                                    Swal.fire({
                                        title: 'Terjadi Kesalahan!',
                                        text: 'Password tidak boleh kosong.',
                                        icon: 'error',
                                        allowOutsideClick: true,
                                    })
                                } else {
                                    this.sendData();
                                }
                            }
                        }

                    }
                },
                sendData: function() {
                    // console.log('submitted');
                    let vm = this;
                    vm.loading = true;
                    axios.post('/register', {
                            nik: this.nik,
                            name: this.name,
                            username: this.username,
                            password: this.password,
                            email: this.email,
                            created_at: this.created_at,
                            updated_at: this.updated_at,

                        })
                        .then(function(response) {
                            vm.loading = false;

                            Swal.fire({
                                title: 'Berhasil! Akun anda sudah terdaftar.',
                                text: 'Masukkan nik dan password untuk dapat masuk ke dalam sistem.',
                                icon: 'success',
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/login';
                                }
                            })
                            // console.log(response);
                        })
                        .catch(function(error) {
                            vm.loading = false;
                            console.log(error);
                            if (this.nik == null) {
                                Swal.fire({
                                    title: 'Terjadi Kesalahan!',
                                    text: 'Pastikan NIK terisi dengan benar.',
                                    icon: 'error',
                                    allowOutsideClick: true,
                                })
                            }

                        })
                },
            }
        })
    </script>


</html>
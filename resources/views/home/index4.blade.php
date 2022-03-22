<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Home - Lapak Manjur</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap App Landing Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Small Apps Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/images/favicon.png') }}" />

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="{{ asset('home/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('home/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('home/plugins/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('home/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/plugins/aos/aos.css') }}">

    <link rel="icon" href="{{ asset('home/assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('home/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/argon.css?v=1.1.0') }}" type="text/css">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" media="screen" href="{{ asset('particles/css/style.css') }}">

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


    <nav class="navbar main-nav fixed-top navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
        <div class="container">
            <a class="navbar-brand" href="/homepage"><img src="{{ asset('home/images/logo3.png') }}" alt="logo" style="width:100px"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item @@about active">
                        <a class="nav-link" href="/homepage">Home</a>
                    </li>
                    <li class="nav-item @@about">
                        <a class="nav-link" href="/lpk/daftar">Daftar LPK</a>
                    </li>
                    <?php if ($user == null) { ?>
                        <li class="nav-item @@contact">
                            <a class="nav-link" href="/register">Daftar</a>
                        </li>
                        <li class="nav-item @@contact">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    <?php } ?>

                    <?php if ($user != null) { ?>
                        <li class="nav-item @@contact">
                            <a class="nav-link" href="/profil">Selamat Datang, {{ $user->name }}!</a>
                        </li>
                        <li class="nav-item @@contact">
                            <a class="nav-link" href="/logout">Keluar</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <!--====================================
=            Hero Section            =
=====================================-->
    <section class="section gradient-banner">
        <div class="shapes-container">
            <div id="particles-js"></div>
            <!-- <div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
            <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
            <div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div> -->
        </div>
        <!-- <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-2 order-md-1 text-center text-md-left">
                    <img class="img-fluid" src="{{ asset('home/images/logo_lm.png') }}" alt="screenshot">
                </div>
                <div class="col-md-6 text-center order-1 order-md-2">
                    <img class="img-fluid" src="{{ asset('home/images/laptop.png') }}" alt="screenshot">
                </div>
            </div>
        </div> -->
    </section>


    <!-- <div class="count-particles"> -->
    <!-- particles.js container -->

    <!--====  End of Hero Section  ====-->

    <section class="section pt-0 position-relative pull-top">
        <div class="container">
            <div class="rounded shadow p-5 bg-white">
                <div class="row">
                    <!-- Outline -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="border-radius: 20%;">
                            <a href="/kartu_kuning" class="btn btn-outline-danger" style="border-radius: 20%;">
                                <div class="card-body" style="border-radius: 50%;">
                                    <i style="font-size: 100px;" class="ni ni-single-copy-04"></i>
                                    <br><br>
                                    <h3 style="font-weight:bold;">AK-1 Online</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="border-radius: 20%;">
                            <a href="/rekom_passport" class="btn btn-outline-danger" style="border-radius: 20%;">
                                <div class="card-body" style="border-radius: 50%;">
                                    <i style="font-size: 100px;" class="ni ni-archive-2"></i>
                                    <br><br>
                                    <h3 style="font-weight:bold;">Rekom Passport</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="border-radius: 20%;">
                            <a href="/loker" class="btn btn-outline-danger" style="border-radius: 20%;">
                                <div class="card-body" style="border-radius: 50%;">

                                    <i style="font-size: 100px;" class="ni ni-hat-3"></i>
                                    <br><br>
                                    <h3 style="font-weight:bold;">BURSA KERJA</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="border-radius: 20%;">
                            <a href="/info_pelatihan" class="btn btn-outline-danger" style="border-radius: 20%;">
                                <div class="card-body" style="border-radius: 50%;">
                                    <i style="font-size: 100px;" class="ni ni-tablet-button"></i>
                                    <br><br>
                                    <h3 style="font-weight:bold;">Info Pelatihan</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--============================
=            Footer            =
=============================-->
    <footer>
        <div class="text-center py-4">
            <small>Copyright &copy; <script>
                    document.write(new Date().getFullYear())
                </script>. DISNAKER CIANJUR </small class="text-secondary">
        </div>
    </footer>


    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('home/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('home/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('home/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('home/plugins/syotimer/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('home/plugins/aos/aos.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="{{ asset('home/plugins/google-map/gmap.js') }}"></script>

    <script src="{{ asset('home/js/script.js') }}"></script>


    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('home/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('home/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('home/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('home/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('home/assets/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('home/assets/js/demo.min.js') }}"></script>

    <!-- scripts -->
    <script src="{{ asset('particles/particles.js') }}"></script>
    <script src="{{ asset('particles/js/app.js') }}"></script>

    <!-- stats.js -->
    <script src="{{ asset('particles/js/lib/stats.js') }}"></script>
    <script>
        /* ---- particles.js config ---- */

        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 380,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });


        /* ---- stats.js config ---- */

        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>
</body>

</html>
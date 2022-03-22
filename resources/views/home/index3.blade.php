<!DOCTYPE html>
<html>

<head>
    <title>Home - Lapak Manjur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #section1 {
            padding-top: 50px;
            height: 800px;
            color: #fff;
            /* background-color: #1E88E5; */
            background: rgb(105, 100, 182);
            background: linear-gradient(90deg, rgba(105, 100, 182, 1) 0%, rgba(79, 127, 204, 1) 46%, rgba(101, 174, 189, 1) 100%);
        }

        #section2 {
            padding-top: 50px;
            height: 500px;
            color: #fff;
            background-color: #673ab7;
        }

        #section3 {
            padding-top: 50px;
            height: 500px;
            color: #fff;
            background-color: #ff9800;
        }

        #section41 {
            padding-top: 50px;
            height: 500px;
            color: #fff;
            background-color: #00bcd4;
        }

        #section42 {
            padding-top: 50px;
            height: 500px;
            color: #fff;
            background-color: #009688;
        }


        /* ---- reset ---- */

        body {
            margin: 0;
            background-color: #009688;
        }

        canvas {
            /* display: block; */
            vertical-align: bottom;
        }


        /* ---- particles.js container ---- */

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
        }
    </style>
    <!-- 
    <style>
       
    </style> -->
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" class="scrollspy-example">

    <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Lapak Manjur</a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="#section1">AK1</a></li>
                        <li><a href="#section2">Lowongan Kerja</a></li>
                        <li><a href="#section3">Rekom Passport</a></li>

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Masuk <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#section41">Section 4-1</a></li>
                                <li><a href="#section42">Section 4-2</a></li>
                            </ul>
                        <li><a href="#section3">more stuff</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="section1" class="container-fluid">
        <div id="particles-js"></div>
    </div>
    <div id="section2" class="container-fluid">
        <h1>Section 2</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>
    <div id="section3" class="container-fluid">
        <h1>Section 3</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>
    <div id="section41" class="container-fluid">
        <h1>Section 4 Submenu 1</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>
    <div id="section42" class="container-fluid">
        <h1>Section 4 Submenu 2</h1>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
        <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script>
        $('body').scrollspy({
            target: '#myNavbar',
        })
    </script>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 355,
                    "density": {
                        "enable": true,
                        "value_area": 789.1476416322727
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
                    "value": 0.48927153781200905,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 0.2,
                        "opacity_min": 0,
                        "sync": false
                    }
                },
                "size": {
                    "value": 2,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 2,
                        "size_min": 0,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 0.2,
                    "direction": "none",
                    "random": true,
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
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 83.91608391608392,
                        "size": 1,
                        "duration": 3,
                        "opacity": 1,
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
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>uniAlumni</title>

    <meta name="description" content="simple description for your site"/>
    <meta name="keywords" content="keyword1, keyword2"/>
    <meta name="author" content="Jobz"/>


    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@yourtwitterusername"/>
    <meta name="twitter:creator" content="@yourtwitterusername"/>
    <meta name="twitter:url" content="http://twitter.com/"/>
    <meta name="twitter:title" content="Your home page title, max 140 char"/>
    <meta name="twitter:description" content="Your site description, maximum 140 char "/>
    <meta name="twitter:image"
          content="assets/img/twittercardimg/twittercard-144-144.png"/>

    <meta property="og:title" content="Your home page title"/>
    <meta property="og:url" content="http://your domain here.com"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="Your site name here"/>

    <meta property="og:type" content="website"/>
    <meta property="og:image"
          content="assets/img/opengraph/fbphoto-476-476.png"/>

    <!-- desktop bookmark -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- icons & favicons -->
    <link rel="shortcut icon" type="image/x-icon"  href="{{url('/assets/img/favicon/favicon.ico')}}"/>  <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="{{url('/assets/img/favicon/favicon.ico')}}"/> <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('/assets/img/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('/')}}assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('/')}}assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url('/')}}assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/')}}assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{url('/')}}assets/img/favicon/manifest.json">

    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}assets/img/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="{{url('/')}}assets/img/favicon.ico" />

    <!-- Fallback For IE 9 [ Media Query and html5 Shim] -->
    <!--[if lt IE 9]>
    <script src="{{url('/assets/vendor/css3-mediaqueries-js/css3-mediaqueries.js')}}"></script>
    <![endif]-->

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{url('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/vendor/navbar/bootstrap-4-navbar.css')}}" />

    <!--Animate css -->
    <link rel="stylesheet" href="{{url('/assets/vendor/animate/animate.css')}}" media="all" />

    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="{{url('/assets/vendor/fontawesome/css/font-awesome.min.css')}}" />

    <!--owl carousel css -->
    <link rel="stylesheet" href="{{url('/assets/vendor/owl-carousel/owl.carousel.css')}}" media="all" />

    <!--Magnific Popup css -->
    <link rel="stylesheet" href="{{url('/assets/vendor/magnific/magnific-popup.css')}}" media="all" />



    <!--Offcanvas css -->
    <link rel="stylesheet" href="{{url('/assets/vendor/js-offcanvas/css/js-offcanvas.css')}}" media="all" />

    <!-- MODERNIZER  -->
    <script src="{{url('/assets/vendor/modernizr/modernizr-custom.js')}}"></script>

    <!-- Main Master Style  CSS  -->
    <link id="cbx-style" data-layout="1" rel="stylesheet" href="{{url('/assets/css/style-default.min.css')}}" media="all" />
</head>
<body>



<!--== Header Area Start ==-->
<header id="header-area">
    <div class="preheader-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-7 col-7">
                    <div class="preheader-left">
                        <a href="contact@classes-renforcees-alumni.org"><strong>Email:</strong> contact@classes-renforcees-alumni.org</a>
                        <a href="contact@classes-renforcees-alumni.org"><strong>Hotline:</strong> 880 454 5477</a>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-5 col-5 text-right">
                    <div class="preheader-right">
                        <a title="Login"  @if($home=="login") class="btn-auth btn-auth-rev" @else class="btn-auth btn-auth" @endif  href="{{url('login')}}">Connexion</a>
                        <a title="Register" @if($home=="register") class="btn-auth btn-auth-rev" @else class="btn-auth btn-auth" @endif href="{{url('register')}}">Inscription</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom-area" id="fixheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="main-menu navbar navbar-expand-lg navbar-light">
                       <!-- <a class="navbar-brand" href="index-2.html">
                            <img src="assets/img/logo_cr.png" alt="Logo" />
                        </a>-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucontent" aria-controls="menucontent" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="menucontent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item @if($home=="home") active @endif" ><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
                                <li class="nav-item @if($home=="about") active @endif"><a class="nav-link" href="{{url('/about')}}">A propos</a></li>
                                <li class="nav-item @if($home=="events") active @endif"><a class="nav-link" href="{{url('/events')}}">Evenements</a></li>
                                <li class="nav-item @if($home=="gallery") active @endif"><a class="nav-link" href="{{url('/gallery')}}">Galleries</a></li>
                                <li class="nav-item @if($home=="news") active @endif">
                                    <a class="nav-link" href="{{url('/news')}}" >Actualités</a>

                                </li>

                                <li class="nav-item @if($home=="contact") active @endif"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== Header Area End ==-->
            @yield('content')

<!--== Footer Area Start ==-->
<footer id="footer-area">
    <!-- Footer Widget Start -->
    <div class="footer-widget section-padding" style="padding-top: 20px;padding-bottom: 10px">
        <div class="container">
            <div class="row">
                <!-- Single Widget Start -->
                <div class="col-lg-4 col-sm-6">
                    <div class="single-widget-wrap">
                        <div class="widgei-body">
                            <div class="footer-about">
                                <!--<img src="assets/img/logo_cr.png" alt="Logo" class="img-fluid" />-->
                                <p>Réseau des Anciens regroupe les anciens élèves ainsi que les membres du personnel de l’établissement ainsi que les actuels lycéens.</p>
                                <a href="#">Phone: +8745 44 5444</a> <a href="#">Fax: +88474 156 362</a> <br> <a href="#">Email: demoemail@demo.com</a>
                            </div>
                            <div class="footer-social-icons">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-vimeo"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->

                <!-- Single Widget End -->


                <!-- Single Widget End -->
            </div>
        </div>
    </div>
    <!-- Footer Widget End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer-bottom-text">
                        <p>© 2019 Ancien du lycee Classes Renforcées.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>
<!--== Footer Area End ==-->

<!--== Scroll Top ==-->
<a href="#" class="scroll-top">
    <i class="fa fa-angle-up"></i>
</a>
<!--== Scroll Top ==-->

<!-- SITE SCRIPT  -->

<!-- Jquery JS  -->
<script src="{{url('/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

<!-- POPPER JS -->
<script src="{{url('/assets/vendor/bootstrap/js/popper.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{url('/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/vendor/navbar/bootstrap-4-navbar.js')}}"></script>

<!--owl-->
<script src="{{url('/assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

<!--Waypoint-->
<script src="{{url('/assets/vendor/waypoint/waypoints.min.js')}}"></script>

<!--CounterUp-->
<script src="{{url('/assets/vendor/counterup/jquery.counterup.min.js')}}"></script>

<!--isotope-->
<script src="{{url('/assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>

<!--magnific-->
<script src="{{url('/assets/vendor/magnific/jquery.magnific-popup.min.js')}}"></script>

<!--Smooth Scroll-->
<script src="{{url('/assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js')}}"></script>

<!--Jquery Easing-->
<script src="{{url('/assets/vendor/jquery-easing/jquery.easing.1.3.min.js')}}"></script>



<!--Jquery Valadation -->
<script src="{{url('/assets/vendor/validation/jquery.validate.min.js')}}"></script>
<script src="{{url('/assets/vendor/validation/additional-methods.min.js')}}"></script>

<!--off-canvas js -->
<script src="{{url('/assets/vendor/js-offcanvas/js/js-offcanvas.pkgd.min.js')}}"></script>

<!-- Countdown -->
<script src="{{url('/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>

<!-- custom js: main custom theme js file  -->
<script src="{{url('/assets/js/theme.min.js')}}"></script>

<!-- custom js: custom js file is added for easy custom js code  -->
<script src="{{url('/assets/js/custom.js')}}"></script>



</body>
</html>

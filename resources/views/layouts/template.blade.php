
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('vendors')}}/css/responsive.css">
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/profile.js') }}" ></script>
    





</head>


<body>
        @include('sweetalert::alert')

<div class="wrapper" id="app">




    <header>
        <div class="container">
            <div class="header-data">
                <div class="logo">
                    <a href="{{url('/home')}}" title="Accueil"><img src="{{url('/vendors')}}/images/logo.png" alt=""></a>
                </div><!--logo end-->
                <div class="search-bar">
                    <form>
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit"><i class="la la-search"></i></button>
                    </form>
                </div><!--search-bar end-->
                <nav>
                    <ul>
                        <li>
                            <a href="{{url('/home')}}" title="">
                                <span><i class="fa fa-home"></i></span>
                                Accueil
                            </a>
                        </li>


                        <li>
                            <a href="{{url('/network')}}" title="">
                                <span><i class="fa fa-users"></i></span>
                                Réseau
                            </a>

                        </li>

                        <li>
                            <a href="profiles.html" title="">
                                <span><i class="fa fa-history"></i></span>
                                Souvenirs
                            </a>

                        </li>

                        <li>
                            <a href="{{url('/messages')}}" title="" class="not-box-open">
                                <span><i class="fa fa-inbox"></i></span>
                                Messages
                            </a>

                        </li>

                        <unread></unread>
                    </ul>
                </nav><!--nav end-->
                
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div><!--menu-btn end-->
                <div class="user-account">
                    <div class="user-info">
                        <img src="{{ Auth::user()->pics }}" width="30px" height="30px" alt="">
                        <a href="#" title="">Vous</a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss">

                        <h3>Setting</h3>
                        <ul class="us-links">
                            <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                            <li><a href="#" title="">Privacy</a></li>
                            <li><a href="#" title="">Faqs</a></li>
                            <li><a href="#" title="">Terms & Conditions</a></li>
                        </ul>
                        <h3 class="tc">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Deconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </h3>
                    </div><!--user-account-settingss end-->
                </div>
            </div><!--header-data end-->
        </div>
    </header><!--header end-->

                <notification :idutilisateurs="{{ Auth::user()->idutilisateurs }}"></notification>
                <audio id="noty_audio">
                    <source src="{{asset('/audio/notify.mp3')}}">
                    <source src="{{asset('/audio/notify.ogg')}}">
                    <source src="{{asset('/audio/notify.wav')}}">
                </audio>

                <init></init>

                @yield('content')





</div><!--theme-layout end-->



<script type="text/javascript" src="{{url('vendors/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/js/popper.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/js/jquery.mCustomScrollbar.js')}}"></script>

<script type="text/javascript" src="{{url('vendors/js/scrollbar.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/js/script.js')}}"></script>

</body>
</html>

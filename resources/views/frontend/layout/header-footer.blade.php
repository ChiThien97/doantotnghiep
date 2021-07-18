<!DOCTYPE html>
<html lang="en">
<head>
    <title>TH-Computer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-wrap">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-md-end">
                            <div class="social-media">
                                <p class="mb-0 d-flex"></p>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <p class="mb-0 phone pl-md-2">
                                <a href="{{url('/tin-tuc-cong-nghe')}}" class="mr-2"><span class="fa fa-newspaper-o"></span><i class="far fa-newspaper"></i>&nbsp;Tin công nghệ</a>
                                <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a>
                                <a href="#"><span class="fa fa-paper-plane mr-1"></span> thcompurter.suport@gmail.com</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
    <div class="container">
        <a onclick="toggle()" <?php if(Request::is('/')){echo 'style="display: none"';}?> id="menu-btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="bg-transparent pr-5">
            <svg style="border: 2px solid white; border-radius: 5px; padding: 5px" viewBox="0 0 100 80" width="40" height="40">
                <rect fill="#FFF" width="100" height="15" rx="10"></rect>
                <rect fill="#FFF" y="30" width="100" height="15" rx="10"></rect>
                <rect fill="#FFF" y="60" width="100" height="15" rx="10"></rect>
            </svg>
        </a>

        <div class="collapse position-absolute " style="top: 65px;" id="collapseExample">
            <div class="w-100 box-sliding__left ">
                <div class="row pr-3">
                    <ul class="col-md-12 list-unstyled m-0 bg-white border-radius box-list-menu shadow-sm ">
                        <li class="menu-item">
                            <a class="p-0" href="{{url('/loai-san-pham/may-tinh-de-ban')}}"><i class="fas fa-desktop"></i><span>Máy tính để bàn</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href="{{url('/loai-san-pham/laptop')}}"><i class="fas fa-laptop"></i><span>Laptop</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href="{{url('/loai-san-pham/linh-kien-may-tinh')}}">
                                <i class="fas fa-memory"></i>
                                <span>Linh kiện máy tính</span>&nbsp;
                                <i class="fa fa-chevron-right float-right"></i>
                            </a>
                            <ul class="box-list-menu box-menu__child list-unstyled bg-white border-radius m-0 px-3">
                                <li class="menu-item">
                                    <a class="p-0" href="{{url('/loai-san-pham/vi-xu-ly-cpu')}}">
                                        <i class="fas fa-microchip"></i>
                                        <span class="flex-grow-1">Vi xử lý - CPU</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="p-0" href="{{url('/loai-san-pham/card-man-hinh-vga')}}">
                                        <i class="fas fa-vr-cardboard"></i>
                                        <span class="flex-grow-1">Card màn hình - VGA</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="p-0" href="{{url('/loai-san-pham/bo-nho-tam-ram')}}">
                                        <i class="fas fa-memory"></i>
                                        <span class="flex-grow-1">Bộ nhớ tạm - RAM</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href="{{url('/loai-san-pham/man-hinh')}}"><i class="fas fa-tv"></i><span>Màn hình máy tính</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href=""><i class="fas fa-mouse"></i><span>Thiết bị ngoại vi</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href=""><i class="fas fa-volume-up"></i><span>Thiết bị âm thanh</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href=""><i class="fas fa-wifi"></i><span>Thiết bị mạng</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href=""><i class="far fa-keyboard"></i><span>Phụ kiện</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href=""><i class="fas fa-chair"></i><span>Bàn & ghế gaming</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href="{{url('/tin-tuc-cong-nghe')}}"><i class="fa fa-newspaper"></i><span>Tin công nghệ</span></a>
                        </li>
                        <li class="menu-item">
                            <a class="p-0" href=""><i class="fa fa-tags"></i><span>Khuyến mãi</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <a style="max-width: 170px" class="navbar-brand" href="{{url('/')}}"><img class="w-100" src="{{asset('/images/Logo-white.png')}}" alt="TH Computer"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
{{--            <form class="form-inline m-auto">--}}
{{--                <input class="form-control mr-sm-2 border-radius" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-secondary my-2 my-sm-0 border-radius" type="submit"><span class="fa fa-search"></span></button>--}}
{{--            </form>--}}
            <form class="form-inline m-auto" method="POST" action="{{ url('ket-qua-tim-kiem') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input name="term" style="width: 300px" class="form-control mr-sm-2 border-radius" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0 border-radius" type="submit"><i class="fas fa-search"></i></button>

            </form>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item active">
                    <a class="nav-link py-0 d-flex justify-content-center align-items-center text-center flex-column" href="#">
                        <i style="font-size: 28px" class="fas fa-tools"></i>
                        <span style="font-size: 10px">Build PC</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link py-0 pl-3 d-flex justify-content-center align-items-center text-center flex-column" href="#">
                        <i style="font-size: 28px" class="fas fa-tags"></i>
                        <span style="font-size: 10px">Khuyến mại</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link py-0 pl-3 d-flex justify-content-center align-items-center text-center flex-column" href="{{url('/tra-cuu-don-hang')}}">
                        <i style="font-size: 28px" class="far fa-address-card"></i>
                        <span style="font-size: 10px">Đơn hàng</span>
                    </a>
                </li>
                @guest

                    <li class="nav-item  active dropdown">
                        <a id="navbarDropdown" class="nav-link py-0 pl-3 dropdown-toggle d-flex justify-content-center align-items-center text-center flex-column" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i style="font-size: 28px" class="fa fa-user"></i>
                            <span style="font-size: 10px">Tài khoản</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Route::has('login'))
                                    <a class="text-dark dropdown-item nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="text-dark dropdown-item nav-link" href="{{ route('register') }}">{{ __('Đăng kí') }}</a>
                            @endif
                        </div>
                    </li>
                @else
                    <li class="nav-item  active dropdown">
                        <a id="navbarDropdown" class="nav-link py-0 pl-3 dropdown-toggle d-flex justify-content-center align-items-center text-center flex-column" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i style="font-size: 28px" class="fa fa-user"></i>
                            <span style="font-size: 10px">{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item active position-relative">
                    <a class="nav-link py-0 pl-3 d-flex justify-content-center align-items-center text-center flex-column" href="{{ url('gio-hang') }}">
                        <i style="font-size: 28px" class="fas fa-shopping-cart"></i>
                        <span style="font-size: 10px">Giỏ hàng</span>
                    </a>
                    @if(session('cart'))
                    <span class="cart-counter position-absolute d-flex justify-content-center align-items-center bg-danger">
                        {{count(session('cart'))}}
                    </span>
                    @endif
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- END nav -->
<div id="overlay" onclick="toggle()" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></div>
<main class="py-3 flex-grow container">
    @yield('content')
</main>
<footer class="footer bg-white">
    <div class="container px-lg-5">
        <div class="row">
            <div class="col-md-9 py-5">
                <div class="row">
                    <div class="col-md-4 mb-md-0 mb-4">
                        <h2 class="footer-heading">Về chúng tôi</h2>
                        <p class="text-justify">Website TH Computer là sở hữu của Công ty TNHH Thương mại TH do Công ty phát triển,
                            hoạt động và vận hành.
                            Đối tượng phục vụ là tất cả các khách hàng có nhu cầu mua hàng, đặt hàng thông qua website.</p>
                        <a style="max-width: 170px" class="navbar-brand" href="{{url('/')}}"><img class="w-100" src="{{asset('/images/Logo-blue.png')}}" alt=""></a>
                    </div>
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-10">
                                <div class="row">
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">Dịch vụ</h2>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="py-1 d-block">Laptop</a></li>
                                            <li><a href="#" class="py-1 d-block">Máy tính bàn</a></li>
                                            <li><a href="#" class="py-1 d-block">Linh kiện máy tính</a></li>
                                            <li><a href="#" class="py-1 d-block">Phụ kiện</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">Kết nối</h2>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="py-1 d-block">Về chúng tôi</a></li>
                                            <li><a href="#" class="py-1 d-block">Liên hệ</a></li>
                                            <li><a href="#" class="py-1 d-block">Chính sách</a></li>
                                            <li><a href="#" class="py-1 d-block">Bảo hành</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">Liên hệ</h2>
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="py-1 d-block">Số điện thoại: +00 1234 567</a></li>
                                            <li><a href="#" class="py-1 d-block">Email: thcompurter.suport@gmail.com</a></li>
                                            <li><a href="#" class="py-1 d-block">Địa chỉ: 123, HCM</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
                <h2 class="footer-heading">Nhận thông báo mới nhất</h2>
                <form action="#" class="form-consultation">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email của bạn">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control submit px-3">Nhận tin</button>
                    </div>
                </form>
                <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script></p>
            </div>
        </div>
    </div>
</footer>

<!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    function toggle() {
        if ( $("#overlay").css('display') == "none") {
            $("#overlay").css('display','block');
        } else {
            $("#overlay").css('display','none');
        }
    }
    <?php if(Request::is('/')){?>
        $(window).scroll(function () {

            if ($(window).scrollTop() >= 500) {
                $('#menu-btn').css('display','block')
            }else {
                $('#menu-btn').css('display','none')
            }
        });
    <?php }?>
    if (navigator.userAgent.indexOf('Chrome-Lighthouse') < 0) {
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/60eec02cd6e7610a49ab38dc/1fai9tc9r';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
        Tawk_API.onLoad = function () {
            jQuery('#tawkchat-container > iframe').first().remove();
            jQuery('div[style*="999999999"] > iframe').first().remove();
            Tawk_API.hideWidget();
        }
        Tawk_API.onChatMinimized = function(){
            Tawk_API.hideWidget();
        };
    }
</script>
<!--End of Tawk.to Script-->
<div class="fab-wrapper">
    <input id="fabCheckbox" type="checkbox" class="fab-checkbox">
    <label class="fab contact" for="fabCheckbox">
        <i class="icon-cps-fab-menu"></i>
        <!-- <i class="icon-cps-close"></i> -->
    </label>
    <div class="fab-wheel">
        <a class="fab-action fab-action-1" href="https://goo.gl/maps/5Wrj6imc8t5UoaMn9" rel="nofollow" target="_blank">
            <span class="fab-title">Tìm cửa hàng</span>
            <div class="fab-button fab-button-1"><i class="icon-cps-local"></i></div>
        </a>
        <a class="fab-action fab-action-2" href="tel:0123456789" rel="nofollow">
            <span class="fab-title">Gọi trực tiếp</span>
            <div class="fab-button fab-button-2"><i class="icon-cps-phone"></i></div>
        </a>
        <a class="fab-action fab-action-3" onclick="Tawk_API.showWidget();Tawk_API.maximize();" rel="nofollow">
            <span class="fab-title">Chat ngay</span>
            <div class="fab-button fab-button-3"><i class="icon-cps-chat"></i></div>
        </a>
        <a class="fab-action fab-action-4" href="https://zalo.me/0963797531" target="_blank" rel="nofollow">
            <span class="fab-title">Chat trên Zalo</span>
            <div class="fab-button fab-button-4"><i class="icon-cps-chat-zalo"></i></div>
        </a>
    </div>
    <div class="suggestions-chat-box hidden" style="display: none;">
        <div class="box-content d-flex justify-content-around align-items-center">
            <i class="fa fa-times-circle" aria-hidden="true" id="btnClose" onclick="jQuery('.suggestions-chat-box').hide()"></i>
            <p class="mb-0 font-14">Liên hệ ngay <i class="fa fa-hand-o-right" aria-hidden="true"></i></p>
        </div>
    </div>
    <div class="devvn_bg"></div>
</div>

<script>
    jQuery(document).ready(function() {
        controlFabButton.init();
    });
    jQuery(".devvn_bg").click(function() {
        jQuery( "#fabCheckbox" ).prop( "checked", false );
    });
    var controlFabButton = {
        init: function() {
            setTimeout(function() {
                jQuery('.fab-wrapper').removeClass("hidden");
                controlFabButton.methods.clickFabButton();
                controlFabButton.methods.checkShowChatBox();
                console.log('open fab button');
            }, 6000);
        },
        methods: {
            checkShowChatBox: function() {
            },
            showChatBox: function() {
                if (typeof openCsChatBox == 'function') {
                    openCsChatBox();
                } else {
                    alert('Vui lòng liên hệ Hotline 1800.2064');
                }
            },
            showZaloChatBox: function() {
                if (typeof ZaloSocialSDK.openChatWidget == 'function') {
                    ZaloSocialSDK.openChatWidget();
                } else {
                    alert('Vui lòng liên hệ Hotline 1800.2064');
                }
            },
            clickFabButton: function() {
                jQuery('#fabCheckbox').click(function() {
                    jQuery('.suggestions-chat-box').hide();
                    if (jQuery(this).is(':checked')) {
                        jQuery(".header-overlay").addClass("active");
                        jQuery(".header-overlay").css({"background":"rgba(0,0,0,.8)"});
                    } else {
                        jQuery(".header-overlay").removeClass("active");
                        jQuery(".header-overlay").css({"background":"rgba(0,0,0,.53)"});
                    }
                });
            }
        }
    }
</script>

</body>
</html>

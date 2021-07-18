@extends('frontend.layout.header-footer')
@section('content')
    <!--MENU_SLIDING-BANNER_RIGHT-BANNER-->
    <div class="row">
        <div class="col-md-12 mb-4"><div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3 box-sliding__left ">
                    <div class="row pr-3">
                        <ul class="col-md-12 list-unstyled m-0 bg-white border-radius box-list-menu shadow-sm pr-0">
                            <li class="menu-item">
                                <a href="{{url('/loai-san-pham/may-tinh-de-ban')}}"><i class="fas fa-desktop"></i><span>Máy tính để bàn</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{url('/loai-san-pham/laptop')}}"><i class="fas fa-laptop"></i><span>Laptop</span></a>
                            </li>
                            <li class="menu-item ">
                                <a href="{{url('/loai-san-pham/linh-kien-may-tinh')}}">
                                    <i class="fas fa-memory"></i>
                                    <span class="flex-grow-1">Linh kiện máy tính</span>
                                    <i class="fa fa-chevron-right float-right"></i>
                                </a>
                                <ul class="box-list-menu box-menu__child list-unstyled bg-white">
                                    <li class="menu-item">
                                        <a href="{{url('/loai-san-pham/vi-xu-ly-cpu')}}">
                                            <i class="fas fa-memory"></i>
                                            <span class="flex-grow-1">Vi xử lý - CPU</span>
                                        </a>
                                    </li>
                                    <li class="menu-item"></li>
                                    <li class="menu-item"></li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="{{url('/loai-san-pham/man-hinh')}}"><i class="fas fa-tv"></i><span>Màn hình máy tính</span></a>
                            </li>
                            <li class="menu-item">
                                <a href=""><i class="fas fa-mouse"></i><span>Thiết bị ngoại vi</span></a>
                            </li>
                            <li class="menu-item">
                                <a href=""><i class="fas fa-volume-up"></i><span>Thiết bị âm thanh</span></a>
                            </li>
                            <li class="menu-item">
                                <a href=""><i class="fas fa-wifi"></i><span>Thiết bị mạng</span></a>
                            </li>
                            <li class="menu-item">
                                <a href=""><i class="far fa-keyboard"></i><span>Phụ kiện</span></a>
                            </li>
                            <li class="menu-item">
                                <a href=""><i class="fas fa-chair"></i><span>Bàn & ghế gaming</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{url('/tin-tuc-cong-nghe')}}"><i class="fa fa-newspaper"></i><span>Tin công nghệ</span></a>
                            </li>
                            <li class="menu-item">
                                <a href=""><i class="fa fa-tags"></i><span>Khuyến mãi</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7 border-radius shadow-sm overflow-hidden box-sliding__center p-0">
                    <div class="row">
                        <div class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="">
                                        <img class="border-radius swiper-lazy swiper-lazy-loaded" alt="" src="{{asset("/images/slideshow_1.png")}}">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="">
                                        <img class="border-radius swiper-lazy swiper-lazy-loaded" alt="" src="{{asset("/images/slideshow_2.png")}}">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="">
                                        <img class="border-radius swiper-lazy swiper-lazy-loaded" alt="" src="{{asset("/images/slideshow_3.jpg")}}">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="">
                                        <img class="border-radius swiper-lazy swiper-lazy-loaded" alt="" src="{{asset("/images/slideshow_4.png")}}">
                                    </a>
                                </div>

                                <div class="swiper-slide">
                                    <a href="">
                                        <img class="border-radius swiper-lazy swiper-lazy-loaded" alt="" src="{{asset("/images/slideshow_5.png")}}">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="">
                                        <img class="border-radius swiper-lazy swiper-lazy-loaded" alt="" src="{{asset("/images/slideshow_6.png")}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs" style="width: 96%">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">Sắm chuột xịn<br>Chơi game mịn</div>
                                <div class="swiper-slide">Mua ngay<br>Giao trong ngày</div>
                                <div class="swiper-slide">Laptop chính hãng<br>Miễn phí giao hàng</div>
                                <div class="swiper-slide">Mở bán lẻ<br>VGA-Card màn hình</div>
                                <div class="swiper-slide">Intel<br>Pick your Game</div>
                                <div class="swiper-slide">Gear giá sốc<br>Giao siêu tốc</div>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2 box-sliding__right">
                    <div class="row pl-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 right__box-img">
                                    <div class="row">
                                        <a href="">
                                            <img class="w-100 border-radius" src="{{asset("images/solid1.png")}}" height="115px" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 right__box-img">
                                    <div class="row">
                                        <a href="">
                                            <img class="w-100 border-radius" src="{{asset("images/solid2.png")}}" height="115px" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 right__box-img">
                                    <div class="row">
                                        <a href="">
                                            <img class="w-100 border-radius" src="{{asset("images/solid3.png")}}" height="115px" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3 shadow-sm">
            <div class="row">
                <a href="" target="_blank">
                    <img class="rounded shadow-blue" src="https://cdn.cellphones.com.vn/media/wysiwyg/new-HP_DESKTOP_COVID.png" width="1140px">
                </a>
            </div>
        </div>
    </div>

    <!--BRAND-->
    <div class="row shadow-sm border-radius">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white border-radius  pt-3">
            <div class="">
                <div class="d-flex align-items-center">
                    <h3 class="product-title text-capitalize m-0 text-primary">Thương hiệu nổi bật</h3>
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <a href="">
                        <img class="border-radius w-100 shadow-blue" src="{{asset("images/group 18.png")}}" alt="">
                    </a>
                </div>
                <div class="col">
                    <a href="">
                        <img class="border-radius w-100 shadow-blue" src="{{asset("images/group 19.png")}}" alt="">
                    </a>
                </div>
                <div class="col">
                    <a href="">
                        <img class="border-radius w-100 shadow-blue" src="{{asset("images/group 20.png")}}" alt="">
                    </a>
                </div>
                <div class="col">
                    <a href="">
                        <img class="border-radius w-100 shadow-blue" src="{{asset("images/group 21.png")}}" alt="">
                    </a>
                </div>
                <div class="col">
                    <a href="">
                        <img class="border-radius w-100 shadow-blue" src="{{asset("images/group 23.png")}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--PRODUCT-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 border-radius pt-3">
            <div class="box_title d-flex justify-content-between align-items-center">
                <h3 class="product-title text-capitalize m-0">Laptop chính hãng <i class="fas fa-laptop"></i></h3>
                <a class="badge badge-light text-primary badge-pill badge-btn m-0 p-2 mr-3" style="font-size: 100%" href="{{url('/loai-san-pham/laptop')}}">Xem tất cả <i class="fa fa-chevron-circle-right"></i></a>
            </div>
            <div class="row mt-3">
                <?php
                $sp_laptop = DB::table('san_phams')
                    ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                    ->select('san_phams.*')
                    ->where('loai_san_phams.id_parent','=',1)
                    ->orWhere('loai_san_phams.id','=',1)
                    ->orderByDesc('luotxem')
                    ->limit(8)
                    ->get();
                ?>
                @foreach($sp_laptop as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 pb-3">
                        <div class="card border-0 mb-0 h-100 shadow-sm">
                            <a class="h-100 d-flex flex-column align-content-between" href="{{url('san-pham/'.$item->slug)}}">
                                <span>
                                    <img class="card-img-top" src="{{asset("images/".$item->hinhanh)}}" alt="{{$item->tensanpham}}">
                                    <h5 class="p-2 card-title text-dark">{{$item->tensanpham}}</h5>
                                </span>
                                <div class="card-body p-2 d-flex flex-column justify-content-end">
                                    <h6 class="graduate"><i class="fas fa-shield-alt"></i>&nbsp;{{$item->baohanh}} THÁNG</h6>
                                    @if($item->soluongton<=0)
                                        <h5 class="text-danger">Tạm hết hàng</h5>
                                    @elseif($item->giakhuyenmai>0)
                                        <div class="d-flex">
                                            <h5 class="text-danger mr-1">{{number_format($item->giakhuyenmai)}} đ</h5>
                                            <h5 class="text-secondary "><del>{{number_format($item->gia)}} đ</del></h5>
                                            <h6 class="home onsale ">-{{round((($item->gia-$item->giakhuyenmai)/$item->gia)*100)}}%</h6>
                                        </div>
                                    @elseif($item->gia==0)
                                        <h5 class="text-danger">Giá Liên Hệ</h5>
                                    @else
                                        <h5 class="text-danger">{{number_format($item->gia)}} đ</h5>
                                    @endif
                                    <div class="alert alert-info p-1" style="font-size: 12px">
                                        <span class="alert-link">Tặng kèm:</span>
                                        <span>Window 11 Pro, phần mềm diệt viruss miễn phí</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--PRODUCT-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 border-radius pt-3">
            <div class="box_title d-flex justify-content-between align-items-center">
                <h3 class="product-title text-capitalize m-0">Linh kiện máy tính <i class="fas fa-memory"></i></h3>
                <a class="badge badge-light text-primary badge-pill badge-btn m-0 p-2 mr-3" style="font-size: 100%" href="{{url('/loai-san-pham/linh-kien-may-tinh')}}">Xem tất cả <i class="fa fa-chevron-circle-right"></i></a>
            </div>
            <div class="row mt-3">
                <?php
                $sp_linhkien = DB::table('san_phams')
                    ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                    ->select('san_phams.*')
                    ->where('loai_san_phams.id_parent','=',4)
                    ->orWhere('loai_san_phams.id','=',4)
                    ->orderByDesc('luotxem')
                    ->limit(8)
                    ->get();
                ?>
                @foreach($sp_linhkien as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 pb-3">
                        <div class="card border-0 mb-0 h-100 shadow-sm">
                            <a class="h-100 d-flex flex-column align-content-between" href="{{url('san-pham/'.$item->slug)}}">
                            <span>
                                <img class="card-img-top" src="{{asset("images/".$item->hinhanh)}}" alt="{{$item->tensanpham}}">
                                <h5 class="p-2 card-title text-dark">{{$item->tensanpham}}</h5>
                            </span>
                                <div class="card-body p-2 d-flex flex-column justify-content-end">
                                    <h6 class="graduate"><i class="fas fa-shield-alt"></i>&nbsp;{{$item->baohanh}} THÁNG</h6>
                                    @if($item->soluongton<=0)
                                        <h5 class="text-danger">Tạm hết hàng</h5>
                                    @elseif($item->giakhuyenmai>0)
                                        <div class="d-flex">
                                            <h5 class="text-danger mr-1">{{number_format($item->giakhuyenmai)}} đ</h5>
                                            <h5 class="text-secondary "><del>{{number_format($item->gia)}} đ</del></h5>
                                            <h6 class="home onsale ">-{{round((($item->gia-$item->giakhuyenmai)/$item->gia)*100)}}%</h6>
                                        </div>
                                    @elseif($item->gia==0)
                                        <h5 class="text-danger">Giá Liên Hệ</h5>
                                    @else
                                        <h5 class="text-danger">{{number_format($item->gia)}} đ</h5>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--PRODUCT-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 border-radius pt-3">
            <div class="box_title d-flex justify-content-between align-items-center">
                <h3 class="product-title text-capitalize m-0">Màn hình máy tính <i class="fas fa-tv"></i></h3>
                <a class="badge badge-light text-primary badge-pill badge-btn m-0 p-2 mr-3" style="font-size: 100%" href="{{url('/loai-san-pham/man-hinh')}}">Xem tất cả <i class="fa fa-chevron-circle-right"></i></a>
            </div>
            <div class="row mt-3">
                <?php
                $sp_manhinh = DB::table('san_phams')
                    ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                    ->select('san_phams.*')
                    ->where('loai_san_phams.id_parent','=',11)
                    ->orWhere('loai_san_phams.id','=',11)
                    ->orderByDesc('luotxem')
                    ->limit(8)
                    ->get();
                ?>
                @foreach($sp_manhinh as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 pb-3">
                        <div class="card border-0 mb-0 h-100 shadow-sm">
                            <a class="h-100 d-flex flex-column align-content-between" href="{{url('san-pham/'.$item->slug)}}">
                            <span>
                                <img class="card-img-top" src="{{asset("images/".$item->hinhanh)}}" alt="{{$item->tensanpham}}">
                                <h5 class="p-2 card-title text-dark">{{$item->tensanpham}}</h5>
                            </span>
                                <div class="card-body p-2 d-flex flex-column justify-content-end">
                                    <h6 class="graduate"><i class="fas fa-shield-alt"></i>&nbsp;{{$item->baohanh}} THÁNG</h6>
                                    @if($item->soluongton<=0)
                                        <h5 class="text-danger">Tạm hết hàng</h5>
                                    @elseif($item->giakhuyenmai>0)
                                        <div class="d-flex">
                                            <h5 class="text-danger mr-1">{{number_format($item->giakhuyenmai)}} đ</h5>
                                            <h5 class="text-secondary "><del>{{number_format($item->gia)}} đ</del></h5>
                                            <h6 class="home onsale ">-{{round((($item->gia-$item->giakhuyenmai)/$item->gia)*100)}}%</h6>
                                        </div>
                                    @elseif($item->gia==0)
                                        <h5 class="text-danger">Giá Liên Hệ</h5>
                                    @else
                                        <h5 class="text-danger">{{number_format($item->gia)}} đ</h5>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--NEWS TECH-->
    <div class="row mb-3">
        <div class="col-md-12 col-sm-12 col-xs-12 border-radius pt-3 s">
            <div class="box_title d-flex justify-content-between align-items-center">
                <h3 class="product-title text-capitalize m-0">Tin công nghệ mới nhất <i class="fa fa-newspaper"></i></h3>
                <a class="badge badge-light text-primary badge-pill badge-btn m-0 p-2 mr-3" style="font-size: 100%" href="{{url('/tin-tuc-cong-nghe')}}">Xem tất cả <i class="fa fa-chevron-circle-right"></i></a>
            </div>
            <div class="row mt-3">
                <?php
                $tintuc = DB::table('tin_tucs')->limit(6)->get();
                $result_tt = json_decode($tintuc, true);
                ?>
                @foreach($result_tt as $item)
                <div class="col-lg-6 col-md-6 col-sm-6 px-2 pb-3">
                    <div class="card border-0 mb-0 h-100 p-2 bg-white border-radius shadow-sm">
                        <a class="row h-100" href="{{url('/tin-tuc/'.$item['slug'])}}">
                            <img style="border-radius: 30% 15%; " class="col-4 h-100" src="{{asset("images/".$item['hinhanh'])}}" alt="{{$item['tieude']}}">
                            <div class="card-body p-1 col-8">
                                <p class="card-title font-lg text-dark h5" style="-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;display: -webkit-box;">{{$item['tieude']}}</p>
                                <i class="font-sm text-xs text-dark" style="font-size: 11px"> {{date('d/m/Y',strtotime($item['created_at']))}}<br> bởi {{$item['tacgia']}}</i>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            swiper.init();
        });

        var swiper = {
            data: {

            },
            init: function() {
                swiper.methods.slidingHome();
            },
            methods: {
                slidingHome: function() {
                    var swiper_sliding_thumbs = new Swiper('.gallery-thumbs', {
                        slidesPerView: 5,
                        freeMode: true,
                        watchSlidesVisibility: true,
                        watchSlidesProgress: true,
                    });
                    var swiper_sliding_top = new Swiper('.gallery-top', {
                        loop: true,
                        lazy: {
                            loadPrevNext: true,
                        },
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: '.box-sliding .swiper-button-next',
                            prevEl: '.box-sliding .swiper-button-prev',
                        },
                        thumbs: {
                            swiper: swiper_sliding_thumbs
                        }
                    });
                },

            }
        }
    </script>
@endsection

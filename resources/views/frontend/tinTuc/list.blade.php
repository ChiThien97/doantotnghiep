@extends('frontend.layout.header-footer')
@section('content')
    <style>
        .card-title.d-flex.align-items-center{
            background-color: #3490dc !important;
        }
        .post-header{
            position: relative;
            min-height: 300px;
            background-color: #444;
            margin-bottom: 0px;
            overflow: hidden;
        }
        .post-header:before {
            bottom: 0;
            content: "";
            display: block;
            height: 50%;
            width: 100%;
            position: absolute;
            z-index: 1;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.8)));
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8) 100%);
        }
        .entry-title{
            font-size: 35px;
            line-height: normal;
            font-weight: 500;
            margin-bottom: 14px;
            color: #fff;
        }
        .meta-info{
            font-family: 'Open Sans', 'Open Sans Regular', sans-serif;
            font-size: 15px;
            margin-bottom: 15px;
            line-height: 1;
            min-height: 17px;
            color: #FFF !important;
        }
        .post-title{
            position: absolute;
            bottom: 0;
            padding: 0 30px 9px 30px;
            width: 100%;
            z-index: 1;
        }
        img{
            width: 100%;
        }
        .product-item{
            height: 100px;
        }
        .product-title{
            color: #FFF;
            margin-left: 10px !important;
        }
        .product-title:before{
            content: "";
            width: 3px;
            height: 10px;
            border: 3px solid #FFF;
            border-radius: 15px;
            margin-right: 5px;
        }
        .card-title{
            border-radius: 10px;
            height: 40px;
        }
        .post-item{
            margin-bottom: 1rem;
        }
        .post-item img{
            border-radius: 10px;
            height: 150px;
        }
        .post-item p{
            color: #000;
        }

        .post-content>p strong, .post-content>p,.post-content>p em{
            font-style: normal !important;
            font-weight: normal !important;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            display: -webkit-box;
        }

    </style>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tintuc->tieude }}</li>
            </ol>
        </nav>
        <div class="row body">
            <div class="col-md-8 pt-3 bg-white border-radius shadow-sm">
                <div class="card border-0">
                    <div class="post-header shadow-blue border-radius">
                        <a href="{{url('/tin-tuc/'.$tintuc->slug)}}">
                        <div class="post-image">
                            <img class="m-auto w-100" src="../images/{{ $tintuc->hinhanh }}" alt="{{ $tintuc->tieude}}">
                        </div>
                        <header class="post-title">
                            <h3 class="entry-title">{{ $tintuc->tieude}}</h3>
                            <div class="meta-info">
                                <i class="fa fa-user"></i> {{ $tintuc->tacgia}} &nbsp;-&nbsp; <i class="fa fa-clock"></i> {{ date('d/m/Y',strtotime($tintuc->created_at))}}
                            </div>
                        </header>
                        </a>
                    </div>
                    <div class="card-body mt-4 p-0">
                        <div id="data-wrapper"></div>
                        <div class="auto-load text-center">
                            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                <path fill="#000"
                                      d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                                      from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                </path>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 product-block ">
                {{--                Bài viết hot--}}
                <div class="card p-2 border-0 mb-3 border-radius shadow-sm">
                    <div class="card-title bg-info d-flex align-items-center">
                        <h5 class="product-title m-0">Tin nổi bật &nbsp;<i class="fas fa-fire-alt"></i></h5>
                    </div>
                    @foreach($tinhot as $item)
                        <a href="{{url('/tin-tuc/'.$item['slug'])}}">
                            <div class="row product-item align-items-center">
                                <div class="col-sm-4">
                                    <img class="border-radius shadow-blue m-auto w-100" height="60px" src="../images/{{ $item['hinhanh'] }}" alt="{{ $item['tieude']}}">
                                </div>
                                <div class="col-sm-8">
                                    <span class="text-rutgon-2">{{ $item['tieude']}}</span>
                                    <span class="text-secondary" style="font-size: 10px">
                                        <span><i class="fa fa-user"></i>{{ $item['tacgia']}} - </span>
                                        <span><i class="fa fa-clock"></i>{{ date('d/m/Y',strtotime($item['created_at']))}}</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="card p-2 border-0 border-radius shadow-sm">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="product-title m-0 text-capitalize">Sản phẩm tại TH Computer <i class="fas fa-store"></i></h5>
                    </div>
                    @foreach($sanpham as $item)
                        <a href="{{url('/san-pham/'.$item['slug'])}}">
                            <div class="row product-item align-items-center">
                                <div class="col-sm-4">
                                    <img class="m-auto w-100" src="../images/{{ $item['hinhanh'] }}" alt="{{ $item['tensanpham']}}">
                                    <h6 class="news graduate"><i class="fas fa-shield-alt"></i>&nbsp;{{$item['baohanh']}} THÁNG</h6>
                                </div>
                                <div class="col-sm-8">
                                    <p>{{ $item['tensanpham']}}</p>
                                    @if($item['giakhuyenmai']>0)
                                        <span class="d-flex">
                                         <span class="text-danger mr-2">{{number_format($item['giakhuyenmai'])}} đ</span>
                                        <span class="text-dark"><del>{{number_format($item['gia'])}} đ</del></span>
                                        <span class="text-danger onsale">-{{ round((($item['gia']-$item['giakhuyenmai'])/$item['gia'])*100)}}%</span>
                                    </span>
                                    @elseif($item['gia']==0)
                                        <span class="text-danger">Giá Liên Hệ</span>
                                    @else
                                        <span class="text-danger">{{number_format($item['gia'])}} đ</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        var ENDPOINT = "{{ url('/') }}";
        var page = 1;
        var flag =0;
        infinteLoadMore(page);

        $(window).scroll(function () {

            console.log($(window).scrollTop() + $('footer').height() + $('.sticky-top').height());
            console.log($('.body').height() - 200);

            if ($(window).scrollTop() + $('footer').height() + $('.sticky-top').height() >= ($('.body').height() - 200) && flag==0) {
                setTimeout(function() {
                    page++;
                    infinteLoadMore(page);
                },2000);
            }
        });

        function infinteLoadMore(page) {
            $.ajax({
                url: ENDPOINT + "/tin-tuc-cong-nghe?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
                .done(function (response) {
                        if (response.length == 0) {
                            $('.auto-load').html("Đã hết tin tức! Cám ơn bạn đã quan tâm TH Computer");
                            flag=1;
                            return;
                        }
                        $('.auto-load').hide();
                        $("#data-wrapper").append(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }

    </script>
@endsection

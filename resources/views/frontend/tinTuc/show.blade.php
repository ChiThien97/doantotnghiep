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
        }
        .post-item p{
            color: #000;
        }
        .post-content>p strong{
            font-style: normal !important;
            font-weight: normal !important;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            display: -webkit-box;
        }
        .post-content>p em{
            font-style: normal !important;
            font-weight: normal !important;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            display: -webkit-box;
        }

    </style>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/tin-tuc-cong-nghe')}}">Tin tức công nghệ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tintuc->tieude }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 pt-3 bg-white border-radius shadow-sm">
                <div class="card border-0">
                    <div class="post-header border-radius shadow-sm">
                        <div class="post-image border-radius shadow-sm">
                            <img class="m-auto w-100 border-radius shadow-sm" src="../images/{{ $tintuc->hinhanh }}" alt="{{ $tintuc->tieude}}">
                        </div>
                        <header class="post-title">
                            <h3 class="entry-title">{{ $tintuc->tieude}}</h3>
                            <div class="meta-info">
                                <i class="fa fa-user"></i> {{ $tintuc->tacgia}} &nbsp;-&nbsp; <i class="fa fa-clock"></i> {{ date('d/m/Y',strtotime($tintuc->created_at))}}
                            </div>
                        </header>
                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            $pt=$tintuc->noidung;
                            echo  (substr($pt,0));
                            ?>
                        </p>
                        <div class="card">
                            <h4 class="p-2 pb-0 mb-0 list-group-item active"><strong><i class="far fa-newspaper"></i>&nbsp;Tin tức công nghệ mới cập nhật</strong></h4>
                            <ul class="p-0 list-group">
                                @foreach($tintucs as $item)
                                    @if($item['id'] != $tintuc->id)
                                        <li class="list-group-item border-0"><a href="{{url('/tin-tuc/'.$item['slug']) }}"><i class="fas fa-newspaper"></i>&nbsp;{{$item['tieude']}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>


                    </div>

                </div>
            </div>
            <div class="col-md-4 product-block">

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
                    <div class="card-title bg-info d-flex align-items-center">
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
                    <div class="card-footer bg-white border-0 text-center">
                        <a class="badge badge-primary badge-pill badge-btn p-2" style="font-size: 100%" href="{{url('/')}}">Xem thêm <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

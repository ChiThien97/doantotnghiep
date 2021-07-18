@extends('frontend.layout.header-footer')
@section('content')
    <div class="container bg-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="#">
                        @foreach($loaisp as $item)
                            @if($item->id == $sanpham->id_loaisanpham)
                                {{ $item->tenloai }}
                            @endif
                        @endforeach
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $sanpham->tensanpham }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img class="m-auto w-100" src="../images/{{ $sanpham->hinhanh }}" alt="{{ $sanpham->tensanpham }}">
            </div>
            <div class="col-md-5">
                <div class="text-left">
                    <div class="header">
                        <div>
                            <h2>{{ $sanpham->tensanpham }}</h2>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row px-0 px-3 justify-content-start align-items-center">
                            @if($sanpham->giakhuyenmai != 0)
                                <div class="font-size-lg h3 text-danger font-weight-bold">
                                    {{ number_format($sanpham->giakhuyenmai ) }} VNĐ
                                </div>
                                <div class="pl-3">
                                    <del>{{ number_format($sanpham->gia) }} VNĐ </del>
                                </div>
                            @else
                                <div class="font-size-lg h3  text-danger font-weight-bold">
                                    {{ number_format($sanpham->gia) }} VNĐ
                                </div>
                            @endif
                        </div>
                        <div class="mb-1 text-bold">Thời gian bảo hành: <span class="font-weight-bold">{{ $sanpham->baohanh}}</span></div>
                        <pre class="text" style="white-space:break-spaces; font-family: 'Nunito', sans-serif;">{{ $sanpham->mota }}</pre>
                        <a href="{{ url('add-to-cart/'.$sanpham->id) }}" type="submit" name="add-to-cart" class="btn btn-danger">
                            <strong class="text-uppercase">Thêm vào giỏ hàng</strong><br>
                            <span>(Miễn phí giao hàng mùa dịch)</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header text-danger"> <i class="far fa-check-square"></i> Thông số kỹ thuật</h5>
                    <div class="card-body">
                        <p>
                        {{$sanpham->thongso}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

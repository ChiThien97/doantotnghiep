@extends('frontend.layout.header-footer')
@section('content')
    <div class="container mt-2">
        <div class="featured">
            <div class="card-header">
                <h1>Có <?php echo $sanpham->count() ?> kết quả tìm kiếm:</h1>
            </div>
            <p class="card-title mt-3" style="cursor: pointer;"><i><a>{{$message}}</a></i></p>
            <div class="row mt-3">
                @foreach($sanpham as $item)
                    <div class="services col-lg-3 col-md-4 col-sm-6 p-2">
                        <div class="card">
                            <a href="{{ route('san-pham.show',$item->slug) }}">
                                <img class="card-img-top" src="images/{{$item->hinhanh}}" alt="{{$item->tensanpham}}">
                                <div class="card-body p-2">
                                    <h5 class="card-title text-dark">{{$item->tensanpham}}</h5>
                                    <div class="d-flex justify-content-around">
                                        @if($item->giakhuyenmai != 0)
                                            <h6 class="text-danger">{{ number_format($item->giakhuyenmai) }} VNĐ</h6>
                                            <h6 class="text-dark"><del>{{ number_format($item->gia) }} VNĐ<del></h6>
                                        @else
                                            <h6 class="text-danger">{{ number_format($item->gia) }} VNĐ</h6>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </body>
    </html>
@endsection

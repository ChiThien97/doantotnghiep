@extends('frontend.layout.header-footer')
@section('content')
    <div class="container bg-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item">
                    @php($loaisp_item = \App\Models\loaiSanPham::findOrFail($sanpham->id_loaisanpham))
                    <a href="{{url('/loai-san-pham/'.$loaisp_item->slug)}}">
                        {{ $loaisp_item->tenloai }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $sanpham->tensanpham }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img class="m-auto w-100" src="../images/{{ $sanpham->hinhanh }}" alt="{{ $sanpham->tensanpham }}">
            </div>
            <div class="col-md-8">
                <div class="text-left">
                    <div class="header">
                        <div>

                            <span class="badge badge-danger p-2" style="font-size: 100%"> Tiết kiệm {{round((($sanpham->gia-$sanpham->giakhuyenmai)/$sanpham->gia)*100)}}%</span>
                            <h2>{{ $sanpham->tensanpham }}</h2>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row px-0 px-3 justify-content-start align-items-center">
                            @if($sanpham->soluongton>0)
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
                            @else
                                <div class="font-size-lg h3  text-danger font-weight-bold">
                                    Liên hệ
                                </div>
                            @endif
                        </div>
                        <div class="mb-1 text-bold">Thời gian bảo hành: <span class="font-weight-bold">{{ $sanpham->baohanh}} THÁNG</span></div>

                        <div class="mb-1">
                            <p class="card-text"><?php
                                $pt=$sanpham->thongso;
                                echo  (substr($pt,0));?>
                            </p>
                        </div>
                        @if($sanpham->soluongton>0)
                            <a href="{{ url('add-to-cart/'.$sanpham->id) }}" type="submit" name="add-to-cart" class="btn btn-danger mr-2">
                                <strong class="text-uppercase">Thêm vào giỏ hàng</strong><br>
                                <span>(Miễn phí giao hàng mùa dịch)</span>
                            </a>
                            <a href="tel:0123456789" class="btn btn-primary">
                                <strong class="text-uppercase">Hotline tư vấn</strong><br>
                                <span>(Tư vấn miễn phí)</span>
                            </a>
                        @else
                            <a href="tel:0123456789" name="add-to-cart" class="btn btn-secondary">
                                <strong class="text-uppercase">Sản phẩm tạm hết hàng</strong><br>
                                <span>(Liên hệ TH Computer để được tư vấn)</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-capitalize">Mô tả sản phẩm</h3>
                    <div class="card-body">
                        <p class="card-text"><?php
                            $mota=$sanpham->mota;
                            echo  (substr($mota,0));?>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-capitalize">Sản phẩm cùng loại</h3>
                    <div class="card-body py-0">
                        <div class="row">
                            @foreach($sanpham_cungloai as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                                    <div class="card border-0 mb-0">
                                        <a href="{{url('san-pham/'.$item['slug'])}}">
                                            <img class="card-img-top" src="{{asset("images/".$item['hinhanh'])}}" alt="">
                                            <div class="card-body p-2">
                                                <h5 class="card-title text-dark">{{$item['tensanpham']}}</h5>
                                                @if($item['soluongton']<=0)
                                                    <h5 class="text-danger">Tạm hết hàng</h5>
                                                @elseif($item['giakhuyenmai']>0)
                                                    <h5 class="text-danger">{{number_format($item['giakhuyenmai'])}} đ</h5>
                                                    <div class="d-flex">
                                                        <h6 class="text-dark mr-1"><del>{{number_format($item['gia'])}} đ</del></h6>
                                                        <h6 class="text-danger">-{{
                                                            round((($item['gia']-$item['giakhuyenmai'])/$item['gia'])*100)
                                                            }}%</h6>
                                                    </div>
                                                @elseif($item['gia']==0)
                                                    <h5 class="text-danger">Giá Liên Hệ</h5>
                                                @else
                                                    <h5 class="text-danger">{{number_format($item['gia'])}} đ</h5>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <form name="Comment" method="post" action="{{ route('binh-luan.store') }}">
                            @csrf
                            @guest
                                <div class="d-flex">
                                    <div class="form-group col-md-6 pl-0">
                                        <label for="username">Tên hiển thị:</label>
                                        <input type="text" name="username" class="form-control" placeholder="Vui lòng điền tên" required>
                                    </div>

                                    <div class="form-group col-md-6 pr-0">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="vidu@gmail.com" required>
                                    </div>
                                </div>

                            @else
                                <label for="noidung"> Xin chào Anh/Chị {{Auth::user()->name}}</label>
                                    <input type="text" name="username" class="form-control" readonly value="{{Auth::user()->name}}" hidden/>

                                    <input type="email" name="email" class="form-control" readonly value="{{Auth::user()->email}}" hidden>
                            @endguest
                            <div class="form-group">
                                <textarea class="form-control" name="noidung" rows="3" placeholder="Hãy để lại bình luận tại đây" required></textarea>
                            </div>
                            <input type="text" hidden name="id_sanpham" value="{{$sanpham->id}}">
                            <button type="submit" class="btn btn-primary" name="submit">Bình luận</button>
                        </form>
                    </div>
                </div>

                <!---Comment Display Section --->
                @if ($message = Session::get('success'))
                    <script>
                        alert('{{ $message }}');
                    </script>
                @endif
                @if(isset($binhluan))
                    @foreach($binhluan as $item)
                    <div class="media my-4">
                        <img class="d-flex mr-3 rounded-circle" src="../images/usericon.png" alt="">
                        <div class="media-body alert alert-primary">
                            <h5 class="mt-0">{{$item['username']}} <span style="font-size:11px;">bình luận vào lúc <b>{{$item['created_at']}}</b></span></h5>
                            <p>{{$item['noidung']}}</p>
                            @if($item['adminreply']!='')
                                <div class="alert alert-info">
                                    <h5 class="mt-0">{{$item['name']}} <span style="font-size:11px;"> đã trả lời vào lúc <b>{{$item['created_at']}}</b></span></h5>
                                    <span>{{$item['adminreply']}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

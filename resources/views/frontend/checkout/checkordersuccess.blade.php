@extends('frontend.layout.header-footer')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="btn btn-dark" href="{{ url('/') }}"><i class="fas fa-arrow-left"></i> Quay lại trang chủ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-4">
                            <h5 class="card-title text-uppercase h2">Thông tin đơn đặt hàng của bạn</h5>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{$donhang->madonhang}}</th>
                                    <td>{{$donhang->tenkhachhang}}</td>
                                    <td>{{$donhang->diachi}}</td>
                                    <td>{{$donhang->email}}</td>
                                    <td>{{$donhang->sodienthoai}}</td>
                                    <td>
                                        @if($donhang->trangthai_thanhtoan==0)
                                            {{"Chưa thanh toán"}}
                                        @else
                                            {{"Đã thanh toán"}}
                                        @endif
                                    </td>
                                    <td>{{number_format($donhang->tongtien)}} đ</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center" colspan="2">SẢN PHẨM</th>
                                    <th>BẢO HÀNH</th>
                                    <th class="text-center">SỐ LƯỢNG</th>
                                    <th>ĐƠN GIÁ</th>
                                    <th>TẠM TÍNH</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0 ?>

                                @foreach($ctdhs as $item)
                                    <?php $total += $item['gia']  ?>
                                    <tr>
                                        <td class="align-middle">
                                            <img class="card-img-top" style="width: 100px" src="/images/{{$item['hinhanh']}}" alt="{{$item['hinhanh']}}">
                                        </td>
                                        <td class="align-middle">
                                            {{$item['tensanpham']}}
                                        </td>
                                        <td class="align-middle quantity-outer">
                                            {{$item['baohanh']}} THÁNG
                                        </td>
                                        <td class="align-middle quantity-outer">
                                            <div class="counter">
                                                <input class="quantity" type="text" value="{{$item['soluong']}}" readonly>
                                            </div>
                                        </td>
                                        <td class="text-primary align-middle">
                                            @foreach($sanpham as $sp)
                                                @if($sp->id == $item['id_sanpham'])
                                                    {{number_format($sp['gia'])}} VNĐ
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-primary align-middle">
                                            {{ number_format($item['gia']) }} VNĐ
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="bg-light">
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TỔNG CỘNG:</td>
                                    <td colspan="1" class="text-danger h5 font-weight-bolder" >{{ number_format($total) }} VNĐ</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

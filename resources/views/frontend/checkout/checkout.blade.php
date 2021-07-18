@extends('frontend.layout.header-footer')
@section('content')

    <?php
    $users = Auth::user();
    ?>
    <div class="container bg-white">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="btn btn-dark" href="{{ url('gio-hang') }}"><i class="fas fa-arrow-left"></i> Quay lại giỏ hàng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-4">
                            <h5 class="card-title text-uppercase h2">Thông tin đơn đặt hàng của bạn</h5>
                        </div>
                        <form action="{{url('/thanh-toan/don-hang') }}" method="POST" onSubmit="return valid()">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="form-group col-4">
                                    <label for="hoTen">Họ và tên:</label>
                                    <input name="tenkhachhang" type="text" class="form-control" id="hoTen" aria-describedby="hoTenHelp"
                                   <?php
                                   if(isset($users)):
                                        echo 'value="';
                                        echo $users->name;
                                        echo '"';
                                   else:
                                       echo 'placeholder="VD: Nguyễn Văn A"';
                                   endif;
                                    ?> required>
                                    <small id="nameHelp" class="form-text text-muted">* Vui lòng nhập chính xác tên người sử dụng dịch vụ</small>
                                </div>
                                <div class="form-group col-4">
                                    <label for="phone">Số điện thoại:</label>
                                    <input name="sodienthoai" type="text" class="form-control" id="phone" <?php
                                    if(isset($users)):
                                        echo 'value="';
                                        echo $users->sodienthoai;
                                        echo '"';
                                    else:
                                        echo 'placeholder="VD: 0123 456 789"';
                                    endif;
                                    ?> required>
                                    <small id="phoneHelp" class="form-text text-muted">* Vui lòng nhập chính xác số điện thoại người sử dụng dịch vụ</small>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-4">
                                    <label for="email">Email:</label>
                                    <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" <?php
                                    if(isset($users)):
                                        echo 'value="';
                                        echo $users->email;
                                        echo '"';
                                    else:
                                        echo 'placeholder="VD: example@gmail.com"';
                                    endif;
                                    ?> required>
                                    <small id="emailHelp" class="form-text text-muted">* Chúng tôi sẽ không chia sẻ email của quý khách hàng dưới bất kì hình thức nào</small>
                                </div>
                                <div class="form-group col-4">
                                    <label for="address">Địa chỉ nhận hàng:</label>
                                    <input type="text" class="form-control" id="address" name="diachi" aria-describedby="emailHelp" <?php
                                    if(isset($users)):
                                        echo 'value="';
                                        echo $users->name;
                                        echo '"';
                                    else:
                                        echo 'placeholder="VD: 180 Cao Lỗ, Phường 4, Quận 8, Hồ Chí Minh"';
                                    endif;
                                    ?> required>
                                    <small id="addressHelp" class="form-text text-muted">* Vui lòng nhập chính xác địa chỉ nhận hàng</small>
                                </div>
{{--                                <div class="form-group col-4">--}}
{{--                                    <label for="address">Chọn địa chỉ THComputer gần bạn:</label>--}}
{{--                                    <select class="form-control custom-select custom-select-md" name="" id="address">--}}
{{--                                        <option selected>--Chọn địa chỉ--</option>--}}
{{--                                        <option value="180CLHCM">180, Cao Lỗ, P. 4, Q. 8, Hồ Chí Minh</option>--}}
{{--                                        <option value="180CLHCM">126, Hồ Tùng Mậu, P. Mai Dịch, Q. Cầu Giấy, Hà Nội</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-8">
                                    <label for="ghichu">Ghi chú:</label>
                                    <textarea name="ghichu" class="form-control" id="ghichu" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" scope="col-6" colspan="2">SẢN PHẨM</th>
                                            <th class="text-center"  scope="col-1" style="width:8%">SỐ LƯỢNG</th>
                                            <th class="text-center"  scope="col-2">ĐƠN GIÁ</th>
                                            <th class="text-center"  scope="col-3">TẠM TÍNH</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $total = 0 ?>
                                        @foreach(session('cart') as $id => $item)
                                            <?php $total += $item['price'] * $item['quantity'] ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img class="card-img-top" style="width: 100px" src="images/{{$item['photo']}}" alt="{{$item['name']}}">
                                                </td>
                                                <td class="align-middle">
                                                    {{$item['name']}}
                                                </td>
                                                <td class="align-middle quantity-outer" data-th="SỐ LƯỢNG">
                                                    <div class="counter">
                                                        <input class="quantity" type="text" value="{{$item['quantity']}}" readonly>
                                                    </div>
                                                </td>
                                                <td class="text-primary align-middle">
                                                    {{number_format($item['price'])}} VNĐ
                                                </td>
                                                <td class="text-primary align-middle">
                                                    {{ number_format($item['quantity'] * $item['price']) }} VNĐ
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class="bg-light">
                                        <tr>
                                            <td colspan="4" class="text-right">Tổng cộng:</td>
                                            <td colspan="2" class="text-danger h5 font-weight-bolder" >{{ number_format($total) }} VNĐ</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-dark btn-lg font-weight-bold" type="submit">ĐẶT HÀNG</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function valid(){
            var sodienthoai = jQuery('#phone').val();
            var phoneFormat = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (sodienthoai == '') {
                alert("Quý khách cần nhập số điện thoại!!");
                jQuery('#sodienthoai').focus();
                return false;
            } else if (phoneFormat.test(sodienthoai) == false) {
                alert("Số điện thoại không đúng định dạng!!");
                jQuery('#sodienthoai').focus();
                return false;
            } else if (sodienthoai.length != 10) {
                alert("Số điện thoại không đúng định dạng!!");
                jQuery('#sodienthoai').focus();
                return false;
            }
        }
    </script>
@endsection

@extends('frontend.layout.header-footer')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills justify-content-between">
                            <li class="nav-item">
                                <a class="btn btn-dark" href="{{url('/')}}"><i class="fas fa-arrow-left"></i> Quay lại trang sản phẩm</a>
                            </li>
                            <li>
                                <h5 class="card-title text-uppercase h2">Giỏ hàng của bạn</h5>
                            </li>
                        </ul>
                    </div>
                    @if (session('errors') > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Xảy ra lỗi. {{session('errors')}}
                        </div>
                    @endif

                    <div class="card-body">
                        @if(session('cart'))
                        <form action="" method="POST">
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
                                                Mainboard Asus ROG Strix Z490 F Gaming
                                            </td>
                                            <td class="align-middle quantity-outer" data-th="SỐ LƯỢNG">
                                                <div class="counter">
                                                    <span data-id="{{ $id }}" class="down update-cart" onClick='decreaseCount(event, this)'>-</span>
                                                    <input class="quantity" type="text" value="{{$item['quantity']}}">
                                                    <span data-id="{{ $id }}" class="up update-cart" onClick='increaseCount(event, this)'>+</span>
                                                </div>
                                            </td>
                                            <td class="text-primary align-middle">
                                                {{number_format($item['price'])}} VNĐ
                                            </td>
                                            <td class="text-primary align-middle">
                                                {{ number_format($item['quantity'] * $item['price']) }} VNĐ
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="far fa-trash-alt"></i></button>
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
                                <a class="btn btn-dark btn-lg font-weight-bold" href="{{ url('thanh-toan') }}">THANH TOÁN</a>
                            </div>
                        </form>
                        @else
                        <p>Giỏ hàng rỗng</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }
        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Xác nhận xóa sản phẩm !!!")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection

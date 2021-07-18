<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang quản trị | TH Computer</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.js" integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.css" />

</head>
<tbody class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">TRANG QUẢN TRỊ</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{asset('/admin')}}" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>BẢNG THỐNG KÊ</p>
                            </a>
                        </li>

                        <li class="nav-header">DỊCH VỤ KHÁCH HÀNG</li>
                        <li class="nav-item">
                            <a href="{{route('don-hang.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-atom"></i>
                                <p>
                                    Xử lý đơn hàng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('don-hang-cho-xu-ly')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Chờ xử lý
                                            <span class="badge badge-warning right">{{\App\Models\donDatHang::where('trangthai','Chờ Xử Lý')->count()}}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('don-hang-dang-xu-ly')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Đang xử lý
                                            <span class="badge badge-primary right">{{\App\Models\donDatHang::where('trangthai','Đang Xử Lý')->count()}}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('don-hang-da-hoan-thanh')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Đã hoàn thành
                                            <span class="badge badge-success right">{{\App\Models\donDatHang::where('trangthai','Đã Hoàn Thành')->count()}}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('don-hang-da-huy')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Đã hủy
                                            <span class="badge badge-secondary right">{{\App\Models\donDatHang::where('trangthai','Đã Hủy')->count()}}</span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/binh-luan')}}" class="nav-link">
                                <i class="nav-icon fas fa-atom"></i>
                                <p>Bình luận</p>
                            </a>
                        </li>
                        <li class="nav-header">QUẢN LÝ NỘI DUNG</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-atom"></i>
                                <p>
                                    Loại sản phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('loai-san-pham.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm mới loại sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('loai-san-pham.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách loại sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-servicestack"></i>
                                <p>
                                    Sản phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="{{route('san-pham.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm mới sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('san-pham.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-intercom"></i>
                                <p>
                                    Nhà sản xuất
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="{{route('nha-san-xuat.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm mới nhà sản xuất</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('nha-san-xuat.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách nhà sản xuất</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Tin tức công nghệ</p>
                            </a>
                        </li>
                        <li class="nav-header">XỬ LÝ HÀNG HÓA</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-intercom"></i>
                                <p>
                                    Nhà cung cấp
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('nha-cung-cap.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm mới nhà cung cấp</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('nha-cung-cap.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách nhà cung cấp</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  menu-is-opening menu-open active">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-intercom"></i>
                                <p>
                                    Xử lý nhập hàng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('phieu-nhap.create')}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tạo phiếu nhập hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('phieu-nhap.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách phiếu nhập</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">QUẢN LÝ THÀNH VIÊN</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Quản lý thành viên
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('nguoi-dung.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm mới thành viên</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('nguoi-dung.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách thành viên</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            <!-- /.sidebar-menu -->
            </div>
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!--END SIDE BAR-->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Xử lý nhập hàng</li>
                                <li class="breadcrumb-item active">Tạo phiếu nhập hàng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Content Header (Page header) -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('phieu-nhap.store')}}" method="POST"  enctype="multipart/form-data">

                        <!--Tạo token để chống tấn công CSRF (Cross-site Request Forgery)-->
                            @csrf
                            <div class="card card-primary">
                                <div class="card-header justify-content-start d-flex">
                                    <h3 class="m-0 pr-2">Phiếu nhập hàng</h3>
                                </div>
                                <div class="row">
                                    <div class="card-body col-md-4">
                                        <h4 class="bg-gradient-success border-radius text-center">THÔNG TIN PHIẾU NHẬP</h4>
                                        <div class="form-group row px-2">
                                            <label class="col-sm-3 col-form-label" for="nhacungcap">Nhà cung cấp: </label>
                                            <select name="id_nhacungcap" class="form-control custom-select" id="nhacungcap" required>
                                                <option selected value="">--Chọn nhà cung cấp--</option>
                                                @foreach($nhacc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->tennhacungcap }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group row px-2">
                                            <label for="ngaytao" class="col-form-label">Ngày tạo đơn:</label>
                                            <input type="date" class="form-control" id="ngaytao" value="{{date("Y-m-d")}}" readonly/>
                                        </div>

                                        <div class="form-group row px-2">
                                            <label for="sanpham" class="col-form-label">Thêm sản phẩm:</label>
                                            <!-- Button trigger modal -->
                                            <select class="form-control custom-select" id="sanpham" required>
                                                <option selected>--Chọn sản phẩm nhập--</option>
                                                @foreach($sanpham as $item)
                                                    <option value="{{ $item->id }}">{{ $item->tensanpham }}</option>
                                                @endforeach
                                            </select>
                                            <a id="pnh-btn" type="button" class="btn btn-outline-primary mt-2">
                                                Thêm vào phiếu
                                            </a>

                                        </div>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <h4 class="bg-gradient-info border-radius text-center">CHI TIẾT PHIẾU NHẬP</h4>
                                        @if(session('pnh'))
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
                                                            @foreach(session('pnh') as $id => $item)
                                                                <?php $total += $item['price'] * $item['quantity'] ?>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <img class="card-img-top" style="width: 100px" src="/images/{{$item['photo']}}" alt="{{$item['name']}}">
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        {{$item['name']}}
                                                                    </td>
                                                                    <td class="align-middle quantity-outer" data-th="SỐ LƯỢNG">
                                                                        <div class="counter">
                                                                            <span data-id="{{ $id }}" class="down update-pnh" onClick='decreaseCount(event, this)'>-</span>
                                                                            <input data-id="{{ $id }}" class="quantity" id="quantity{{ $id }}" type="text" value="{{$item['quantity']}}">
                                                                            <span data-id="{{ $id }}" class="up update-pnh" onClick='increaseCount(event, this)'>+</span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-primary align-middle">
                                                                        <div class="input-group col-sm-9">
                                                                            <input type="text" id="gia{{ $id }}" value="{{$item['price']}}" data-id="{{ $id }}" class="form-control price" required>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">VNĐ</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-primary align-middle">
                                                                        <p class="text-danger total-price m-0" data-price="0" id="total{{ $id }}" value="{{$item['total']}}">{{number_format($item['total'])}}</p>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <span class="btn btn-danger btn-sm remove-from-pnh" data-id="{{ $id }}"><i class="far fa-trash-alt"></i></span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot class="bg-light">
                                                            <tr>
                                                                <td colspan="3" class="text-right">Tổng cộng:</td>
                                                                <td colspan="3" class="text-danger h5 font-weight-bolder" >{{ number_format($total) }} VNĐ</td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>

                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <table class="table">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center" scope="col-6">SẢN PHẨM</th>
                                                    <th class="text-center"  scope="col-1">SỐ LƯỢNG</th>
                                                    <th class="text-center"  scope="col-2">ĐƠN GIÁ</th>
                                                    <th class="text-center"  scope="col-3">TẠM TÍNH</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td colspan="4">Chưa có sản phẩm</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>


                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> Xảy ra lỗi. Vui lòng kiểm tra thông tin nhập vào
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-footer">
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-primary">Lưu phiếu nhập hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function formatNumber(nStr, decSeperate, groupSeperate) {
                    nStr += '';
                    x = nStr.split(decSeperate);
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
                    }
                    return x1 + x2;
                }

                $(function () {
                    $("#sanpham").selectize({
                        create: true,
                        sortField: "text",
                    });
                });

                $('#sanpham').change(function (){
                    var b = $('#sanpham option').val();
                    var a = '{{url('phieu-nhap/san-pham/')}}';
                    var url = (a+'/'+b);
                    $('#pnh-btn').attr('href',url);
                })

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
                $(".price").change(function (e) {
                    e.preventDefault();
                    var ele = $(this);
                    $.ajax({
                        url: '{{ url('phieu-nhap-update') }}',
                        method: "patch",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val(),
                            price: ele.parents("tr").find(".price").val()
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                });

                $('.quantity').change(function (e) {
                    e.preventDefault();
                    var ele = $(this);
                    $.ajax({
                        url: '{{ url('phieu-nhap-update') }}',
                        method: "patch",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val(),
                            price: ele.parents("tr").find(".price").val()
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                });

                $(".update-pnh").click(function (e) {
                    e.preventDefault();
                    var ele = $(this);
                    $.ajax({
                        url: '{{ url('phieu-nhap-update') }}',
                        method: "patch",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id"),
                            quantity: ele.parents("tr").find(".quantity").val(),
                            price: ele.parents("tr").find(".price").val()
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                });
                $(".remove-from-pnh").click(function (e) {
                    e.preventDefault();
                    var ele = $(this);
                    if(confirm("Xác nhận xóa sản phẩm !!!")) {
                        $.ajax({
                            url: '{{ url('phieu-nhap-delete') }}',
                            method: "DELETE",
                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                            success: function (response) {
                                window.location.reload();
                            }
                        });
                    }
                });
            </script>


        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- AdminLTE App -->
    <script src="{{asset('js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>


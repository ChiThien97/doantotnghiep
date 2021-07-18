@extends('admin.layout.adminlayout')
@section('content')
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
                        <a href="{{route('nha-san-xuat.create')}}" class="nav-link active">
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
            <li class="nav-item menu-is-opening menu-open active">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-intercom"></i>
                    <p>
                        Nhà cung cấp
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('nha-cung-cap.create')}}" class="nav-link active">
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
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-intercom"></i>
                    <p>
                        Xử lý nhập hàng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('phieu-nhap.create')}}" class="nav-link">
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
                            <li class="breadcrumb-item"><a href="#">Nhà cung cấp</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Header (Page header) -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('nha-cung-cap.store') }}" method="POST"  enctype="multipart/form-data">
                        <div class="card card-primary">
                            <div class="card-header"><h3>Thêm nhà cung cấp mới</h3></div>
                            <div class="card-body col-md-6">

                                <!--Tạo token để chống tấn công CSRF (Cross-site Request Forgery)-->
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Tên nhà cung cấp:</label>
                                    <div class="col-sm-9">
                                        <input name="tennhacungcap" type="text" class="form-control" id="name" placeholder="VD: Tên nhà cung cấp">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="addr" class="col-sm-3 col-form-label">Địa chỉ:</label>
                                    <div class="col-sm-9">
                                        <input name="diachi" type="text" class="form-control" id="addr" placeholder="VD: 180 Cao Lỗ, Phường 4, Quận 8, Hồ Chí Minh">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mail" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control" id="mail" placeholder="VD: example@gmail.com">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sdt" class="col-sm-3 col-form-label">Số điện thoại:</label>
                                    <div class="col-sm-9">
                                        <input name="sodienthoai" type="text" class="form-control" id="sdt" placeholder="VD: +84 123 456">
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
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

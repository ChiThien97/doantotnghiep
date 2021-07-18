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
            <li class="nav-item menu-is-opening menu-open active">
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
                        <a href="{{route('san-pham.index')}}" class="nav-link  active">
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
                <ul class="nav nav-treeview">
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
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item"><a href="{{route('san-pham.index')}}">Danh sách</a></li>
                            <li class="breadcrumb-item active">Sửa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Header (Page header) -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('san-pham.update',$sanpham->id) }}" method="POST"  enctype="multipart/form-data">
                        <div class="card card-primary">
                            <div class="card-header"><h3>Sửa sản phẩm</h3></div>
                            <div class="card-body col-md-6">
                            @method('PATCH')
                                <!--Tạo token để chống tấn công CSRF (Cross-site Request Forgery)-->
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="category-list">Loại sản phẩm: </label>
                                    <div class="col-sm-9">
                                        <select name="id_loaisanpham" class="form-control custom-select rounded-0" id="category-list">
                                            <option>--Chọn loại sản phẩm--</option>
                                            @foreach($loaisp as $item)
                                                @if($item->id == $sanpham->id_loaisanpham)
                                                    <option value="{{ $item->id }}" selected>{{ $item->tenloai }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->tenloai }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="category-list">Nhà sản xuất: </label>
                                    <div class="col-sm-9">
                                        <select name="id_nhasanxuat" class="form-control custom-select rounded-0" id="category-list">
                                            <option>--Chọn nhà sản xuất--</option>
                                            @foreach($nhasx as $item)
                                                @if($item->id == $sanpham->id_nhasanxuat)
                                                    <option value="{{ $item->id }}" selected>{{ $item->tennhasanxuat }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->tennhasanxuat }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Tên sản phẩm:</label>
                                    <div class="col-sm-9">
                                        <input name="tensanpham" type="text" class="form-control" id="name" value="{{$sanpham->tensanpham}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug:</label>
                                    <div class="col-sm-9">
                                        <input name="slug" type="text" class="form-control" id="slug" value="{{$sanpham->slug}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gia" class="col-sm-3 col-form-label">Giá tiền:</label>
                                    <div class="input-group col-sm-9">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                        <input type="text" id="gia" name="gia" class="form-control" value="{{$sanpham->gia}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">đ</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="giakm" class="col-sm-3 col-form-label">Giá khuyến mãi:</label>
                                    <div class="input-group col-sm-9">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                        <input type="text" id="giakm" name="giakhuyenmai" class="form-control" value="{{$sanpham->giakhuyenmai}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">đ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="summernote" class="col-sm-3 col-form-label">Mô tả:</label>
                                    <div class="col-sm-9">
                                        <textarea name="mota" class="form-control summernote">{{$sanpham->mota}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="thongso" class="col-sm-3 col-form-label">Thông số kỹ thuật:</label>
                                    <div class="col-sm-9">
                                        <textarea name="thongso" class="form-control summernote" id=thongso>{{$sanpham->thongso}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="baohanh" class="col-sm-3 col-form-label">Thời gian bảo hành:</label>
                                    <div class="input-group col-sm-9">
                                        <input name="baohanh" type="number" class="form-control" id="baohanh" value="{{$sanpham->baohanh}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">THÁNG</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label" for="InputFile">Hình ảnh</label>
                                    <div class="col-sm-9 align-items-center">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="/images/{{ $sanpham->hinhanh }}" width="100%" alt="{{ $sanpham->tensanpham }}">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="rowr">
                                                    <a class="btn btn-sm btn-outline-danger col-sm-4" data-toggle="collapse" data-target="#hinhanh">Sửa ảnh</a>
                                                    <p class="col-sm-8 m-0">{{ $sanpham->hinhanh }}</p>
                                                </div>
                                                <div id="hinhanh" class="collapse custom-file mt-2">
                                                    <input name="hinhanh" type="file" class="custom-filt"  value="/images/{{ $sanpham->hinhanh }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group checkbox switcher">
                                    <label for="status">
                                        <label class="col-form-label">Trạng thái</label>
                                        <input type="checkbox" id="status" name="trangthai" {{($sanpham->trangthai)?'checked':''}}>
                                        <span><small></small></span>
                                    </label>
                                </div>

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @if( Session::get('image') == 'Không có thay đổi hình ảnh')
                                        <p>{{ Session::get('image') }}</p>
                                    @endif
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
                                        <button type="submit" class="btn btn-primary">Sửa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

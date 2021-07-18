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
            <li class="nav-item  menu-is-opening menu-open active">
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
                            <li class="breadcrumb-item"><a href="{{route('don-hang.index')}}">Xử lý đơn hàng</a></li>
                            <li class="breadcrumb-item active"><a href="">Chi tiết đơn hàng</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Header (Page header) -->
        <div class="container-fluid">
            <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="phieuBH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="max-width: 70%" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin phiếu bảo hành</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3>Sản phẩm đã lập phiếu bảo hành</h3>
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>STT</th>
                                        <th class="text-center" colspan="2">SẢN PHẨM</th>
                                        <th class="w-auto">Bảo hành</th>
                                        <th>Ngày kích hoạt bảo hành</th>
                                        <th>Ngày hết hạn bảo hành</th>
                                        <th class="w-auto">Số serial</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($stt=1)
                                    @php($flag=0)
                                    @foreach($pbh as $item)
                                        @foreach($ctdhs as $sp)
                                            @if($sp['id_sanpham'] == $item['id_sanpham'] && $sp['id'] == $item['id_chitietdonhang'])
                                                @php($flag=1)
                                                <tr>
                                                    <td class="align-middle">{{$stt++}}</td>
                                                    <td class="align-middle">

                                                            <img class="card-img-top" style="width: 100px" src="/images/{{$sp['hinhanh']}}" alt="{{$sp['hinhanh']}}">

                                                    </td>
                                                    <td class="align-middle">{{$sp['tensanpham']}}</td>
                                                    <td class="align-middle">{{$sp['baohanh']}} THÁNG</td>
                                                    <td class="align-middle">{{Date("d-m-Y", strtotime( $item['created_at']))}}</td>
                                                    <td class="align-middle">{{Date("d-m-Y", strtotime( $item['created_at']."+".$sp['baohanh']."Month"))}}</td>
                                                    <td class="align-middle">{{$item['serial']}}</td>
                                                </tr>
                                            @endif
                                            @continue
                                        @endforeach
                                    @endforeach
                                            @if($flag==0)
                                                <tr>
                                                    <td class="align-middle text-center" colspan="7">Chưa lập phiếu bảo hành</td>
                                                </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('errors'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Whoops!</strong> Xảy ra lỗi. {{ $message  }}
                        </div>
                    @endif
                    <form action="{{ route('don-hang.update',$donhang->id) }}" method="POST"  enctype="multipart/form-data">
                    @method('PATCH')
                    <!--Tạo token để chống tấn công CSRF (Cross-site Request Forgery)-->
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header justify-content-start d-flex">
                                <h3 class="m-0 pr-2">Chi tiết đơn hàng</h3>
                                <span class="btn btn-default" id="editInfo"><i class="far fa-edit"></i></span>
                            </div>
                            <div class="row">
                                <div class="card-body col-md-4">
                                    <h4 class="bg-gradient-warning border-radius text-center">ĐƠN HÀNG</h4>
                                    <div class="form-group row px-2">
                                        <label for="madon" class="col-form-label">Mã đơn hàng:</label>
                                        <input class="form-control" id="madon" value="{{ $donhang->madonhang}}" readonly/>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="ngaytao" class="col-form-label">Ngày tạo đơn:</label>
                                        <input type="date" class="form-control" id="ngaytao" value="{{ $donhang->created_at->format('Y-m-d')}}" readonly/>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="trangthai" class="col-form-label">Trạng thái:</label>
                                        <select name="trangthai" class="form-control custom-select" id="trangthai" <?php if($donhang->trangthai == "Đã Hủy") echo 'readonly'?> >
                                            <option selected value="{{ $donhang->trangthai }}">{{ $donhang->trangthai }}</option>
                                            @if($donhang->trangthai != "Chờ Xử Lý")
                                                <option value="Chờ Xử Lý">Chờ Xử Lý</option>
                                            @endif
                                            @if($donhang->trangthai != "Đang Xử Lý")
                                                <option value="Đang Xử Lý">Đang Xử Lý</option>
                                            @endif
                                            @if($donhang->trangthai != "Đã Hoàn Thành")
                                                <option value="Đã Hoàn Thành">Đã Hoàn Thành</option>
                                            @endif
                                            @if($donhang->trangthai != "Đã Hủy")
                                                <option value="Đã Hủy">Đã Hủy</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="pbh-btn" class="col-form-label">Phiếu bảo hành:</label>
                                        <!-- Button trigger modal -->
                                        @if($donhang->trangthai != "Đã Hủy")
                                        <button id="pbh-btn" type="button" class="btn btn-outline-primary form-control" data-toggle="modal" data-target="#phieuBH">
                                            Xem thông tin bảo hành
                                        </button>
                                        @endif
                                    </div>

                                </div>
                                <div class="card-body col-md-4">
                                    <h4 class="bg-gradient-cyan border-radius text-center">THANH TOÁN</h4>
                                    <div class="form-group row px-2">
                                        <label for="tenkh" class="col-form-label">Tên khách hàng:</label>
                                        <input class="form-control" id="tenkh" value="{{ $donhang->tenkhachhang}}" readonly>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="sdt" class="col-form-label">Số điện thoại:</label>
                                        <input class="form-control" id="sdt" value="{{ $donhang->sodienthoai}}" readonly>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="email" class="col-form-label">Email:</label>
                                        <input class="form-control" id="email" value="{{ $donhang->email}}" readonly>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="trangthai" class="col-form-label">Thanh toán</label>
                                        <select name="thanhtoan" class="form-control custom-select" id="trangthai">
                                            <option selected value="{{ $donhang->trangthai_thanhtoan }}">
                                                @if($donhang->trangthai_thanhtoan == 0)
                                                    {{"Chưa thanh toán"}}
                                                @else
                                                    {{"Đã thanh toán"}}
                                                @endif
                                            </option>
                                            @if($donhang->trangthai_thanhtoan != 0)
                                                <option value="0">Chưa thanh toán</option>
                                            @endif
                                            @if($donhang->trangthai_thanhtoan != 1)
                                                <option value="1">Đã thanh toán</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body col-md-4">
                                    <h4 class="bg-gradient-green border-radius text-center">GIAO HÀNG</h4>
                                    <div class="form-group row px-2">
                                        <label for="diachi" class="col-form-label">Địa chỉ:</label>
                                        <input class="form-control" id="diachi" value="{{ $donhang->diachi}}" readonly>
                                    </div>

                                    <div class="form-group row px-2">
                                        <label for="ghichu" class="col-form-label">Ghi chú:</label>
                                        <textarea class="form-control" id="ghichu" rows="8" readonly>{{ $donhang->ghichu==''?'Rỗng':$donhang->ghichu }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" colspan="2">SẢN PHẨM</th>
                                            <th>BẢO HÀNH</th>
                                            <th>Ngày kích hoạt bảo hành</th>
                                            <th>Ngày hết hạn bảo hành</th>
                                            <th class="text-center">SỐ LƯỢNG</th>
                                            <th>ĐƠN GIÁ</th>
                                            <th>TẠM TÍNH</th>
                                            <th>HÀNH ĐỘNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0 ?>
                                    @foreach($ctdhs as $id => $item)
                                        <?php $total += $item['gia']*$item['soluong']  ?>
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
                                            @php($flag=0)
                                            @foreach($pbh as $p)
                                                @if( $p['id_chitietdonhang'] == $item['id'])
                                                    <td class="align-middle text-center">{{Date("d-m-Y", strtotime( $item['created_at']))}}</td>
                                                    <td class="align-middle text-center">{{Date("d-m-Y", strtotime( $item['created_at']."+".$sp['baohanh']."Month"))}}</td>
                                                    @php($flag = 1)
                                                    @break
                                                @endif
                                            @endforeach
                                            @if($flag == 0)
                                                <td class="align-middle text-center" colspan="2">Chưa lập phiếu bảo hành</td>
                                            @endif
                                            <td class="align-middle quantity-outer">
                                                <div class="counter">
                                                    <input class="quantity" type="text" value="{{$item['soluong']}}" readonly>
                                                </div>
                                            </td>
                                            <td class="text-primary align-middle">
                                                {{number_format($sp['gia'])}} VNĐ
                                            </td>
                                            <td class="text-primary align-middle">
                                                {{ number_format($item['gia']*$item['soluong']) }} VNĐ
                                            </td>
                                            <td class="align-middle">
                                                @if($donhang->trangthai != "Đã Hủy")
                                                <button id="pbh-btn" type="button" class="btn btn-outline-danger form-control" data-toggle="modal" data-target="#phieuBH{{$id}}">
                                                    Lập phiếu bảo hành
                                                </button>
                                                @endif
                                                <!-- Modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot class="bg-light">
                                        <tr>
                                            <td colspan="7" class="text-right text-bold">TỔNG CỘNG:</td>
                                            <td colspan="2" class="text-danger text-right h5 font-weight-bolder" >{{ number_format($total) }} VNĐ</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        @if($donhang->trangthai != "Đã Hủy")
                                        <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
                                        <a href="{{url('/hoa-don/'.$donhang->madonhang)}}" target="_blank" class="btn btn-outline-primary">Xuất hóa đơn</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @foreach($ctdhs as $id => $item)
                    <div class="modal fade" id="phieuBH{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 70%" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thông tin phiếu bảo hành</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3>Sản phẩm chưa lập phiếu bảo hành</h3>
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>STT</th>
                                            <th class="text-center" colspan="2">SẢN PHẨM</th>
                                            <th class="w-25">Bảo hành</th>
                                            <th class="w-auto">Số serial</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($stt=1)
                                        @php($n=0)

                                        @foreach($pbh as $bh)
                                            @if($item['id_sanpham'] == $bh['id_sanpham'] && $bh['id_chitietdonhang'] == $item['id'])
                                                @php($n++)
                                            @endif
                                        @endforeach

                                        @if($item['soluong']-$n>0)
                                            @for($i = 1; $i <= $item['soluong']-$n; $i++)
                                                <tr>
                                                    <form action="{{route('phieu-bao-hanh.store')}}" method="POST">
                                                        @csrf
                                                        <td class="align-middle">{{$stt++}}</td>
                                                        <td class="align-middle">
                                                            <img class="card-img-top" style="width: 100px" src="/images/{{$item['hinhanh']}}" alt="{{$item['hinhanh']}}">
                                                        </td>
                                                        <td class="align-middle">{{$item['tensanpham']}}</td>
                                                        <td class="align-middle">{{$item['baohanh']}} THÁNG</td>
                                                        <td class="align-middle">
                                                            <input type="text" name="serial">
                                                            <input type="text" name="id_chitietdonhang" hidden value="{{$item['id']}}">
                                                            <input type="text" name="id_sanpham" hidden value="{{$item['id_sanpham']}}">
                                                        </td>
                                                        <td class="align-middle">
                                                            @if($donhang->trangthai != "Đã Hủy")
                                                            <button type="submit" class="btn btn-primary">Lập phiếu bảo hành</button>
                                                            @endif
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endfor
                                        @else
                                            <tr>
                                                <td class="text-center align-middle" colspan="6">Đã lập phiếu bảo hành</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <script>
                        $(document).ready(function (){
                           $('#editInfo').click(function(){
                               $('#tenkh').removeAttr('readonly');
                               $('#tenkh').attr('name','tenkhachhang');
                               $('#sdt').removeAttr('readonly');
                               $('#sdt').attr('name','sodienthoai');
                               $('#email').removeAttr('readonly');
                               $('#email').attr('name','email');
                               $('#diachi').removeAttr('readonly');
                               $('#diachi').attr('name','diachi');
                           });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection

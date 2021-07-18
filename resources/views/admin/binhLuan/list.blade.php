@extends('admin.layout.adminlayout')
@section('content')
    @php($id_admin = Auth::user()->id)
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
            <li class="nav-item active">
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
                        <h1>Danh sách bình luận</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bình luận</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{$message}} </strong>
                    </div>
                @elseif($message = Session::get('errors'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Trạng thái</th>
                        <th>Admin trả lời</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($binhluan as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->noidung}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->trangthai?'Đã duyệt':'Chưa duyệt'}}</td>
                            <td>{{$item->adminreply?'Đã trả lời':'Chưa trả lời'}}</td>
                            <td class="d-flex">
                                <form action="{{route('binh-luan.edit',$item->id)}}" method="get" class="pr-1">
                                    <button class="btn btn-md btn-primary rounded-5">
                                        Trả lời
                                    </button>
                                </form>
                                @if($item->trangthai==0)
                                    <form action="{{url('binh-luan/duyet/'.$item->id)}}" method="get" class="pr-1">
                                        <input type="text" name="id_admin" hidden value="{{isset($id_admin)?$id_admin:''}}">
                                        <button class="btn btn-md btn-outline-primary rounded-5">
                                            Duyệt
                                        </button>
                                    </form>
                                @else
                                    <form action="{{url('binh-luan/duyet/'.$item->id)}}" method="get" class="pr-1">
                                        <input type="text" name="id_admin" hidden value="{{isset($id_admin)?$id_admin:''}}">
                                        <button class="btn btn-md btn-outline-danger rounded-5 mr-1">
                                            Ẩn
                                        </button>
                                    </form>
                                @endif
                                <form action="{{route('nguoi-dung.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-md btn-danger rounded-5">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Trạng thái</th>
                        <th>Admin trả lời</th>
                        <th>Hành động</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <script>

            $(document).ready(function() {
                // Setup - add a text input to each footer cell


                $('#example tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                } );

                // DataTable
                var table = $('#example1').DataTable({
                    initComplete: function () {
                        // Apply the search
                        this.api().columns().every( function () {
                            var that = this;

                            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                if ( that.search() !== this.value ) {
                                    that
                                        .search( this.value )
                                        .draw();
                                }
                            } );
                        } );
                    }
                });

            } );
        </script>
@endsection

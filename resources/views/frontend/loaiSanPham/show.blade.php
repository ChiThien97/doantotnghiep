@extends('frontend.layout.header-footer')
@section('content')
    <!--PRODUCT-->
    <div class="row mb-0">
        <div class="col-md-12 col-sm-12 col-xs-12 border-radius">
            <div class="d-flex justify-content-between align-items-center bg-white shadow-sm p-3 border-radius">
                <h3 class="product-title text-primary text-capitalize m-0">{{$loaisp->tenloai}}</h3>
                <span class="sort-block dropdown">
                    <?php $sort = isset($_GET['sort'])?$_GET['sort']:'';?>
                    <span class="h5">Sắp xếp theo:&nbsp;</span>
                    <a id="sortDropDown" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            if($sort==''):
                                echo'<span class="btn border-radius btn-primary btn-md">Nổi bật <i class="fas fa-star"></i></span>';
                            elseif($sort=='price-desc'):
                                echo'<span class="btn border-radius btn-primary btn-md">Giá giảm dần <i class="fas fa-chevron-circle-down"></i></span>';
                            elseif($sort=='price-asc'):
                                echo'<span class="btn border-radius btn-primary btn-md">Giá tăng dần <i class="fas fa-chevron-circle-up"></i></span>';
                            elseif($sort=='lastest'):
                                echo'<span class="btn border-radius btn-primary btn-md">Mới nhất <i class="far fa-calendar-alt"></i></span>';
                            endif;
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropDown">
                        <a class="dropdown-item btn border-radius btn-primary btn-md
                        <?php if($sort=='')echo 'disabled" aria-disabled="true'; ?>"
                           href="{{url('/loai-san-pham/'.$loaisp->slug)}}">
                            Nổi bật <i class="fas fa-star"></i>
                        </a>
                        <a class="dropdown-item btn border-radius btn-primary btn-md
                        <?php if($sort=='lastest')echo 'disabled" aria-disabled="true'; ?>"
                           href="{{url('/loai-san-pham/'.$loaisp->slug.'/?sort=lastest')}}">
                            Mới nhất <i class="far fa-calendar-alt"></i>
                        </a>
                        <a class="dropdown-item btn border-radius btn-primary btn-md
                        <?php if($sort=='price-desc')echo 'disabled" aria-disabled="true'; ?>"
                           href="{{url('/loai-san-pham/'.$loaisp->slug.'/?sort=price-desc')}}">
                            Giá giảm dần <i class="fas fa-arrow-circle-down"></i>
                        </a>
                        <a class="dropdown-item btn border-radius btn-primary btn-md
                        <?php if($sort=='price-asc')echo 'disabled" aria-disabled="true'; ?>"
                           href="{{url('/loai-san-pham/'.$loaisp->slug.'/?sort=price-asc')}}">
                            Giá tăng dần <i class="fas fa-arrow-circle-up"></i>
                        </a>
                    </div>
               </span>
            </div>
            <div class="row mt-3">
                @foreach($sp as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 pb-3">
                        <div class="card border-0 mb-0 h-100 shadow-sm">
                            <a class="h-100 d-flex flex-column align-content-between" href="{{url('san-pham/'.$item->slug)}}">
                                <span>
                                    <img class="card-img-top" src="{{asset("images/".$item->hinhanh)}}" alt="{{$item->tensanpham}}">
                                    <h5 class="p-2 card-title text-dark">{{$item->tensanpham}}</h5>
                                </span>
                                <div class="card-body p-2 d-flex flex-column justify-content-end">
                                    <h6 class="graduate"><i class="fas fa-shield-alt"></i>&nbsp;{{$item->baohanh}} THÁNG</h6>
                                    @if($item->soluongton<=0)
                                        <h5 class="text-danger">Tạm hết hàng</h5>
                                    @elseif($item->giakhuyenmai>0)
                                        <div class="d-flex">
                                            <h5 class="text-danger mr-1">{{number_format($item->giakhuyenmai)}} đ</h5>
                                            <h5 class="text-secondary "><del>{{number_format($item->gia)}} đ</del></h5>
                                            <h6 class="home onsale ">-{{round((($item->gia-$item->giakhuyenmai)/$item->gia)*100)}}%</h6>
                                        </div>
                                    @elseif($item->gia==0)
                                        <h5 class="text-danger">Giá Liên Hệ</h5>
                                    @else
                                        <h5 class="text-danger">{{number_format($item->gia)}} đ</h5>
                                    @endif

                                    @if($loaisp->slug=='laptop')
                                    <div class="alert alert-info p-1" style="font-size: 12px">
                                        <span class="alert-link">Tặng kèm:</span>
                                        <span>Window 11 Pro, phần mềm diệt viruss miễn phí</span>
                                    </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $sp->links('frontend.layout.pagination') }}
@endsection

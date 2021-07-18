<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\loaiSanPham;
use App\Models\nhaSanXuat;
use App\Models\nhaCungCap;
use App\Models\sanPham;
use App\Models\chiTietDonDatHang;
use App\Models\donDatHang;
use App\Models\phieuBaoHanh;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        $loaisp = loaiSanPham::all();
//        $nhasx = nhaSanXuat::all();
//        $nhacc = nhaCungCap::all();
//        $sanpham = sanPham::all();
//        $donhang = donDatHang::all();
//        $ctdh = chiTietDonDatHang::all();
//        $pbh = phieuBaoHanh::all();
//
//
//        View::share('loaisp', $loaisp);
//        View::share('nhasx', $nhasx);
//        View::share('nhacc', $nhacc);
//        View::share('sanpham', $sanpham);
//        View::share('donhang', $donhang);
//        View::share('ctdh', $ctdh);
//        View::share('pbh', $pbh);
    }
}

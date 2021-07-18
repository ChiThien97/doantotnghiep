<?php

namespace App\Http\Controllers;

use App\Models\sanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\chiTietDonDatHang;
use App\Models\donDatHang;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $donhang = donDatHang::all();
        return view('admin.donHang.list')->with('donhang',$donhang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $donhang = donDatHang::findOrFail($id);

        if($donhang->trangthai == "Chờ Xử Lý"):
            $donhang->trangthai = "Đang Xử Lý";
            $donhang->save();
        endif;

        $ctdhs = DB::table('chi_tiet_don_dat_hangs')
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_dat_hangs.id_sanpham')
            ->select('chi_tiet_don_dat_hangs.*','san_phams.*')
            ->where('id_donhang', $donhang->madonhang)->get();


        $result = json_decode($ctdhs, true);
        //echo "<pre>"; print_r($result); exit();

        return view('admin.donHang.edit')
            ->with('donhang',$donhang)
            ->with('ctdhs',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $donhang = donDatHang::findOrFail($id);

        switch ($request->trangthai) {
            case "Đã Hoàn Thành":
                if($request->thanhtoan != 1):
                    return back()
                        ->with('errors','Đơn chưa thanh toán');
                endif;

                $soluong = DB::table('chi_tiet_don_dat_hangs')
                    ->where('id_donhang', $donhang->madonhang)->sum('soluong');
                $ctdhs = DB::table('chi_tiet_don_dat_hangs')
                    ->join('phieu_bao_hanhs', 'phieu_bao_hanhs.id_chitietdonhang', '=', 'chi_tiet_don_dat_hangs.id')
                    ->select('phieu_bao_hanhs.*')
                    ->where('id_donhang', $donhang->madonhang)->count();
                if($ctdhs<$soluong):
                    return back()
                        ->with('errors','Có sản phẩm chưa lập phiếu bảo hành');
                endif;
                break;


            case "Đã Hủy":
                $ctdhs = DB::table('chi_tiet_don_dat_hangs')
                    ->join('phieu_bao_hanhs', 'phieu_bao_hanhs.id_chitietdonhang', '=', 'chi_tiet_don_dat_hangs.id')
                    ->select('phieu_bao_hanhs.*')
                    ->where('id_donhang', $donhang->madonhang)->count();

                if($ctdhs>0):
                    return back()
                        ->with('errors','Đơn không thể hủy do đã lập phiếu bảo hành');
                endif;
                $sanphams = DB::table('chi_tiet_don_dat_hangs')
                   ->where('id_donhang', $donhang->madonhang)->get();

                $result = json_decode($sanphams, true);

                if($result!=''):

                    foreach ($result as $item):
                        $sp = sanPham::findOrFail($item['id_sanpham']);
                        $sp->soluongton = $sp->soluongton + $item['soluong'];
                        $sp->save();
                    endforeach;
                endif;
                break;

            default:
                break;
        }

        $donhang->trangthai = $request->trangthai;
        $donhang->trangthai_thanhtoan = $request->thanhtoan;

        $donhang->tenkhachhang = $request->tenkhachhang?$request->tenkhachhang:$donhang->tenkhachhang;
        $donhang->sodienthoai = $request->sodienthoai?$request->sodienthoai:$donhang->sodienthoai;
        $donhang->email = $request->email?$request->email:$donhang->email;
        $donhang->diachi = $request->diachi?$request->diachi:$donhang->diachi;

        $donhang->save();
        return back()
            ->with('success','Đã lưu xuống cơ sở dữ liệu');
    }

    //
    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveOrderDetail(Request $request)
    {
        $donhang = new donDatHang();
        $donhang->madonhang = "DH".strtoupper(uniqid());
        $donhang->tenkhachhang = $request->tenkhachhang;
        $donhang->sodienthoai = $request->sodienthoai;
        $donhang->email = $request->email;
        $donhang->diachi = $request->diachi;
        $donhang->ghichu = $request->ghichu?$request->ghichu:"";
        $tongtien = 0;
        $cart = session()->get('cart');
        foreach ($cart as $id => $item):
            $ctdh = new chiTietDonDatHang();
            $ctdh->id_donhang = $donhang->madonhang;
            $ctdh->id_sanpham = $id;
            //Trừ dồn số lượng sp
            $sanpham= sanPham::findOrFail($id);
            if($sanpham->soluongton >=  $item['quantity']):
                $sanpham->soluongton = $sanpham->soluongton - $item['quantity'];
                $sanpham->save();
            else:
                return redirect('gio-hang')->with('errors', 'Tồn kho không đủ số lượng!');
            endif;
            //
            $ctdh->soluong = $item['quantity'];
            $ctdh->gia = $item['quantity']*$item['price'];
            $tongtien += $ctdh->gia;
            $ctdh->save();
        endforeach;
        $donhang->tongtien = $tongtien;
        $donhang->save();

        $request->session()->forget('cart');

        $details =[
            'madonhang'=> $donhang->madonhang,
            'tenkhachhang' => $donhang->tenkhachhang,
            'diachi' =>$donhang->diachi,
            'sodienthoai' =>$donhang->sodienthoai,
            'email' => $donhang->email,
            'ghichu' => $donhang->ghichu,
        ];

        Mail::to($donhang->email)->send(new SendMail($details));

        $ctdhs = DB::table('chi_tiet_don_dat_hangs')
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_dat_hangs.id_sanpham')
            ->select('chi_tiet_don_dat_hangs.*','san_phams.hinhanh','san_phams.tensanpham','san_phams.baohanh')
            ->where('chi_tiet_don_dat_hangs.id_donhang', $donhang->madonhang)->get();
        $result = json_decode($ctdhs, true);

        return view('frontend.checkout.success')
            ->with('donhang',$donhang)
            ->with('ctdh',$result);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choxuly()
    {
        //
        $donhang =   DB::table('don_dat_hangs')
            ->where('trangthai','=','Chờ Xử Lý')->get();

        return view('admin.donHang.choxuly')
            ->with('donhang',$donhang);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dangxuly()
    {
        //
        $donhang =   DB::table('don_dat_hangs')
            ->where('trangthai','=','Đang Xử Lý')->get();

        return view('admin.donHang.dangxuly')
            ->with('donhang',$donhang);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dahoanthanh()
    {
        //
        $donhang =   DB::table('don_dat_hangs')
            ->where('trangthai','=','Đã Hoàn Thành')->get();

        return view('admin.donHang.dahoanthanh')
            ->with('donhang',$donhang);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dahuy()
    {
        //
        $donhang =   DB::table('don_dat_hangs')
            ->where('trangthai','=','Đã Hủy')->get();

        return view('admin.donHang.dahuy')
            ->with('donhang',$donhang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function xuatHoaDon($id)
    {
        //
        $donhang = DB::table('don_dat_hangs')
            ->where('madonhang','=',$id)->first();

        if($donhang->trangthai == "Chờ Xử Lý"):
            $donhang->trangthai = "Đang Xử Lý";
            $donhang->save();
        endif;

        $ctdhs = DB::table('chi_tiet_don_dat_hangs')
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_dat_hangs.id_sanpham')
            ->select('chi_tiet_don_dat_hangs.*','san_phams.*')
            ->where('id_donhang', $donhang->madonhang)->get();


        $result = json_decode($ctdhs, true);
        //echo "<pre>"; print_r($result); exit();

        return view('admin.donHang.hoadon')
            ->with('donhang',$donhang)
            ->with('ctdhs',$result);
    }

    /**
     * Remove the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function traCuuDonHang()
    {
        return view('frontend.checkout.checkorder');
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function traCuuDonHangSuccess(Request $request)
    {
        $sodienthoai = $request->sodienthoai;
        $email = $request->email;

        $cook = $sodienthoai;
        $valid = Cookie::get($cook)?Cookie::get($cook):'0';
        if(Cookie::get($cook)<3 || $valid == '0'):
            Cookie::queue($cook, $valid, 60*24);
            $valid+=1;

            $donhang = donDatHang::where('sodienthoai',$sodienthoai)
                ->where('email', $email)
                ->firstOrFail();

            $ctdhs = DB::table('chi_tiet_don_dat_hangs')
                ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_dat_hangs.id_sanpham')
                ->select('chi_tiet_don_dat_hangs.*','san_phams.hinhanh','san_phams.tensanpham','san_phams.baohanh')
                ->where('chi_tiet_don_dat_hangs.id_donhang', $donhang->madonhang)->get();
            $result = json_decode($ctdhs, true);


            return view('frontend.checkout.checkordersuccess')
                ->with('donhang',$donhang)
                ->with('ctdhs',$result);
        endif;
        return view('frontend.homepage.home');
    }

}

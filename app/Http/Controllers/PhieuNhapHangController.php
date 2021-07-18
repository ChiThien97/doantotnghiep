<?php

namespace App\Http\Controllers;

use App\Models\chiTietPhieuNhapHang;
use App\Models\phieuNhapHang;
use App\Models\sanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuNhapHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pnh = phieuNhapHang::all();
        return view('admin.nhapHang.list')->with('pnh',$pnh);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nhapHang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $phieunhap = new phieuNhapHang();
        $phieunhap->maphieunhap = "PN".strtoupper(uniqid());
        $phieunhap->id_nhacungcap = $request->id_nhacungcap;
        $tongtien = 0;


        $pnh = session()->get('pnh');

//        echo "<pre>"; print_r($pnh);
//        echo "-----------------------------------------<br>";
//        print_r($request->all());
//        exit();
        $phieunhap->tongtien = $tongtien;
        $phieunhap->save();
        foreach ($pnh as $id => $item):
            $ctpn = new chiTietPhieuNhapHang();
            $ctpn->id_phieunhaphang = $phieunhap->maphieunhap;
            $ctpn->id_sanpham = $id;
            //Cộng dồn số lượng sp
            $sanpham= sanPham::findOrFail($id);
            $sanpham->soluongton += $item['quantity'];
            $sanpham->save();
            //
            $ctpn->soluong = $item['quantity'];
            $ctpn->gianhap = $item['price'];
            $tongtien += $item['quantity']*$item['price'];
            $ctpn->save();
        endforeach;
        $phieunhap->tongtien = $tongtien;
        $phieunhap->save();

        $request->session()->flush();
        return back()->with('success', 'Lưu phiếu nhập thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pnh = phieuNhapHang::findOrFail($id);
        $ctpn = DB::table('chi_tiet_phieu_nhap_hangs')
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_phieu_nhap_hangs.id_sanpham')
            ->select('chi_tiet_phieu_nhap_hangs.*','san_phams.hinhanh','san_phams.tensanpham','san_phams.baohanh')
            ->where('id_phieunhaphang','=',$pnh->maphieunhap)->get();

        $result = json_decode($ctpn, true);

        return view('admin.nhapHang.show')
            ->with('pnh',$pnh)
            ->with('result',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $phieunhap = phieuNhapHang::findOrFail($id);

        $ctpn = DB::table('chi_tiet_phieu_nhap_hangs')
            ->where('id_phieunhaphang','=',$phieunhap->maphieunhap)->get();
        foreach ($ctpn as $item){
            //Cộng dồn số lượng sp

            //echo "<pre>"; print_r($item);

            $sanpham= sanPham::findOrFail($item->id_sanpham);
            $sanpham->soluongton = $sanpham->soluongton - $item->soluong;
            $sanpham->save();
            //
        }
        //exit();
        $phieunhap->delete();
        return back()->with('success','Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function themVaoPhieu($id)
    {
        $sanpham= sanPham::findOrFail($id);

        if(!$sanpham) {
            return back()->with('errors', 'Lỗi thêm sản phẩm vào phiếu!');
        }
        $pnh = session()->get('pnh');

        // if pnh is empty then this the first product
        if(!$pnh) {

            $pnh = [
                $id => [
                    "name" => $sanpham->tensanpham,
                    "quantity" => 1,
                    "price" => 0,
                    "total" => 0,
                    "photo" => $sanpham->hinhanh
                ]
            ];

            session()->put('pnh', $pnh);

            return back()->with('success', 'Thêm sản phẩm vào phiếu nhập thành công!');
        }

        // if pnh not empty then check if this product exist then increment quantity
        if(isset($pnh[$id])) {

            $pnh[$id]['quantity']++;

            session()->put('pnh', $pnh);

            return back()->with('success', 'Cập nhật sản phẩm trong phiếu thành công!');

        }

        // if item not exist in pnh then add to pnh with quantity = 1
        $pnh[$id] = [
            "name" => $sanpham->tensanpham,
            "quantity" => 1,
            "price" => 0,
            "total" => 0,
            "photo" => $sanpham->hinhanh
        ];

        session()->put('pnh', $pnh);

        return back()->with('success', 'Thêm sản phẩm vào phiếu nhập thành công!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePnh(Request $request)
    {
        if($request->id && $request->quantity)
        {
            $pnh = session()->get('pnh');
            $pnh[$request->id]["quantity"] = $request->quantity;
            $pnh[$request->id]["price"] = $request->price;
            $pnh[$request->id]["total"] = $request->price*$request->quantity;
            session()->put('pnh', $pnh);
            session()->flash('success', 'Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removePnh(Request $request)
    {
        if($request->id) {
            $pnh = session()->get('pnh');
            if(isset($pnh[$request->id])) {
                unset($pnh[$request->id]);
                session()->put('pnh', $pnh);
            }
            session()->flash('success', 'Đã xóa sản phẩm');
        }
    }

}

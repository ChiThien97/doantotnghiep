<?php

namespace App\Http\Controllers;

use App\Models\sanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sanpham = sanPham::all();
        return view('admin.sanPham.list')->with('sanpham',$sanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sanPham.create');
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
        $request->validate([
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gia' => 'min:0',
            'giakhuyenmai' => 'min:0'
        ]);

        $imageName = $request->hinhanh->getClientOriginalName();
        $request->hinhanh->move(public_path('images'), $imageName);
        //
        $sanpham = new sanPham();
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->slug = $request->slug;
        $sanpham->gia = ($request->gia)?$request->gia:'0';
        $sanpham->giakhuyenmai = ($request->giakhuyenmai)?$request->giakhuyenmai:'0';
        $sanpham->mota = $request->mota;
        $sanpham->thongso = $request->thongso;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->trangthai = ($request->trangthai='on')?true:false;
        $sanpham->hinhanh = $imageName;
        $sanpham->id_nhasanxuat = $request->id_nhasanxuat;
        $sanpham->id_loaisanpham = $request->id_loaisanpham;
        $sanpham->save();
        return back()
            ->with('success','Thêm dịch vụ thành công')
            ->with('image',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $sanpham = sanPham::whereSlug($slug)->firstOrFail();

        $binhluan = DB::table('binh_luans')
            ->join('users','users.id','=','binh_luans.id_admin')
            ->select('users.*','binh_luans.*')
            ->where([
                ['binh_luans.id_sanpham', $sanpham->id],
                ['binh_luans.trangthai', 1]
            ])->get();

        $result = json_decode($binhluan, true);

        $sanpham_cungloai = DB::table('san_phams')->where('id_loaisanpham', $sanpham->id_loaisanpham)->inRandomOrder()->limit(4)->get();
        $result_sp = json_decode($sanpham_cungloai, true);

        //Đếm lượt xem
        $cook = $sanpham->slug;
        if(Cookie::get($cook)!='1'):
            Cookie::queue($cook, '1', 60);
            $sanpham->luotxem++;
            $sanpham->save();
        endif;

        return view('frontend.sanPham.show')
            ->with('sanpham',$sanpham)
            ->with('binhluan',$result)
            ->with('sanpham_cungloai',$result_sp);
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
        $sanpham = sanPham::findOrFail($id);
        return view('admin.sanPham.edit')
            ->with('sanpham',$sanpham);
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
        $sanpham= sanPham::findOrFail($id);
        $imageName = ($request->hinhanh)?$request->hinhanh->getClientOriginalName():false;

        if($imageName){
            $sanpham->hinhanh = $imageName;
            $request->validate([
                'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->hinhanh->move(public_path('images'), $imageName);
        }
        $request->validate([
            'gia' => 'min:0',
            'giakhuyenmai' => 'min:0'
        ]);

        //
        $sanpham->tensanpham = $request->tensanpham;
        $sanpham->slug = $request->slug;
        $sanpham->gia = ($request->gia)?$request->gia:'0';
        $sanpham->giakhuyenmai = ($request->giakhuyenmai)?$request->giakhuyenmai:'0';
        $sanpham->mota = $request->mota;
        $sanpham->thongso = $request->thongso;
        $sanpham->baohanh = $request->baohanh;
        $sanpham->trangthai = ($request->trangthai='on')?true:false;
        $sanpham->id_nhasanxuat = $request->id_nhasanxuat;
        $sanpham->id_loaisanpham = $request->id_loaisanpham;
        $sanpham->save();
        return back()
            ->with('success','Sửa thành công')
            ->with('image',($imageName)?$imageName:'Không có thay đổi hình ảnh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sanpham= sanPham::findOrFail($id);
        $sanpham->delete();
        return redirect('san-pham')->with('success','Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $sanpham= sanPham::findOrFail($id);

        if(!$sanpham) {

            abort(404);

        }

        $cart = session()->get('cart');

        //echo "<pre>"; print_r($cart); exit();

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $sanpham->tensanpham,
                    "quantity" => 1,
                    "price" => $sanpham->gia,
                    "photo" => $sanpham->hinhanh
                ]
            ];

            session()->put('cart', $cart);

            return redirect('gio-hang')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            if($sanpham->soluongton>$cart[$id]['quantity']):
                $cart[$id]['quantity']++;

                session()->put('cart', $cart);

                return redirect('gio-hang')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
            else:
                return redirect('gio-hang')->with('errors', 'Tồn kho không đủ số lượng!');
            endif;
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $sanpham->tensanpham,
            "quantity" => 1,
            "price" => $sanpham->gia,
            "photo" => $sanpham->hinhanh
        ];

        session()->put('cart', $cart);

        return redirect('gio-hang')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity)
        {
            $cart = session()->get('cart');
            $sanpham = sanPham::findOrFail($request->id);

            if($sanpham->soluongton>=$request->quantity):
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            else:
                session()->flash('errors', 'Tồn kho không đủ số lượng');
            endif;

        }
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}

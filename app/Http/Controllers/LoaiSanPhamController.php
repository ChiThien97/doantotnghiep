<?php

namespace App\Http\Controllers;

use App\Models\loaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loaisp = loaiSanPham::all();
        return view('admin.loaiSanPham.list')->with('loaisp',$loaisp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.loaiSanPham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        //
//        $request->validate([
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

//        $imageName = $request->image->getClientOriginalName();
//        $request->image->move(public_path('images'), $imageName);
        //
        $loaisp = new loaiSanPham;
        $loaisp->tenloai = $request->tenloai;
        $loaisp->slug = $request->slug;
        $loaisp->mota = $request->mota;
        $loaisp->id_parent = $request->id_parent;
        //$loaisp->image = $imageName;
        $loaisp->save();
        return back()
            ->with('success','Thêm loại sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loaiSanPham  $loaiSanPham
     * @param  int $id
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $sort = isset($_GET['sort'])?$_GET['sort']:'';

        $loaisp  = DB::table('loai_san_phams')->where('slug', $slug)->first();

        if($loaisp->id_parent!=0):
            $sp = DB::table('san_phams')
                ->select('san_phams.*')
                ->where('id_loaisanpham','=',$loaisp->id)
                ->orderByDesc('luotxem')
                ->paginate(12);
        else:
            $sp = DB::table('san_phams')
                ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                ->select('san_phams.*')
                ->where('loai_san_phams.id_parent','=',$loaisp->id)
                ->orWhere('loai_san_phams.id','=',$loaisp->id)
                ->orderByDesc('luotxem')
                ->paginate(12);
        endif;

        if(isset($sort) && $sort=='price-desc'){
            if($loaisp->id_parent!=0):
                $sp = DB::table('san_phams')
                    ->select('san_phams.*')
                    ->where('id_loaisanpham','=',$loaisp->id)
                    ->orderByDesc('gia')
                    ->paginate(12);
            else:
                $sp = DB::table('san_phams')
                    ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                    ->select('san_phams.*')
                    ->where('loai_san_phams.id_parent','=',$loaisp->id)
                    ->orWhere('loai_san_phams.id','=',$loaisp->id)
                    ->orderByDesc('gia')
                    ->paginate(12);
            endif;
        }elseif(isset($sort) && $sort=='price-asc'){
            if($loaisp->id_parent!=0):
                $sp = DB::table('san_phams')
                    ->select('san_phams.*')
                    ->where('id_loaisanpham','=',$loaisp->id)
                    ->orderBy('gia','asc')
                    ->paginate(12);
            else:
                $sp = DB::table('san_phams')
                    ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                    ->select('san_phams.*')
                    ->where('loai_san_phams.id_parent','=',$loaisp->id)
                    ->orWhere('loai_san_phams.id','=',$loaisp->id)
                    ->orderBy('gia','asc')
                    ->paginate(12);
            endif;
        }elseif(isset($sort) && $sort=='lasted'){
            if($loaisp->id_parent!=0):
                $sp = DB::table('san_phams')
                    ->select('san_phams.*')
                    ->where('id_loaisanpham','=',$loaisp->id)
                    ->orderByDesc('created')
                    ->paginate(12);
            else:
                $sp = DB::table('san_phams')
                    ->join('loai_san_phams','san_phams.id_loaisanpham','=','loai_san_phams.id')
                    ->select('san_phams.*')
                    ->where('loai_san_phams.id_parent','=',$loaisp->id)
                    ->orWhere('loai_san_phams.id','=',$loaisp->id)
                    ->orderByDesc('created')
                    ->paginate(12);
            endif;
        }else{
            return view('frontend.loaiSanPham.show')
                ->with('sp', $sp)
                ->with('loaisp',$loaisp);
        }


        return view('frontend.loaiSanPham.show')
            ->with('sp', $sp)
            ->with('loaisp',$loaisp);
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
        $loaisp= loaiSanPham::findOrFail($id);
        $loaisps = loaiSanPham::all();
        return view('admin.loaiSanPham.edit')
            ->with('loaisp',$loaisp)
            ->with('loaisps',$loaisps);
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
        $loaisp= loaiSanPham::findOrFail($id);
        $loaisp->tenloai = $request->tenloai;
        $loaisp->slug = $request->slug;
        $loaisp->mota = $request->mota;
        $loaisp->id_parent = $request->id_parent;
        $loaisp->save();
        return back()
            ->with('success','Sửa thành công');
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
        $loaisp= loaiSanPham::findOrFail($id);
        $id_loaisp = DB::table('san_phams')->where('id_loaisanpham', $id)->first();
        if($id_loaisp){
            return back()->with('fail','Xóa loại sản phẩm thất bại');
        }
        else{
            $loaisp->delete();
            return redirect('loai-san-pham')->with('success','Xóa thành công');
        }
    }
}

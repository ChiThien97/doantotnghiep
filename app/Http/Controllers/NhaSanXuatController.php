<?php

namespace App\Http\Controllers;

use App\Models\nhaSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhaSanXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhasx = nhaSanXuat::all();
        return view('admin.nhaSanXuat.list')->with('nhasx',$nhasx);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nhaSanXuat.create');
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
        $nhasx = new nhaSanXuat();
        $nhasx->tennhasanxuat = $request->tennhasanxuat;
        $nhasx->slug = $request->slug;
        $nhasx->mota = $request->mota;
        $nhasx->save();
        return back()
            ->with('success','Thêm nhà sản xuất thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhaSanXuat  $nhaSanXuat
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        //
        $sort = isset($_GET['sort'])?$_GET['sort']:'';
        $nhasx  = DB::table('nha_san_xuats')->where('slug', $slug)->first();
        $sp = DB::table('san_phams')
            ->select('san_phams.*')
            ->orderByDesc('luotxem')
            ->where('id_nhasanxuat','=',$nhasx->id)->paginate(12);

        if(isset($sort) && $sort=='price-desc'){
            $sp = DB::table('san_phams')
                ->select('san_phams.*')
                ->orderByDesc('gia')
                ->where('id_nhasanxuat','=',$nhasx->id)->paginate(12);
        }elseif(isset($sort) && $sort=='price-asc'){
            $sp = DB::table('san_phams')
                ->select('san_phams.*')
                ->orderBy('gia','asc')
                ->where('id_nhasanxuat','=',$nhasx->id)->paginate(12);
        }elseif(isset($sort) && $sort=='lasted'){
            $sp = DB::table('san_phams')
                ->select('san_phams.*')
                ->orderByDesc('created')
                ->where('id_nhasanxuat','=',$nhasx->id)->paginate(12);
        }else{
            return view('frontend.nhaSanXuat.show')
                ->with('sp', $sp)
                ->with('nhasx',$nhasx);
        }

        return view('frontend.nhaSanXuat.show')
            ->with('sp', $sp)
            ->with('nhasx',$nhasx);
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
        $nhasx= nhaSanXuat::findOrFail($id);
        return view('admin.nhaSanXuat.edit')
            ->with('nhasx',$nhasx);
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
        $nhasx= nhaSanXuat::findOrFail($id);
        $nhasx->tennhasanxuat = $request->tennhasanxuat;
        $nhasx->slug = $request->slug;
        $nhasx->mota = $request->mota;
        $nhasx->save();
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
        $nhasx= nhaSanXuat::findOrFail($id);
        $id_nhasx = DB::table('san_phams')->where('id_nhasanxuat', $id)->first();
        if($id_nhasx){
            return back()->with('fail','Xóa nhà sản xuất thất bại');
        }
        else{
            $nhasx->delete();
            return redirect('nha-san-xuat')->with('success','Xóa thành công');
        }
    }
}

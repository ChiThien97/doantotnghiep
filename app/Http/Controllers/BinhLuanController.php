<?php

namespace App\Http\Controllers;
use App\Models\binhLuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $binhluan = binhLuan::all();
        return view('admin.binhLuan.list')->with('binhluan',$binhluan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $binhluan = new binhLuan();
        $binhluan->username = $request->username;
        $binhluan->email = $request->email;
        $binhluan->noidung = $request->noidung;
        $binhluan->id_sanpham = $request->id_sanpham;
        $binhluan->adminreply = '';

        $binhluan->save();
        return back()
            ->with('success','Xin cám ơn! Bạn đã bình luận thành công, vui lòng đợi quản trị viên duyệt!');
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
        $binhluan = binhLuan::findOrFail($id);
        $sanpham = DB::table('san_phams')->where('id','=',$binhluan->id_sanpham)->first();

        if($binhluan->trangthai==0):
            return back()->with('errors','Bình luận chưa được duyệt');
        else:
            return view('admin.binhLuan.reply')
                ->with('binhluan',$binhluan)
                ->with('sanpham',$sanpham);
        endif;
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
        $binhluan = binhLuan::findOrFail($id);
        $binhluan->adminreply = $request->adminreply;
        $binhluan->id_admin = $request->id_admin;
        $binhluan->save();
        return back()->with('success','Cập nhật thành công');
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
        $binhluan = binhLuan::findOrFail($id);
        $binhluan->delete();
        return back()->with('success','Xóa bình luận thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duyetBL(Request $request, $id)
    {
        //
        $binhluan = binhLuan::findOrFail($id);
        if($binhluan->trangthai==0):
            $binhluan->trangthai =1;
        elseif ($binhluan->trangthai==1):
            $binhluan->trangthai =0;
        endif;
        $binhluan->id_admin = $request->id_admin;
        $binhluan->save();
        return back()->with('success','Cập nhật thành công');
    }

}

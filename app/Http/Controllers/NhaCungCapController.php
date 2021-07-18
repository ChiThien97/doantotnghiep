<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nhaCungCap;
use Illuminate\Support\Facades\DB;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nhacc = nhaCungCap::all();
        return view('admin.nhaCungCap.list')->with('nhacc',$nhacc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nhaCungCap.create');
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
        $nhacc = new nhaCungCap();
        $nhacc->tennhacungcap = $request->tennhacungcap;
        $nhacc->diachi = $request->diachi;
        $nhacc->email = $request->email;
        $nhacc->sodienthoai = $request->sodienthoai;
        $nhacc->save();
        return back()
            ->with('success','Thêm nhà cung cấp thành công');
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
        $nhacc= nhaCungCap::findOrFail($id);
        return view('admin.nhaCungCap.edit')
            ->with('nhacc',$nhacc);
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
        $nhacc= nhaCungCap::findOrFail($id);
        $nhacc->tennhacungcap = $request->tennhacungcap;
        $nhacc->diachi = $request->diachi;
        $nhacc->email = $request->email;
        $nhacc->sodienthoai = $request->sodienthoai;
        $nhacc->save();
        return back()
            ->with('success','Sửa thành công');
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
        //$nhacc= nhaCungCap::findOrFail($id);
//        $id_nhasx = DB::table('san_phams')->where('id_nhasanxuat', $id)->first();
//        if($id_nhasx){
//            return back()->with('fail','Xóa nhà sản xuất thất bại');
//        }
//        else{
//            $nhacc->delete();
//            return redirect('nha-san-xuat')->with('success','Xóa thành công');
//        }
    }
}

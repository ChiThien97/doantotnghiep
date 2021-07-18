<?php

namespace App\Http\Controllers;

use App\Models\phieuBaoHanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuBaoHanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $isExist =   DB::table('phieu_bao_hanhs')
            ->where('serial','=',$request->serial)->get();

        if($isExist):
            return back()
                ->with('errors','Đã tồn tại số serial này');
        endif;

        $pbh = new phieuBaoHanh();
        $pbh->id_chitietdonhang = $request->id_chitietdonhang;
        $pbh->id_sanpham = $request->id_sanpham;
        $pbh->serial = $request->serial;
        $pbh->save();

        return back()
            ->with('success','Lập phiếu thành công');
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
    }
}

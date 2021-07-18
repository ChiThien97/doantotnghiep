<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\sanPham;

class FullTextSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search =  $request->input('term');
        if($request->term){
            //$data['dichvus']= DB::table('dichvus')->where('MATCH(name_service)AGAINST('.$request->term.')')->get();
            $data['sanpham'] = sanPham::WhereRaw("MATCH(tensanpham) AGAINST('$request->term')")->paginate(4);
            $data['sanpham']->appends(['term' => $search]);
        }else{
            return view('frontend.full-text-search')->with('message','Không tìm thấy dịch vụ bạn muốn, vui lòng liên hệ +00 1234 567');
        }
        return view('frontend.full-text-search', $data)->with('message','Không tìm thấy dịch vụ bạn muốn, vui lòng liên hệ +00 1234 567');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\tinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tintuc = tinTuc::all();
        return view('admin.tinTuc.list')->with('tintuc',$tintuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tinTuc.create');
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
        ]);

        $imageName = $request->hinhanh->getClientOriginalName();
        $request->hinhanh->move(public_path('images'), $imageName);
        //
        $tintuc = new tinTuc();
        $tintuc->tieude = $request->tieude;
        $tintuc->slug = $request->slug;
        $tintuc->noidung = $request->noidung;
        $tintuc->trangthai = ($request->trangthai='on')?true:false;

        $tintuc->hinhanh = $imageName;
        $tintuc->tacgia = $request->tacgia;
        $tintuc->save();
        return back()
            ->with('success','Thêm tin tức thành công')
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
        $tintuc = tinTuc::whereSlug($slug)->firstOrFail();

        $tintucs = tinTuc::orderBy('created_at','desc')->take(6)->get();

        $tinhot = tinTuc::orderBy('luotxem','desc')->take(5)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();

        $sanpham = DB::table('san_phams')
            ->where('soluongton','>',0)
            ->inRandomOrder()->limit(7)->get();
        $result_sp = json_decode($sanpham, true);

        //Đếm lượt xem
        $cook = $tintuc->slug;
        if(Cookie::get($cook)!='1'):
            Cookie::queue($cook, '1', 60);
            $tintuc->luotxem++;
            $tintuc->save();
        endif;

        return view('frontend.tinTuc.show')
            ->with('tintuc',$tintuc)
            ->with('tintucs',$tintucs)
            ->with('tinhot',$tinhot)
            ->with('sanpham',$result_sp);
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
        $tintuc = tinTuc::findOrFail($id);
        return view('admin.tinTuc.edit')
            ->with('tintuc',$tintuc);
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
        $tintuc= tinTuc::findOrFail($id);
        $imageName = ($request->hinhanh)?$request->hinhanh->getClientOriginalName():false;

        if($imageName){
            $tintuc->hinhanh = $imageName;
            $request->validate([
                'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->hinhanh->move(public_path('images'), $imageName);
        }
        //
        $tintuc->tieude = $request->tieude;
        $tintuc->slug = $request->slug;
        $tintuc->noidung = $request->noidung;
        $tintuc->trangthai = ($request->trangthai='on')?true:false;
        $tintuc->tacgia = $request->tacgia;
        $tintuc->save();
        return back()
            ->with('success','Sửa thành công')
            ->with('image',($imageName)?$imageName:'Không có thay đổi hình ảnh');
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
        $tintuc= tinTuc::findOrFail($id);
        $tintuc->delete();
        return redirect('tin-tuc')->with('success','Xóa thành công');
    }


    public function indexFrontend(Request $request)
    {
        //
        $tintuc = tinTuc::orderByDesc('created_at')->firstOrFail();
        $tinhot = tinTuc::orderBy('luotxem','desc')->take(5)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();
        $sanpham = DB::table('san_phams')
            ->where('soluongton','>',0)
            ->inRandomOrder()->limit(7)->get();
        $result_sp = json_decode($sanpham, true);


        $url = url('/');
        $artilces = '';
        $results = tinTuc::orderBy('created_at','desc')->paginate(3);
        if ($request->ajax()) {
            foreach ($results as $result) {
                if($result->id !=  $tintuc->id):
                    $artilces.='<a href="'.$url.'/tin-tuc/'.$result->slug.'">';
                    $artilces.='<div class="row post-item"><div class="col-sm-4">';
                    $artilces.='<img class="m-auto w-100" src="../images/'.$result->hinhanh.'" alt="'.$result->tieude.'"></div>';
                    $artilces.='<div class="col-sm-8 justify-content-between flex-column d-flex post-content">';
                    $artilces.='<div><h5>'.$result->tieude.'</h5>';
                    $start = strpos($result->noidung, '<p>');
                    $end = strpos($result->noidung, '</p>', $start);
                    $paragraph = substr($result->noidung, $start, $end-$start+4);
                    $artilces.= '</div>'.$paragraph.'' ;
                    $artilces.='<p><i class="fa fa-user"></i>'.$result->tacgia.' &nbsp;-&nbsp; <i class="fa fa-clock"></i>'.date('d/m/Y',strtotime($result->created_at)).'</p></div></div></a>';
                endif;
            }
            return $artilces;
        }
        return view('frontend.tinTuc.list')
            ->with('tintuc',$tintuc)
            ->with('tinhot',$tinhot)
            ->with('sanpham',$result_sp);
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;

        $checkrole = explode(',', $role);
        if (in_array('superadmin', $checkrole)) {
            return redirect('admin');
        } else {
            return redirect('/');
        }
        return view('frontend.homepage.home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landingPage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $peran = Auth::user()->peran;
        if($peran == "admin"){
            return redirect()->intended('admin');
        } else if($peran == "pembeli"){
            return redirect()->to('user');
        } else if($peran == "jasa"){
            return redirect()->to('jasa'); 
        } else {
            return redirect()->to('logout');
        }
    
    }
    public function landingPage(){
        return view('index');
    }
}

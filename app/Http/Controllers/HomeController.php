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
        $this->middleware('auth');
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
            return redirect()->to('pembeli');
        } else if($peran == "penjual"){
            return redirect()->route('penjual.index');
        } else {
            return redirect()->to('logout');
        }
    
    }
    
}

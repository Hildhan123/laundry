<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth')->except('');
    }
    
    public function index(Request $request)
    {
        $user = Auth::user();
        
        return view('laundry.admin.admin', compact('user'));
    }

    public function profil()
    {
        return view('laundry.admin.profil');
    }

    public function daftarPenjual()
    {
        return view('laundry.admin.daftarPenjual');
    }

    public function daftarPembeli()
    {
        return view('laundry.admin.daftarPembeli');
    }

    public function riwayatOrder()
    {
        return view('laundry.admin.riwayatOrder');
    }

    public function inbox()
    {
        return view('laundry.admin.daftarPenjual');
    }
}

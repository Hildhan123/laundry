<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('laundry.admin.admin', compact('user'));
    }
    
    public function adminRegister(Request $request){
        
        User::create([
        'role' => $request->role,
        ]);
    }
}

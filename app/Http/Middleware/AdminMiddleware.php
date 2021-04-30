<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->peran != "admin" || session(['hakakses' != 'admin'])){
            /* 
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
            $request->session()->flash('pesan',"Harap login terlebih dahulu");
            return redirect()->to('login');  
        }
        else {
        return $next($request);
    }
}
}

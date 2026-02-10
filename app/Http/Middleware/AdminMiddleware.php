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
        if (!Auth::check()) 
        {
            return redirect()->route('login');
        }
        else {
        if(Auth::user()->peran == "admin")
        {
            /* 
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
           
            //$request->session()->flash('pesan', "");
        return $next($request);
        }
        else
        {
            return redirect()->route('login');
        }
    
    }
}
}

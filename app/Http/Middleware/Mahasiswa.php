<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Mahasiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->level_id == 3) {
            return $next($request);
        }elseif(Auth::check() && Auth::user()->level_id == 1){
            return $next($request);
        }elseif(Auth::check() && Auth::user()->level_id == 2){
            return $next($request);
        }

        return redirect()->route('error')->with('error', 'Akses Ditolak');
    }
}

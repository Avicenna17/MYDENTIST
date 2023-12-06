<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DokterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Memeriksa apakah pengguna memiliki peran 'admin'
        if ($request->user() && $request->user()->role=='dokter') {
            return $next($request);
        }

        // Redirect atau memberikan respon sesuai kebutuhan jika peran tidak valid
        return redirect()->route('dashboard')->with('error', 'Access denied. You do not have the required role.');
    }
}

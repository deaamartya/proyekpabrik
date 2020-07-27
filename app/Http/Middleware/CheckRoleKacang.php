<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRoleKacang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //manpro
        if (Auth::user()->id_jabatan == 3) {
            return redirect()->route('dashboard-manager-produksi');
        }

        // mandor
        if (Auth::user()->id_jabatan == 1) {
            // kacang
            if (Auth::user()->id_gudang == 9) {
                return $next($request);
            }
            // kanji
            if (Auth::user()->id_gudang == 8) {
                return redirect()->route('/gudang-bawang');
            }
        }
        
    }
}

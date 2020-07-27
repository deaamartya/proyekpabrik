<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo;

    public function redirectTo()
    {
        if (Auth::user()->id_jabatan == 3) {

            $this->redirectTo = route('dashboard-manager-produksi');
            return $this->redirectTo;

         } else if (Auth::user()->id_jabatan == 1) {

                if(Auth::user()->id_gudang == 9){

                    $this->redirectTo = route('dashboard-kacang');
                    return $this->redirectTo;

                } else if (Auth::user()->id_gudang == 8) {

                    $this->redirectTo = route('dashboard-kanji');
                return $this->redirectTo;
             }
         }
         
        // return $next($request);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
    */

    
}

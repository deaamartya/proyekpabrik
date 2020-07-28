<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pegawai;

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
        if (Auth::user()->id_jabatan == 3) {
            return redirect()->route('dashboard-manager-produksi');

         } else if (Auth::user()->id_jabatan == 1) {

                if(Auth::user()->id_gudang == 9){

                    return redirect()->route('dashboard-kacang');

                } else if (Auth::user()->id_gudang == 8) {

                    return redirect()->route('dashboard-kanji');
             }
         }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function changepass(Request $req){

        $id = Auth::user()->id_pegawai;

        $pegawai = Pegawai::find($id);
        $pegawai->password = bcrypt($req->password);
        $pegawai->save();

        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers\managerproduksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class ManagerproduksiController extends Controller
{
    
    public function dashboard()
    {
        return view('managerproduksi/dashboard/dashboard');
    }
}

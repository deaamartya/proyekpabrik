<?php

namespace App\Http\Controllers\managerproduksi;

use App\Models\Product;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManproBumbuController extends Controller
{
    
    public function home()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu');
    }

    public function stock_bahan()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockbahan');
    }

    public function detail_prive()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_detailprive');
    }

    public function stock_adonan_gula()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockadonangula');
    }

    public function stock_adonan_gula_garam()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockadonangulagaram');
    }

    public function stock_bumbu_ready()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockbumbuready');
    }

    public function kerja_harian()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_kerjaharian');
    }
}

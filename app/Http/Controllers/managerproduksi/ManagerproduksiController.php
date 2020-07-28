<?php

namespace App\Http\Controllers\managerproduksi;

use App\Models\Product;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerproduksiController extends Controller
{
    
    public function dashboard()
    {
        return view('managerproduksi/dashboard/dashboard');
    }

    public function order_masak()
    {
        return view('managerproduksi/order-masak/ordermasak');
    }

    public function gudang_tapioka_home()
    {
        return view('managerproduksi/gudang-tapioka/gudangtapioka');
    }

    public function gudang_tapioka_stock()
    {
        return view('managerproduksi/gudang-tapioka/gudangtapioka_stock');
    }

    public function gudang_tapioka_kerjaharian()
    {
        return view('managerproduksi/gudang-tapioka/gudangtapioka_kerjaharian');
    }
    
    public function gudang_bumbu_home()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu');
    }

    public function gudang_bumbu_stock_bahan()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockbahan');
    }

    public function gudang_bumbu_detail_prive()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_detailprive');
    }

    public function gudang_bumbu_stock_adonan_gula()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockadonangula');
    }

    public function gudang_bumbu_stock_adonan_gula_garam()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockadonangulagaram');
    }

    public function gudang_bumbu_stock_bumbu_ready()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_stockbumbuready');
    }

    public function gudang_bumbu_kerja_harian()
    {
        return view('managerproduksi/gudang-bumbu/gudangbumbu_kerjaharian');
    }
}

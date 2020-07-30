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
        $order_masak = OrderMasak::all();
        $stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000002')->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000002')->sum('keluar');
        $stockgula = $stock1a - $stock1b;

        $stock2a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000001')->sum('masuk');
        $stock2b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000001')->sum('keluar');
        $stockgaram = $stock2a - $stock2b;

        $stock3a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000009')->sum('masuk');
        $stock3b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000009')->sum('keluar');
        $stockbumbu = $stock3a - $stock3b;

        return view('managerproduksi/gudang-bumbu/gudangbumbu', [
            'stockgula' => $stockgula,
            'stockgaram' => $stockgaram,
            'stockbumbu' => $stockbumbu,
            'order_masak' => $order_masak,
            'order_masak_2' => $order_masak
        ]);
    }

    public function stock()
    {
        $id_gula = 'BB000000002';
        $stock_gula = DB::table('stock')->where('id_bahan_baku', $id_gula)->get();

        $id_garam = 'BB000000001';
        $stock_garam = DB::table('stock')->where('id_bahan_baku', $id_garam)->get();

        $id_bumbu = 'BB000000009';
        $stock_bumbu = DB::table('stock')->where('id_bahan_baku', $id_bumbu)->get();

        return view('managerproduksi/gudang-bumbu/gudangbumbu_stock', [
            'stock_bumbu' => $stock_bumbu,
            'stock_gula' => $stock_gula,
            'stock_garam' => $stock_garam
        ]);
    }

    public function kerja_harian()
    {
        $order_masak = OrderMasak::all();

        $stock3a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000009')->sum('masuk');
        $stock3b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000009')->sum('keluar');
        $stockbumbu = $stock3a - $stock3b;

        return view('managerproduksi/gudang-bumbu/gudangbumbu_kerjaharian', [
            'order_masak' => $order_masak,
            'order_masak_2' => $order_masak,
            'stockbumbu' => $stockbumbu
        ]);
    }
}

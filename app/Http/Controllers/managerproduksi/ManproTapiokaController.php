<?php

namespace App\Http\Controllers\managerproduksi;

use App\Models\Product;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;
use App\Models\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManproTapiokaController extends Controller
{
    
    public function home()
    {
        $id_tapioka = 'BB000000007';
        $order_masak = OrderMasak::all();
        
        $stock1a = DB::table('stock')->where('id_bahan_baku', $id_tapioka)->where('id_satuan', 1)->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', $id_tapioka)->where('id_satuan', 1)->sum('keluar');
        $stock1c = $stock1a - $stock1b;

        $stock2a = DB::table('stock')->where('id_bahan_baku', $id_tapioka)->where('id_satuan', 2)->sum('masuk');
        $stock2b = DB::table('stock')->where('id_bahan_baku', $id_tapioka)->where('id_satuan', 2)->sum('keluar');
        $stock2c = $stock2a - $stock2b; 

        return view('managerproduksi/gudang-tapioka/gudangtapioka', [
            'order_masak' => $order_masak,
            'stock_tapioka_karung' => $stock1c,
            'stock_tapioka_plastik' => $stock2c
        ]);
    }

    public function stock()
    {
        $id_tapioka = 'BB000000007';
        $order_masak = OrderMasak::all();
        $stock_tapioka_karung = DB::table('stock')->where('id_bahan_baku', $id_tapioka)
                                    ->where('id_satuan', 1)->get();
        $stock_tapioka_plastik = DB::table('stock')->where('id_bahan_baku', $id_tapioka)
                                    ->where('id_satuan', 2)->get();

        return view('managerproduksi/gudang-tapioka/gudangtapioka_stock', [
            'stock_tapioka_karung' => $stock_tapioka_karung,
            'stock_tapioka_plastik' => $stock_tapioka_plastik
        ]);
    }

    public function kerja_harian()
    {
        $order_masak = OrderMasak::all();

        return view('managerproduksi/gudang-tapioka/gudangtapioka_kerjaharian', [
            'order_masak' => $order_masak
        ]);
    }
}

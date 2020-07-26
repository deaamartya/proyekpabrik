<?php

namespace App\Http\Controllers\gudangbumbu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;
use App\Models\KerjaHarianGroup;
use App\Models\RekapKerjaHarianGroup;
use App\Models\DetailRekapKerjaHarianGroup;


class HomeController extends Controller
{
    public function index()
    {
        $ordermasak = OrderMasak::select('order_masak.*','dom.jumlah AS HC','dom1.jumlah AS SP','dom2.jumlah AS GS')
        ->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'PR00000000001');
        })
        ->join('detail_order_masak AS dom1', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom1.id_order_masak')
                 ->where('dom1.id_bahan_product', '=', 'PR00000000002');
        })
        ->join('detail_order_masak AS dom2', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom2.id_order_masak')
                 ->where('dom2.id_bahan_product', '=', 'PR00000000003');
        })
        //->where('tanggal_order_masak','>=',date('Y-m-d'))
        ->get();

        $stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000002')->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000002')->sum('keluar');
        $stockgula = $stock1a - $stock1b;
        $stock2a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000001')->sum('masuk');
        $stock2b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000001')->sum('keluar');
        $stockgaram = $stock2a - $stock2b;
        $stock3a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000009')->sum('masuk');
        $stock3b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000009')->sum('keluar');
        $stockbumbu = $stock3a - $stock3b;        
        
        return view('gudangbumbu.homebumbu', ['stockbumbu' => $stockbumbu, 'stockgula' => $stockgula, 'stockgaram' => $stockgaram, 'ordermasak' => $ordermasak]);
    }
}

<?php

namespace App\Http\Controllers\gudangtepungtapioka;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;

class GudangTepungTapiokaController extends Controller
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

        $stock1a = DB::table('stock')->where('id_satuan', '=', 1)->sum('masuk');
        $stock1b = DB::table('stock')->where('id_satuan', '=', 1)->sum('keluar');
        $stock1c = $stock1a - $stock1b;
        $stock2a = DB::table('stock')->where('id_satuan', '=', 2)->sum('masuk');
        $stock2b = DB::table('stock')->where('id_satuan', '=', 2)->sum('keluar');
        $stock2c = $stock2a - $stock2b;       
        
        return view('gudangtepungtapioka.home', ['stock1c' => $stock1c, 'stock2c' => $stock2c, 'ordermasak' => $ordermasak]);
    }

    public function stock()
    {
        $stock1 = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000007')->where('id_satuan', '=', 1)->get();
        $stock2 = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000007')->where('id_satuan', '=', 2)->get();
        return view('gudangtepungtapioka.stock', ['stock1' => $stock1, 'stock2' => $stock2]);
    }

    public function kerjaharian()
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

        $ordermasak2 = OrderMasak::select('order_masak.*','dom.jumlah AS jumlah')
        ->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'PR00000000006');
        })
        ->get();

        $stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000007')->where('id_satuan', '=', 1)->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000007')->where('id_satuan', '=', 1)->sum('keluar');
        $stock1c = $stock1a - $stock1b;
        $stock2a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000007')->where('id_satuan', '=', 2)->sum('masuk');
        $stock2b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000007')->where('id_satuan', '=', 2)->sum('keluar');
        $stock2c = $stock2a - $stock2b;       
        
        return view('gudangtepungtapioka.kerjaharian', ['stock1c' => $stock1c, 'stock2c' => $stock2c, 'ordermasak' => $ordermasak]);
    }

    public function store(Request $request)
    {
        // insert data ke table
        DB::table('stock')->insert([
            'id_satuan' => 1,
            'id_transaksi' => 1,
            'id_bahan_baku' => 'BB000000007',
            'keterangan' => 'Diambil',
            'masuk' => 0,
            'keluar' => $request->berat,
            'id_gudang' => 5
    ]);
    // alihkan halaman ke halaman kategori
    return redirect('gudang-tepung-tapioka/kerjaharian');
    }

    public function store2(Request $request)
    {
        // insert data ke table
        DB::table('stock')->insert([
            'id_satuan' => 2,
            'id_transaksi' => 1,
            'id_bahan_baku' => 'BB000000007',
            'keterangan' => 'Hasil Tambah Packing',
            'masuk' => $request->hasilpack,
            'keluar' => 0,
            'id_gudang' => 5
    ]);
    // alihkan halaman ke halaman kategori
    return redirect('gudang-tepung-tapioka/kerjaharian');
    }

}

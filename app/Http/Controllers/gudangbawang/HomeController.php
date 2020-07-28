<?php

namespace App\Http\Controllers\gudangbawang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;


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
		
		$ordermasak2 = OrderMasak::select('order_masak.*','dom.jumlah AS jumlah')
    	->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'BB000000008');
		})
		->get();

		$stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000008')->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000008')->sum('keluar');
        $stock1c = $stock1a - $stock1b;

		return view('gudangbawang.homebawang', ['ordermasak' => $ordermasak, 'ordermasak2' => $ordermasak2, 'stock1c' => $stock1c]);
	}

}

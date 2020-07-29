<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Models\Stock;
use App\Models\BahanBaku;
use App\Models\Product;
use App\Models\DetailOrderMasak;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockob = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang OB', 'gudang.nama' => 'Gudang Kacang'])
                    ->get();

        $stock7ml = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang 7 ml', 'gudang.nama' => 'Gudang Kacang'])
                    ->paginate(5);

        $stock8ml = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang 8 ml', 'gudang.nama' => 'Gudang Kacang'])
                    ->paginate(5);

        $stockgs = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang Sortir'])
                    ->where('stock.keterangan','like', '%GS%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        $stocksp = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang Sortir'])
                    ->where('stock.keterangan','like', '%SP%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        $stockhc = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang Sortir'])
                    ->where('stock.keterangan','like', '%HC%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        $stocktelor = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang Sortir'])
                    ->where('stock.keterangan','like', '%Telor%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        // $stockhc = Stock::select('stock.*')
        //             ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
        //             ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
        //             ->where(['detail_order_masak.id_bahan_product' => 'PR00000000001', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
        //             ->sum('stock.stock');           

        // $stocksp = Stock::select('stock.*')
        //             ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
        //             ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
        //             ->where(['detail_order_masak.id_bahan_product' => 'PR00000000002', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
        //             ->sum('stock.stock'); 

        // $stockgs = Stock::select('stock.*')
        //             ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
        //             ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
        //             ->where(['detail_order_masak.id_bahan_product' => 'PR00000000003', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
        //             ->sum('stock.stock');    
        
        // $stocktelor = Stock::select('stock.*')
        //             ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
        //             ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
        //             ->where(['detail_order_masak.id_bahan_product' => 'PR00000000004', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
        //             ->sum('stock.stock');  


        return view('gudangkacang.home')->with(compact('stockob', 'stock7ml', 'stock8ml', 'stockgs', 'stocksp', 'stockhc', 'stocktelor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

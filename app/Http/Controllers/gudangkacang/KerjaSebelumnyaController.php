<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KerjaSebelumnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockob = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000004')
                    ->get();
        
        $stockhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000005')
                    ->get();

        $stock8ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000006')
                    ->get();

        $hasilgs = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000007')
                    ->get();

        $hasilsp = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000008')
                    ->get();

        $hasilhc = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000009')
                    ->get();

        $hasiltelor = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000010')
                    ->get();

        $sortirgs = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000011')
                    ->get();

        $sortirsp = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000012')
                    ->get();

        $sortirhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000013')
                    ->get();

        $sortirtelor = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku' => 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang' => 'stock.id_gudang')
                    ->where('stock.id_transaksi' => 'TR0000000000000014')
                    ->get();

        return view('gudangkacang.kerja_harian_sebelumnya')->with(compact('stockob', 'stockhc', 'stock8ml', 'hasilgs', 'hasilsp', 'hasilhc', 'hasiltelor', 'sortirgs', 'sortirsp', 'sortirhc', 'sortirtelor'));
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

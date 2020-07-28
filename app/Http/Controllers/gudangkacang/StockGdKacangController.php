<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\stock;
use App\Models\DetailTransaksi;
use App\Models\Penerimaan;

class StockGdKacangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function select()
    {
        $ob = stock::select('stock.timestamp', 'penerimaan.timestamp', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang OB','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc')->paginate(10);

        $tujuhML = stock::select('stock.timestamp', 'penerimaan.timestamp', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 7 ml','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc')->paginate(10);
        
        $delapanML = stock::select('stock.timestamp', 'penerimaan.timestamp', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 8ml','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc')->paginate(10);

        return view('gudangkacang.gd_kacang', ['ob'=>$ob, 'tujuhML'=>$tujuhML, 'delapanML'=>$delapanML]);
    }

    public function insertOB(Request $request)
    {
        Penerimaan::insert([
            'id_transaksi' => $request->barcode,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 9,
            'status_simpan' => 2,
            'timestamp' => $request->tanggal_penerimaan_kacang." ".date("H:i:s")
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'id_bahan_baku' => 'BB000000003',
            'keterangan' => 'Dari penerimaan kacang OB',
            'masuk' => $request->jumlah,
            'keluar' => 0,
            'id_gudang' => 9
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'jumlah' => $request->jumlah,
            'id_bahan_baku' => 'BB000000003',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang');
    }

    public function index()
    {
        //
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

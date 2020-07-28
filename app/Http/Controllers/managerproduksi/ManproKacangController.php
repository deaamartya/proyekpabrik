<?php

namespace App\Http\Controllers\managerproduksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\Stock;
use App\Models\BahanBaku;
use App\Models\Product;
use App\Models\DetailOrderMasak;



class ManproKacangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
         $kacang_ob = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang OB', 'gudang.nama' => 'Gudang Kacang'])
                    ->get();

        $kacang_7ml = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang 7 ml', 'gudang.nama' => 'Gudang Kacang'])
                    ->get();

        $kacang_8ml = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang 8 ml', 'gudang.nama' => 'Gudang Kacang'])
                    ->get();

        $kacang_hc = DetailOrderMasak::select('detail_order_masak.id_bahan_product', 'detail_order_masak.jenis_order', 'detail_order_masak.jumlah')
                    ->join('product', 'product.id_product', '=', 'detail_order_masak.id_bahan_product')
                    ->where(['detail_order_masak.jenis_order' => 0,'product.nama' => 'HC'])
                    ->sum('jumlah');
                   

        $kacang_gs = DetailOrderMasak::select('detail_order_masak.id_bahan_product', 'detail_order_masak.jenis_order', 'detail_order_masak.jumlah')
                    ->join('product', 'product.id_product', '=', 'detail_order_masak.id_bahan_product')
                    ->where(['detail_order_masak.jenis_order' => 0,'product.nama' => 'GS'])
                    ->sum('jumlah');

        $kacang_sp = DetailOrderMasak::select('detail_order_masak.id_bahan_product', 'detail_order_masak.jenis_order', 'detail_order_masak.jumlah')
                    ->join('product', 'product.id_product', '=', 'detail_order_masak.id_bahan_product')
                    ->where(['detail_order_masak.jenis_order' => 0,'product.nama' => 'SP'])
                    ->sum('jumlah');

        $kacang_telor = DetailOrderMasak::select('detail_order_masak.id_bahan_product', 'detail_order_masak.jenis_order', 'detail_order_masak.jumlah')
                    ->join('product', 'product.id_product', '=', 'detail_order_masak.id_bahan_product')
                    ->where(['detail_order_masak.jenis_order' => 0,'product.nama' => 'Telor'])
                    ->sum('jumlah');


        return view('managerproduksi.gudang-kacang.home_gudangkacang')->with(compact('kacang_ob', 'kacang_7ml', 'kacang_8ml', 'kacang_hc', 'kacang_gs', 'kacang_sp', 'kacang_telor'));
    }


    public function stock_gudangkacang()
    {
        return view('managerproduksi.gudang-kacang.stock_gudangkacang');
    }


    public function stock_kacang_ob(Request $req)
    {

         
        $stock_ob = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000003', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_ob, $req->tgl_akhir_ob))
                    ->get();
                    

        return response()->json(['stock_ob'=>$stock_ob]);

        
    }

     public function stock_kacang_7ml(Request $req)
    {

         
        $stock_7ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000004', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_7ml, $req->tgl_akhir_7ml))
                    ->get();
                    

        return response()->json(['stock_7ml'=>$stock_7ml]);

        
    }

      public function stock_kacang_8ml(Request $req)
    {

         
        $stock_8ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000005', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_8ml, $req->tgl_akhir_8ml))
                    ->get();
                    

        return response()->json(['stock_8ml'=>$stock_8ml]);

        
    }

   
     public function stock_gudangkacangsortir()
    {
        return view('managerproduksi.gudang-kacang.stock_gudangkacangsortir');
    }

     public function stock_kacang_gs(Request $req)
    {

         
        $stock_gs = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB0000000010', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_gs, $req->tgl_akhir_gs))
                    ->get();
                    

        return response()->json(['stock_gs'=>$stock_gs]);

        
    }

    public function kerjahariini()
    {
        return view('managerproduksi.gudang-kacang.kerjaharian_hariini');
    }

    public function kerjaharisebelumnya()
    {
        return view('managerproduksi.gudang-kacang.kerjaharian_sebelumnya');
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
     * @param  \App\ManproKacang  $manproKacang
     * @return \Illuminate\Http\Response
     */
    public function show(ManproKacang $manproKacang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManproKacang  $manproKacang
     * @return \Illuminate\Http\Response
     */
    public function edit(ManproKacang $manproKacang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManproKacang  $manproKacang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManproKacang $manproKacang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManproKacang  $manproKacang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManproKacang $manproKacang)
    {
        //
    }
}

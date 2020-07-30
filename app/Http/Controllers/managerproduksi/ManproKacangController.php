<?php

namespace App\Http\Controllers\managerproduksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\Stock;
use App\Models\GroupKerja;
use App\Models\BahanBaku;
use App\Models\Product;
use App\Models\DetailOrderMasak;
use App\Models\DetailRekap;



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

        $kacang_gs = Stock::select('stock.*')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang', 'stock.id_transaksi' => 'TR0000000000000007'])
                    ->sum('stock.stock'); 


        $kacang_sp = Stock::select('stock.*')
                   ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang', 'stock.id_transaksi' => 'TR0000000000000008'])
                    ->sum('stock.stock'); 


        $kacang_hc = Stock::select('stock.*')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang', 'stock.id_transaksi' => 'TR0000000000000009'])
                    ->sum('stock.stock');         
        
        
        $kacang_telor = Stock::select('stock.*')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang Sortir', 'gudang.nama' => 'Gudang Kacang', 'stock.id_transaksi' => 'TR0000000000000010'])
                    ->sum('stock.stock');


        return view('managerproduksi.gudang-kacang.home_gudangkacang')->with(compact('kacang_ob', 'kacang_7ml', 'kacang_8ml', 'kacang_hc', 'kacang_gs', 'kacang_sp', 'kacang_telor'));
    }

    


    public function stock_gudangkacang()
    {
      /*
        $kacang_ob = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                //->join('detail_transaksi','stock.id_transaksi' ,'=', 'detail_transaksi.id_transaksi')
                //->join('penerimaan','detail_transaksi.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                ->where(['stock.id_bahan_baku' => 'BB000000003', 'stock.id_gudang' => '9'])
                ->get();

        $kacang_7ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000004', 'stock.id_gudang' => '9'])
                    ->get();
                    
        $kacang_8ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000005', 'stock.id_gudang' => '9'])
                    ->get();
*/

        $kacang_ob = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang OB','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc');

        $kacang_7ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 7 ml','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc');
        
        $kacang_8ml= Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 8 ml','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc');           
                    
        return view('managerproduksi.gudang-kacang.stock_gudangkacang')->with(compact('kacang_ob', 'kacang_7ml', 'kacang_8ml'));
    }


    public function stock_kacang_ob(Request $req)
    {

         /*
        $stock_ob = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000003', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_ob, $req->tgl_akhir_ob))
                    ->get();
         */

         $stock_ob = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                  ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                  ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                  ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                  ->where(['bahan_baku.nama' => 'Kacang OB','stock.id_gudang' => '9'])
                  ->whereBetween(DB::raw('DATE(stock.TIMESTAMP)'), array($req->tgl_awal_ob, $req->tgl_akhir_ob))
                  ->orderBy('stock.timestamp','asc')->get();


        return response()->json(['stock_ob'=>$stock_ob]);

        
    }

     public function stock_kacang_7ml(Request $req)
    {

      /*
         
        $stock_7ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000004', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_7ml, $req->tgl_akhir_7ml))
                    ->get();

        */

           $stock_7ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                  ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                  ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                  ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                  ->where(['bahan_baku.nama' => 'Kacang 7 ml','stock.id_gudang' => '9'])
                  ->whereBetween(DB::raw('DATE(stock.TIMESTAMP)'), array($req->tgl_awal_7ml, $req->tgl_akhir_7ml))
                  ->orderBy('stock.timestamp','asc')->get();
                    

        return response()->json(['stock_7ml'=>$stock_7ml]);

        
    }

      public function stock_kacang_8ml(Request $req)
    {

      /*
         
        $stock_8ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000005', 'stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_8ml, $req->tgl_akhir_8ml))
                    ->get();
      */

        $stock_8ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                  ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                  ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                  ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                  ->where(['bahan_baku.nama' => 'Kacang 8 ml','stock.id_gudang' => '9'])
                  ->whereBetween(DB::raw('DATE(stock.TIMESTAMP)'), array($req->tgl_awal_8ml, $req->tgl_akhir_8ml))
                  ->orderBy('stock.timestamp','asc')->get();
                    

        return response()->json(['stock_8ml'=>$stock_8ml]);

        
    }

   
     public function stock_gudangkacangsortir()
    {
      /*
         $kacang_gs = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000003', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->get();

         $kacang_sp = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000002', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->get();

         $kacang_hc = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000001', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->get();

        $kacang_telor = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000004', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->get();

        */

        $kacang_gs = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'GS'.'%')
              ->orderBy('stock.timestamp','asc');


        $kacang_sp = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'SP'.'%')
              ->orderBy('stock.timestamp','asc');

        $kacang_hc = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'HC'.'%')
              ->orderBy('stock.timestamp','asc');

        $kacang_telor = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'Telor'.'%')
              ->orderBy('stock.timestamp','asc');

        return view('managerproduksi.gudang-kacang.stock_gudangkacangsortir')->with(compact('kacang_gs', 'kacang_sp', 'kacang_hc', 'kacang_telor'));
    }

     public function stock_kacang_gs(Request $req)
    {
      /*
         
        $stock_gs = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000003', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_gs, $req->tgl_akhir_gs))
                    ->get();
                    
  */
        $stock_gs = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
              ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_gs, $req->tgl_akhir_gs))
              ->orderBy('stock.timestamp','asc')->get();


        return response()->json(['stock_gs'=>$stock_gs]);

        
    }

     public function stock_kacang_sp(Request $req)
    {

         /*
        $stock_sp = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000002', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_sp, $req->tgl_akhir_sp))
                    ->get();
           */

           $stock_sp = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                    ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_sp, $req->tgl_akhir_sp))
                    ->orderBy('stock.timestamp','asc')->get();


        return response()->json(['stock_sp'=>$stock_sp]);

        
    }

     public function stock_kacang_hc(Request $req)
    {

        /*
        $stock_hc = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000001', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_hc, $req->tgl_akhir_hc))
                    ->get();
          */

         $stock_hc = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                    ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_hc, $req->tgl_akhir_hc))
                    ->orderBy('stock.timestamp','asc')->get();


        return response()->json(['stock_hc'=>$stock_hc]);

        
    }

    public function stock_kacang_telor(Request $req)
    {

         /*
        $stock_telor = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('order_masak','stock.id_transaksi' ,'=', 'order_masak.id_order_masak')
                    ->join('detail_order_masak', 'order_masak.id_order_masak', '=', 'detail_order_masak.id_order_masak')
                    ->where(['detail_order_masak.id_bahan_product' => 'PR00000000004', 'stock.id_gudang' => '10', 'stock.id_bahan_baku' => 'BB000000010'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_telor, $req->tgl_akhir_telor))
                    ->get();

          */
                
           $stock_telor = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                    ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_telor, $req->tgl_akhir_telor))
                    ->orderBy('stock.timestamp','asc')->get();    

        return response()->json(['stock_telor'=>$stock_telor]);

        
    }


    public function kerjahariini()
    {
        
        $stockob = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000004')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();
        
        $stockhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000005')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();

        $stock8ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000006')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();

        $hasilgs = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000007')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();

        $hasilsp = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000008')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();

        $hasilhc = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000009')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();
                    
        $hasiltelor = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000010')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();

        $sortirgs = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000011')
                    ->whereDate('stock.timestamp', date('Y-m-d'))
                    ->first();

        $sortirsp = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000012')
                    ->whereDate('stock.timestamp',date('Y-m-d'))
                    ->first();

        $sortirhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000013')
                    ->whereDate('stock.timestamp',date('Y-m-d'))
                    ->first();

        $sortirtelor = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000014')
                    ->whereDate('stock.timestamp',date('Y-m-d'))
                    ->first();

        $kacangbs = DetailRekap::select('detail_rekap.berat_bs')
                    ->join('detail_transaksi', 'detail_rekap.id_detail_transaksi', '=', 'detail_transaksi.id_detail_transaksi')
                    ->where('id_jenis_transaksi', '=', 5)
                    ->whereDate('detail_transaksi.timestamp',date('Y-m-d'))
                    ->first();


        $grupkerja = GroupKerja::select('group_kerja.jumlah_personil')
                    ->join('kerja_harian_group', 'group_kerja.id_group_kerja', '=', 'kerja_harian_group.id_group_kerja')
                    ->whereDate('kerja_harian_group.tanggal', date('Y-m-d'))
                    ->first();

       

        return view('managerproduksi.gudang-kacang.kerjaharian_hariini')->with(compact('stockob', 'stockhc', 'stock8ml', 'hasilgs', 'hasilsp', 'hasilhc', 'hasiltelor', 'sortirgs', 'sortirsp', 'sortirhc', 'sortirtelor','kacangbs' , 'grupkerja'));

        
    }

    public function kerjaharisebelumnya()
    {

        return view('managerproduksi.gudang-kacang.kerjaharian_sebelumnya');

    }


    public function cari_kerjasebelumnya(Request $request)
    {
      
        $stockob = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000004')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();
        
        $stockhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000005')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $stock8ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000006')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $hasilgs = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000007')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $hasilsp = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000008')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $hasilhc = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000009')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $hasiltelor = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000010')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $sortirgs = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000011')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $sortirsp = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000012')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $sortirhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000013')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

        $sortirtelor = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000014')
                    ->whereDate('stock.timestamp', $request->date)
                    ->first();

         $kacangbs = DetailRekap::select('detail_rekap.berat_bs')
                    ->join('detail_transaksi', 'detail_rekap.id_detail_transaksi', '=', 'detail_transaksi.id_detail_transaksi')
                    ->where('id_jenis_transaksi', '=', 5)
                    ->whereDate('detail_transaksi.timestamp',$request->date)
                    ->first();


        $grupkerja = GroupKerja::select('group_kerja.jumlah_personil')
                    ->join('kerja_harian_group', 'group_kerja.id_group_kerja', '=', 'kerja_harian_group.id_group_kerja')
                    ->whereDate('kerja_harian_group.tanggal', $request->date)
                    ->first();

       

        return response()->json(['stockob'=>$stockob, 'stockhc'=>$stockhc, 'stock8ml'=>$stock8ml, 'hasilgs'=>$hasilgs, 'hasilsp'=>$hasilsp, 'hasilhc'=>$hasilhc, 'hasiltelor'=>$hasiltelor, 'sortirgs'=>$sortirgs, 'sortirsp'=>$sortirsp, 'sortirhc'=>$sortirhc, 'sortirtelor'=>$sortirtelor, 'kacangbs'=>$kacangbs  ,'grupkerja'=>$grupkerja]);
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

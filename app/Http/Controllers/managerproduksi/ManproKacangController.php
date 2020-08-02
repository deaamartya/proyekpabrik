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
         $stockob = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang OB', 'gudang.nama' => 'Gudang Kacang'])
                    ->orderBy('stock.timestamp','desc')
                    ->get();

        $stock7ml = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang 7 ml', 'gudang.nama' => 'Gudang Kacang'])
                    ->orderBy('stock.timestamp','desc')
                    ->get();

        $stock8ml = Stock::select('stock.timestamp' , 'stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where(['stock.id_satuan' => 1,'bahan_baku.nama' => 'Kacang 8 ml', 'gudang.nama' => 'Gudang Kacang'])
                    ->orderBy('stock.timestamp','desc')
                    ->get();

        $stockgs = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_gudang', '=', '10')
                    ->where('stock.keterangan','like', '%GS%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        $stocksp = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_gudang', '=', '10')
                    ->where('stock.keterangan','like', '%SP%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        $stockhc = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_gudang', '=', '10')
                    ->where('stock.keterangan','like', '%HC%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

        $stocktelor = Stock::select('stock.stock')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_gudang', '=', '10')
                    ->where('stock.keterangan','like', '%Telor%')
                    ->orderBy('stock.timestamp','desc')
                    ->first();

       
        if($stockgs=="" || $stockgs=="0"){
            $stockgs = "0";
        }else{
            $stockgs = $stockgs->stock;
        }
        if($stocksp=="" || $stocksp=="0"){
            $stocksp = "0";
        }else{
            $stocksp = $stocksp->stock;
        }
        if($stockhc=="" || $stockhc=="0"){
            $stockhc = "0";
        }else{
            $stockhc = $stockhc->stock;
        }
        if($stocktelor=="" || $stocktelor=="0"){
            $stocktelor = "0";
        }else{
            $stocktelor = $stocktelor->stock;
        }



          return view('managerproduksi.gudang-kacang.home_gudangkacang')->with(compact('stockob', 'stock7ml', 'stock8ml', 'stockgs', 'stocksp', 'stockhc', 'stocktelor'));


        
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
                  ->exists();

        if($stock_ob){

           $stock_ob = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->where(['bahan_baku.nama' => 'Kacang OB','stock.id_gudang' => '9'])
                    ->whereBetween(DB::raw('DATE(stock.TIMESTAMP)'), array($req->tgl_awal_ob, $req->tgl_akhir_ob))
                    ->orderBy('stock.timestamp','asc')->get();


          return response()->json(['error'=>false,'stock_ob'=>$stock_ob]);

        }else{

          return response()->json(['error'=>true]);
        }

        
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
                  ->exists();

        if($stock_7ml){

           $stock_7ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                  ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                  ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                  ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                  ->where(['bahan_baku.nama' => 'Kacang 7 ml','stock.id_gudang' => '9'])
                  ->whereBetween(DB::raw('DATE(stock.TIMESTAMP)'), array($req->tgl_awal_7ml, $req->tgl_akhir_7ml))
                  ->orderBy('stock.timestamp','asc')->get();
                    

          return response()->json(['error'=>false , 'stock_7ml'=>$stock_7ml]);

      }else{

        return response()->json(['error'=>true]);
      }

        
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
                  ->exists();

         if($stock_8ml){         

          $stock_8ml = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                  ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                  ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                  ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                  ->where(['bahan_baku.nama' => 'Kacang 8 ml','stock.id_gudang' => '9'])
                  ->whereBetween(DB::raw('DATE(stock.TIMESTAMP)'), array($req->tgl_awal_8ml, $req->tgl_akhir_8ml))
                  ->orderBy('stock.timestamp','asc')->get();


                  
        return response()->json(['error'=>false ,'stock_8ml'=>$stock_8ml]);


        }else{

        return response()->json(['error'=>true]);
      }

        
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
              ->exists();

        if($stock_gs){

          $stock_gs = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_gs, $req->tgl_akhir_gs))
                ->orderBy('stock.timestamp','asc')->get();


          return response()->json(['error'=>false ,'stock_gs'=>$stock_gs]);

         }else{

        return response()->json(['error'=>true]);
      }

        
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
                    ->exists();

          if($stock_sp){

             $stock_sp = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                      ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                      ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                      ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                      ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                      ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                      ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_sp, $req->tgl_akhir_sp))
                      ->orderBy('stock.timestamp','asc')->get();


            return response()->json(['error'=>false , 'stock_sp'=>$stock_sp]);

         }else{

          return response()->json(['error'=>true]);
      }

        
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
                      ->exists();

          if($stock_hc){

           $stock_hc = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                      ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                      ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                      ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                      ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                      ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                      ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_hc, $req->tgl_akhir_hc))
                      ->orderBy('stock.timestamp','asc')->get();


          return response()->json(['error'=>false, 'stock_hc'=>$stock_hc]);


         }else{

          return response()->json(['error'=>true]);
      }

        
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
                    ->exists();

          if($stock_telor){
                
           $stock_telor = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->join('penerimaan', 'penerimaan.id_penerimaan', '=', 'stock.id_transaksi')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
                    ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal_telor, $req->tgl_akhir_telor))
                    ->orderBy('stock.timestamp','asc')->get();    

        return response()->json(['error'=>false ,'stock_telor'=>$stock_telor]);

        }else{

          return response()->json(['error'=>true]);
      }

        
    }



    

    public function kerjaharian()
    {

        return view('managerproduksi.gudang-kacang.kerjaharian');

    }


    public function cari_kerjaharian(Request $request)
    {

      


       $stockob = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000004')
                    ->whereDate('stock.timestamp', $request->date)
                    ->exists();
        
        $stock7ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000005')
                    ->whereDate('stock.timestamp', $request->date)
                    ->exists();

        $stock8ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000006')
                    ->whereDate('stock.timestamp', $request->date)
                    ->exists();

      if($stockob || $stock7ml || $stock8ml){ 
      
        $stockob = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000004')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();
        
        $stock7ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000005')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $stock8ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000006')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasilgs = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('detail_transaksi.id_jenis_transaksi', '=', '4')
                    ->where('stock.keterangan','like', '%GS%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasilsp = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('detail_transaksi.id_jenis_transaksi', '=', '4')
                    ->where('stock.keterangan','like', '%SP%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasilhc = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('detail_transaksi.id_jenis_transaksi', '=', '4')
                    ->where('stock.keterangan','like', '%HC%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasiltelor = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('detail_transaksi.id_jenis_transaksi', '=', '4')
                    ->where('stock.keterangan','like', '%Telor%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirgs = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000011')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirsp = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000012')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000013')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirtelor = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000014')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();
        
        $kacangbs = DetailRekap::select('detail_rekap.berat_bs')
                    ->join('detail_transaksi', 'detail_rekap.id_detail_transaksi', '=', 'detail_transaksi.id_detail_transaksi')
                    ->where('id_jenis_transaksi', '=', '5')
                    ->whereDate('detail_transaksi.timestamp', $request->date)
                    ->get();

        $grupkerja = GroupKerja::select('group_kerja.jumlah_personil')
                    ->join('kerja_harian_group', 'group_kerja.id_group_kerja', '=', 'kerja_harian_group.id_group_kerja')
                    ->whereDate('kerja_harian_group.tanggal', $request->date)
                    ->get();

                 

        return response()->json(['error' => false , 'stockob'=>$stockob, 'stock7ml'=>$stock7ml, 'stock8ml'=>$stock8ml, 'hasilgs'=>$hasilgs, 'hasilsp'=>$hasilsp, 'hasilhc'=>$hasilhc, 'hasiltelor'=>$hasiltelor, 'sortirgs'=>$sortirgs, 'sortirsp'=>$sortirsp, 'sortirhc'=>$sortirhc, 'sortirtelor'=>$sortirtelor, 'grupkerja'=>$grupkerja, 'kacangbs'=>$kacangbs]);

      }else{

        return response()->json(['error' => true]);
      
      }
        

       
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

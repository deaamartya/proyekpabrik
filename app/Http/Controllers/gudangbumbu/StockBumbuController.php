<?php

namespace App\Http\Controllers\gudangbumbu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;

class StockBumbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexbahan()
    {
        $stockgula = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('id_bahan_baku','=','BB000000002')->where('id_satuan', '=', 1)->get();
        $stockgaram = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('id_bahan_baku','=','BB000000001')->where('id_satuan', '=', 1)->get();
       
  

      return view('gudangbumbu.bahan', ['stockgula' => $stockgula, 'stockgaram' => $stockgaram]);
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
    public function storebahan(Request $request)
    {
        Stock::create($request->all());
        return redirect('/gudang-bumbu/bahan')->with('status', 'data berhasil ditambahkan');
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

    public function caribahan(Request $request)
    {

         $stockgula = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000002', 'stock.id_gudang' => '1'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($request->awal, $request->akhir))
                    ->get();

        $stockgaram = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d/%m/%Y") AS timestamp') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where(['stock.id_bahan_baku' => 'BB000000001', 'stock.id_gudang' => '1'])
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($request->awal, $request->akhir))
                    ->get();
                    

        return view('gudangbumbu.bahan', ['stockgula'=>$stockgula, 'stockgaram' => $stockgaram]);
        // Stock::create($request->all());
        // $stockgula = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('id_bahan_baku','BB000000002')->whereBetween('TIMESTAMP', array($request->awalDate, $request->akhirDate))->get();
        // $stockgaram = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('id_bahan_baku','BB000000001')->whereBetween('TIMESTAMP', array($request->awalDate, $request->akhirDate))->get();
    
        
        // return view('gudangbumbu.bahan', ['stockgula' => $stockgula, 'stockgaram' => $stockgaram]);
    }
    
    

    public function tambah()
    {
        $detailordermasak= \App\Models\DetailOrderMasak::all();
        $substring= substr($id,22);
        switch ($substring) {
            case 0:
              echo "Your favorite color is red!";
              break;
            case 1:
              echo "Your favorite color is blue!";
              break;
            case 2:
              echo "Your favorite color is green!";
              break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
          }
        $jumlah = DB::table('detail_order_masak')->select('jumlah')->where('id',$id);
        $jumlah1 =$jumlah+1;
        $jumlah->jumlah = $jumlah1;
        $jumlah->save();
        // $tambah=DB::table('detailordermasak')->where('id', $id) ->update(['jumlah' => $jumlah]);
        return response()->json(['success' => true  ]);
    }


}

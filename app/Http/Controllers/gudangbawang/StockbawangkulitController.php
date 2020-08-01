<?php

namespace App\Http\Controllers\gudangbawang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\DetailOrderMasak;

class StockbawangkulitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $stock= \App\Models\Stock::all();
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))->where('id_bahan_baku','BB000000006')->get();
        $stock1 = DB::table('stock')->where('id_bahan_baku','BB000000006')->sum('masuk');
        $stock2 = DB::table('stock')->where('id_bahan_baku','BB000000006')->sum('masuk');
     return view('gudangbawang.stockbawangkulit', ['stock' => $stock]);
    
    }

    public function indexkupas()
    {
        // $stock= \App\Models\Stock::all();
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))->where('id_bahan_baku','BB000000008')->get();
     return view('gudangbawang.stockbawangkupas', ['stock' => $stock]);
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
        Stock::create($request->all());
        return redirect('/gudang-bawang/stockbawangkulit')->with('status', 'data berhasil ditambahkan');
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

    public function carikulit(Request $request)
    {
        // Stock::create($request->all());
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('id_bahan_baku','BB000000006')
        ->whereBetween('TIMESTAMP', array($request->awalDate, $request->akhirDate))->get();
        return view('gudangbawang.stockbawangkulit', ['stock' => $stock]);
    }
    
    public function carikupas(Request $request)
    {
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('id_bahan_baku','BB000000008')
        ->whereBetween('TIMESTAMP', array($request->awalDate, $request->akhirDate))->get();
        return view('gudangbawang.stockbawangkupas', ['stock' => $stock]);
    }
    



    // public function tambah($id)
    // {
    //     $detailordermasak= \App\Models\DetailOrderMasak::all();
    //     $substring= substr($id,22);
    //     switch ($substring) {
    //         case 0:
    //           echo "Your favorite color is red!";
    //           break;
    //         case 1:
    //           echo "Your favorite color is blue!";
    //           break;
    //         case 2:
    //           echo "Your favorite color is green!";
    //           break;
    //         default:
    //           echo "Your favorite color is neither red, blue, nor green!";
    //       }
    //     $jumlah = DB::table('detail_order_masak')->select('jumlah')->where('id',$id);
    //     $jumlah1 =$jumlah+1;
    //     $jumlah->jumlah = $jumlah1;
    //     $jumlah->save();
    //     // $tambah=DB::table('detailordermasak')->where('id', $id) ->update(['jumlah' => $jumlah]);
    //     return response()->json(['success' => true  ]);
    // //  return view('gudangbawang.stockbawangkulit', ['detailordermasak' => $detailordermasak]);
    // }
    
    public function terima(Request $request)
    {   if($request->merek == 'kulit'){
        $stock = DB::table('stock')->where('keterangan','=','kulit')->sum('masuk');
            DB::table('stock')->insert([
                'masuk'=> $request->jumlah,
                'id_transaksi' => $request->id_pb,
                'id_bahan_baku' => 'BB000000006',
                'keterangan' => 'kulit',
                'id_satuan' => 1,
                'keluar' => 0,
                'stock' => 0,
            ]);


        }
        else {
            $stock = DB::table('stock')->where('keterangan','=','kupas')->sum('masuk');
            DB::table('stock')->insert([
                'masuk' => $request->jumlah,
                'id_transaksi' => $request->id_pb,
                'id_bahan_baku' => 'BB000000008',
                'keterangan' => 'kupas',
                'id_satuan' => 1,
                'keluar' => 0,
                'stock' => 0,
            ]);
        }
        return redirect('/gudang-bawang/stockbawangkulit');
    }


      


}

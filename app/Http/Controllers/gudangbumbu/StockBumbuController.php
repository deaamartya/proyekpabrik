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
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('keterangan','bahan')->get();
     return view('gudangbumbu.bahan', ['stock' => $stock]);
    }

    public function indexgulagaram()
    {
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('keterangan','gulagaram')->get();
     return view('gudangbumbu.adonangulagaram', ['stock' => $stock]);
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

    public function storegulagaram(Request $request)
    {
        Stock::create($request->all());
        return redirect('/gudang-bumbu/adonangulagaram')->with('status', 'data berhasil ditambahkan');
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
        // Stock::create($request->all());
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('keterangan','bahan')->whereBetween('TIMESTAMP', array($request->awalDate, $request->akhirDate))->get();
        return view('gudangbumbu.bahan', ['stock' => $stock]);
    }
    
    public function carigulagaram(Request $request)
    {
        $stock = DB::table('stock')->select('TIMESTAMP','keterangan','masuk','keluar','stock')->where('keterangan','gulagaram')->whereBetween('TIMESTAMP', array($request->awalDate, $request->akhirDate))->get();
        return view('gudangbumbu.adonangulagaram', ['stock' => $stock]);
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

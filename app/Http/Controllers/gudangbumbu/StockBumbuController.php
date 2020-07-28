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
    public function index()
    {
        $stock= \App\Models\Stock::all();
     return view('gudangbumbu.bahan', ['stock' => $stock]);
     return view('gudangbumbu.adonangulagaram', ['stock' => $stock]);
    }

    public function indexbahan()
    {
        $stock= \App\Models\Stock::all();
     
     return view('gudangbumbu.bahan', ['stock' => $stock]);
    }

    public function indexgulagaram()
    {
        $stock= \App\Models\Stock::all();
     
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
    public function store(Request $request)
    {
        Stock::create($request->all());
        return redirect('/gudang-bumbu/bahan')->with('status', 'data berhasil ditambahkan');
    }

    public function store(Request $request)
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
    public function tambah()
    {
        //
    }


}

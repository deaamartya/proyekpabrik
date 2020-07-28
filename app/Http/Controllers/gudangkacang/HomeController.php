<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\stock;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockob = stock::select('timestamp', 'masuk')->where(['id_satuan' => '1','id_gudang' => '9'])->orderBy('timestamp','asc')->paginate(5);
        $stock7ml = stock::select('timestamp', 'masuk')->where(['id_satuan' => '1','id_gudang' => '9'])->orderBy('timestamp','asc')->paginate(5);
        $stock8ml = stock::select('timestamp', 'masuk')->where(['id_satuan' => '1','id_gudang' => '9'])->orderBy('timestamp','asc')->paginate(5);
        return view('gudangkacang.home', ['stock'=>$stockob, 'stock'=>$stock7ml, 'stock'=>$stock8ml]);
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

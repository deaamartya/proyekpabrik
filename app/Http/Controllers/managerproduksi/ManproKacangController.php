<?php

namespace App\Http\Controllers\managerproduksi;

use App\Managerproduksi\ManproKacang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManproKacangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('managerproduksi.gudang-kacang.home_gudangkacang');
    }


    public function stock_gudangkacang()
    {
        return view('managerproduksi.gudang-kacang.stock_gudangkacang');
    }


     public function stock_gudangkacangsortir()
    {
        return view('managerproduksi.gudang-kacang.stock_gudangkacangsortir');
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

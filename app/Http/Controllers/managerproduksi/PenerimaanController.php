<?php

namespace App\Http\Controllers\managerproduksi;

use App\Http\Controllers\Controller;

use App\Managerproduksi\Penerimaan;
use App\Managerproduksi\Gudang;
use App\Managerproduksi\Supplier;

use Illuminate\Http\Request;
use PDF;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select_history()
    {
        return view('managerproduksi.penerimaan.history_penerimaan');
        //$penerimaan = Penerimaan::all();
        //return view('penerimaan.history_penerimaan')->with(compact('penerimaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $gudang = Gudang::all(); 
        $supplier = Supplier::all(); 
        return view('managerproduksi.penerimaan.create_penerimaan')->with(compact('gudang', 'supplier'));
        */
        return view('managerproduksi.penerimaan.create_penerimaan');

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
     * @param  \App\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        $gudang = Gudang::all(); 
        $supplier = Supplier::all(); 
        return view('managerproduksi.penerimaan.edit_penerimaan' , ['id_penerimaan' => $id])->with(compact('gudang', 'supplier'));
        */
        return view('managerproduksi.penerimaan.edit_penerimaan' , ['id_penerimaan' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerimaan $penerimaan)
    {
        //
    }

    public  function printBarcode(){ 
        $kode_penerimaan = "PEN200713001"; 
        $no = 1; 
        $pdf =  PDF::loadView('managerproduksi.penerimaan.cetak_barcode', compact('kode_penerimaan', 'no')); 
        $pdf->setPaper('a4',  'potrait'); 
        return $pdf->stream(); 
    }

    


}

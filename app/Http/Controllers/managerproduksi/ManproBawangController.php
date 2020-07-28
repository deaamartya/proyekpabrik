<?php

namespace App\Http\Controllers\managerproduksi;

use App\Managerproduksi\ManproBawang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManproBawangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('managerproduksi.gudang-bawang.home_gudangbawang');
    }

    public function stock_bawangkulit()
    {
        return view('managerproduksi.gudang-bawang.stock_bawangkulit');
    }

<<<<<<< HEAD
     public function get_stock_bawangkulit(Request $req)
    {

        $stock_bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d %M %Y") AS tgl_terima') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    //->where(['stock.id_bahan_baku' => 'BB000000006', 'stock.id_gudang' => '7'])
                    ->where('stock.keterangan' '=', 'kulit')
                    ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                    ->get();
                    

        return response()->json(['stock_bawangkulit'=>$stock_bawangkulit]);

        
    }


=======
>>>>>>> master
    public function stock_bawangkupas()
    {
        return view('managerproduksi.gudang-bawang.stock_bawangkupas');
    }

    public function tenaga_kupas()
    {
        return view('managerproduksi.gudang-bawang.tenaga_kupas');
    }

    public function pembagian_bawang()
    {
        return view('managerproduksi.gudang-bawang.pembagian_bawang');
    }

    public function penerimaan_bawang()
    {
        return view('managerproduksi.gudang-bawang.penerimaan_bawang');
    }

    public function persiapan_masak()
    {
        return view('managerproduksi.gudang-bawang.persiapan_masak');
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
     * @param  \App\ManproBawang  $manproBawang
     * @return \Illuminate\Http\Response
     */
    public function show(ManproBawang $manproBawang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManproBawang  $manproBawang
     * @return \Illuminate\Http\Response
     */
    public function edit(ManproBawang $manproBawang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManproBawang  $manproBawang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManproBawang $manproBawang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManproBawang  $manproBawang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManproBawang $manproBawang)
    {
        //
    }
}

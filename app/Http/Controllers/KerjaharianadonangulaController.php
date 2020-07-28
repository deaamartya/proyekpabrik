<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailOrderMasak;
use App\Models\Stock;
use App\Models\Pegawai;
use App\Models\OrderMasak;
use App\Models\KerjaHarianGroup;
use App\Models\RekapKerjaHarianGroup;
use App\Models\DetailRekapKerjaHarianGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\parseInt;

class KerjaharianadonangulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailordermasak=\App\Models\DetailOrderMasak::all();

        $ordermasak = OrderMasak::select('order_masak.*','dom.jumlah AS HC','dom1.jumlah AS SP','dom2.jumlah AS GS')
    	->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'PR00000000001');
        })
        ->join('detail_order_masak AS dom1', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom1.id_order_masak')
                 ->where('dom1.id_bahan_product', '=', 'PR00000000002');
        })
        ->join('detail_order_masak AS dom2', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom2.id_order_masak')
                 ->where('dom2.id_bahan_product', '=', 'PR00000000003');
        })
    	//->where('tanggal_order_masak','>=',date('Y-m-d'))
        ->get();

        $stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000002')->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000002')->sum('keluar');
        $stockgula = $stock1a - $stock1b;
        $stock2a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000001')->sum('masuk');
        $stock2b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000001')->sum('keluar');
        $stockgaram = $stock2a - $stock2b;
        $stock3a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000006')->sum('masuk');
        $stock3b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000006')->sum('keluar');
        $stockbumbu = $stock3a - $stock3b;
       
        $hc=DB::table('detail_order_masak')->distinct('id_bahan_product')->where('id_bahan_product','=','PR00000000001')->sum('jumlah');
        $sp=DB::table('detail_order_masak')->distinct('id_bahan_product')->where('id_bahan_product','=','PR00000000002')->sum('jumlah');
        $gs=DB::table('detail_order_masak')->distinct('id_bahan_product')->where('id_bahan_product','=','PR00000000003')->sum('jumlah');
        $jumlah4 = DB::table('stock')->distinct('id_bahan_baku')->where('id_bahan_baku','=','BB000000002')->sum('stock');
        //    echo $hc;
    // $terima=$hc+$sp+$gs;
    $stock=DB::table('stock')->distinct('id_bahan_baku')->where('id_bahan_baku','=','BB000000002')->sum('stock');
    $jumlah3 = DB::table('detail_order_masak')->distinct('id_bahan_product')->sum('jumlah');
       
        // return view('gudangbumbu.kerjaharianadonangula',['detailordermasak'=>$detailordermasak,'hc'=>$hc,'sp'=>$sp,'gs'=>$gs]);
        return view('gudangbumbu.kerjaharianadonangula',compact('detailordermasak','hc','sp','gs','jumlah3','stock','jumlah4','stockbumbu','stockgula','stockgaram','ordermasak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

    public function ganti(Request $request)
    {
        // $angka1=$request->jumlahhc;
        // $angka2=$request->jumlahsp;
        // $angka3=$request->jumlahgs;
        
        // DetailOrderMasak::create($request->all());
        $jumlah = DB::table('detail_order_masak')->select('jumlah')->where('id_bahan_product','=','PR00000000001')->distinct('id_bahan_product')->sum('jumlah');
        // $a=$jumlah->toArray();
        // $a=(int)$jumlah;
        // $real1=$jumlah + $angka1;
        DetailOrderMasak::where('id_bahan_product','PR00000000001')
                ->update([
                    
                    'jumlah' =>$jumlah + ($request->jumlahhc),
                    // 'jumlah' =>$real1 ,
                ]);
        $jumlah1 = DB::table('detail_order_masak')->select('jumlah')->where('id_bahan_product','=','PR00000000002')->distinct('id_bahan_product')->sum('jumlah');
        // $real2=$jumlah1 + $angka2;
        DetailOrderMasak::where('id_bahan_product','PR00000000002')
         ->update([
            'jumlah' =>$jumlah1 + ($request->jumlahsp),
            // 'jumlah' =>$real2 ,
        ]);
        
        $jumlah2 = DB::table('detail_order_masak')->select('jumlah')->where('id_bahan_product','=','PR00000000003')->distinct('id_bahan_product')->sum('jumlah');
        // $real3=$jumlah2+$angka3;
        DetailOrderMasak::where('id_bahan_product','PR00000000003')
        ->update([
            'jumlah' =>$jumlah2 + ($request->jumlahgs),
        // 'jumlah' =>$real3 ,
       ]);

        return redirect('/gudang-bumbu/kerjaharianadonangula');
    }

    public function tb(){

        $jumlah3 = DB::table('detail_order_masak')->distinct('id_bahan_product')->sum('jumlah');
        // echo $jumlah3;
        return view('gudangbumbu.kerjaharianadonangula',['jumlah3'=>$jumlah3]);
    }

    public function masuk(Request $request){

        $jumlah4 = DB::table('stock')->distinct('id_bahan_baku')->where('id_bahan_baku','=','BB000000002')->sum('stock');
        // echo $jumlah3;
        Stock::where('id_bahan_baku','=','BB000000002')
        ->update([
            'stock' =>$jumlah4+ ($request->kg),
        // 'jumlah' =>$real3 ,
       ]);
       return redirect('/gudang-bumbu/kerjaharianadonangula');
    }
}

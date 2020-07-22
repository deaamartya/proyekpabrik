<?php

namespace App\Http\Controllers\managerproduksi;

use App\Http\Controllers\Controller;

use App\Models\Gudang;
use App\Models\Supplier;
use App\Models\BahanBaku;
use App\Models\Penerimaan;
use App\Models\PenerimaanSupplier;
use App\Models\DetailTransaksi;
use App\Models\DetailSusut;

use Illuminate\Http\Request;
use DB;
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
        /*
        $historypenerimaan = Penerimaan::select('penerimaan.id_transaksi', 'bahan_baku.nama AS nama_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', 'tipe_bahan_baku.nama AS nama_tipe_bahan_baku')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'tipe_bahan_baku.id_bahan_baku' )
                    ->orderBy('id_bahan_baku', 'asc')
                    ->get();
                    */
        $historypenerimaan = Penerimaan::all();
        return view('managerproduksi.penerimaan.history_penerimaan')->with(compact('historypenerimaan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $gudang = Gudang::all(); 
        $supplier = Supplier::all(); 
        $bahanbaku = BahanBaku::select('bahan_baku.id_bahan_baku', 'bahan_baku.nama AS nama_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', 'tipe_bahan_baku.nama AS nama_tipe_bahan_baku')
                    ->join('tipe_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', '=', 'tipe_bahan_baku.id_tipe_bahan_baku' )
                    ->orderBy('id_bahan_baku', 'asc')
                    ->get();
       
        return view('managerproduksi.penerimaan.create_penerimaan')->with(compact('gudang', 'supplier', 'bahanbaku'));
        
        //return view('managerproduksi.penerimaan.create_penerimaan');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_bahan_baku' => 'required',
            'nomor_kontainer' => 'required',
            'nomor_polisi' => 'required',
            'berat_surat_jalan' => 'required',
            'berat_aktual' => 'required'
        

        ]);

        $id= (DB::table('penerimaan')->count());
            if($id >= 1){
                $x = str_pad($id+1, 15, "0", STR_PAD_LEFT);
                $id_penerimaan= "PEN".$x;
            }
            else{
                $y = str_pad(1, 15, "0", STR_PAD_LEFT);
                $id_penerimaan= "PEN".$y;
            }


        $penerimaan = new Penerimaan;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();

         
        $penerimaan_supplier = new PenerimaanSupplier;
        $penerimaan_supplier->id_penerimaan= $id_penerimaan;
        $penerimaan_supplier->id_supplier= $request->id_supplier;
        $penerimaan_supplier->berat_surat_jalan= $request->berat_surat_jalan;
        $penerimaan_supplier->berat_aktual= $request->berat_aktual;
        $penerimaan_supplier->nomor_kontainer= $request->nomor_kontainer;
        $penerimaan_supplier->nomor_polisi= $request->nomor_polisi;
        $penerimaan_supplier->save();

        $id= (DB::table('detail_transaksi')->count());
            if($id >= 1){
                $x = str_pad($id+1, 9, "0", STR_PAD_LEFT);
                $id_detail_transaksi= "DT".$x;
            }
            else{
                 $x = str_pad(1, 9, "0", STR_PAD_LEFT);
                $id_detail_transaksi= "DT".$x;
            }

        
        $detail_transaksi = new DetailTransaksi;
        $detail_transaksi->id_satuan = 1;
        $detail_transaksi->id_transaksi = $request->id_transaksi;
        $detail_transaksi->jumlah = $request->berat_surat_jalan;
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->flag = 1;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = new DetailSusut;
        $detail_susut->id_detail_transaksi = $id_detail_transaksi;
        $detail_susut->nama = "penerimaan";
        $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
        $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_transaksi->save();
        



        return redirect('/penerimaan/history_penerimaan');
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
        
        $gudang = Gudang::all(); 
        $supplier = Supplier::all(); 
        return view('managerproduksi.penerimaan.edit_penerimaan' , ['id_penerimaan' => $id])->with(compact('gudang', 'supplier'));
        
        //return view('managerproduksi.penerimaan.edit_penerimaan' , ['id_penerimaan' => $id]);
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

         $id= (DB::table('penerimaan')->count());
            if($id >= 1){
                $x = str_pad($id+1, 15, "0", STR_PAD_LEFT);
                $id_penerimaan= "PEN".$x;
            }
            else{
                $y = str_pad(1, 15, "0", STR_PAD_LEFT);
                $id_penerimaan= "PEN".$y;
            }

        $no = 1; 
        $pdf =  PDF::loadView('managerproduksi.penerimaan.cetak_barcode', compact('id_penerimaan', 'no')); 
        $pdf->setPaper('a4',  'potrait'); 
        return $pdf->stream(); 
    }

    


}

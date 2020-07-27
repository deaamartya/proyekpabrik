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
        
        $historypenerimaan = Penerimaan::select('penerimaan.id_penerimaan' ,'penerimaan.id_transaksi', 'bahan_baku.nama AS nama_bahan_baku', 'penerimaan.timestamp','penerimaan.status_simpan' ,'detail_transaksi.jumlah', 'penerimaan.id_jenis_penerimaan',  'penerimaan.id_gudang')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'penerimaan.id_penerimaan')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'detail_transaksi.id_bahan_baku' )
                    ->get();

       

                    
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

            $id= (DB::table('penerimaan')->count());
            
            if($id >= 1){
                $x = str_pad($id+1, 15, "0", STR_PAD_LEFT);
                $id_penerimaan= "PEN".$x;
            }
            else{
                $y = str_pad(1, 15, "0", STR_PAD_LEFT);
                $id_penerimaan= "PEN".$y;
            }
       
        return view('managerproduksi.penerimaan.create_penerimaan')->with(compact('gudang', 'supplier', 'bahanbaku', 'id_penerimaan'));
        
        //return view('managerproduksi.penerimaan.create_penerimaan');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_sementara1(Request $request)
    {
         $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_supplier' => 'required',
            'id_bahan_baku' => 'required',
            'nomor_kontainer' => 'required',
            'nomor_polisi' => 'required',
            'berat_surat_jalan' => 'required'
        

        ]);

        

            


        $penerimaan = new Penerimaan;
        $penerimaan->status_simpan = 0;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();


         
        $penerimaan_supplier = new PenerimaanSupplier;
        $penerimaan_supplier->id_penerimaan= $request->id_penerimaan;
        $penerimaan_supplier->id_supplier= $request->id_supplier;
        $penerimaan_supplier->berat_surat_jalan= $request->berat_surat_jalan;

        if (empty($request->berat_aktual)) {
            $penerimaan_supplier->berat_aktual=0;
          
        }
        else{
            $penerimaan_supplier->berat_aktual= $request->berat_aktual;
           
        }

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
        $detail_transaksi->id_transaksi = $request->id_penerimaan;
        if (empty($request->berat_aktual)) {
            $detail_transaksi->jumlah = 0;
        }
        else{
            $detail_transaksi->jumlah = $request->berat_aktual;
        }
        
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = new DetailSusut;
        $detail_susut->id_detail_transaksi = $id_detail_transaksi;
        $detail_susut->nama = "penerimaan";
        if (empty($request->berat_susut_kg )) {
            $detail_susut->berat_susut_kg = 0;
            $detail_susut->berat_susut_persen = 0 ;
        }
        else{
            $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
            $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        }
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_susut->save();

        return redirect('/penerimaan/history_penerimaan');



    }



      public function store_sementara2(Request $request)
    {
         $request->validate  
        ([  'id_transaksi2' => 'required|max:18',
            'id_jenis_penerimaan2' => 'required',
            'id_gudang2' => 'required',
            'id_bahan_baku2' => 'required',
            'berat_surat_jalan2' => 'required'
    
        ]);



        $penerimaan = new Penerimaan;
        $penerimaan->status_simpan = 0;
        $penerimaan->id_transaksi = $request->id_transaksi2;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan2;
        $penerimaan->id_gudang = $request->id_gudang2;
        $penerimaan->save();




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
        $detail_transaksi->id_transaksi = $request->id_penerimaan;
         if (empty($request->berat_aktual2)) {
            $detail_transaksi->jumlah = 0;
          
        }
        else{
            $detail_transaksi->jumlah = $request->berat_aktual2;
           
        }
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku2;
        $detail_transaksi->save();

        $detail_susut = new DetailSusut;
        $detail_susut->id_detail_transaksi = $id_detail_transaksi;
        $detail_susut->nama = "penerimaan";
         if (empty($request->berat_susut_kg2)) {
            $detail_susut->berat_susut_kg = 0;
            $detail_susut->berat_susut_persen = 0 ;
        }
        else{
            $detail_susut->berat_susut_kg = $request->berat_susut_kg2 ;
            $detail_susut->berat_susut_persen = $request->berat_susut_persen2;
        }
        $detail_susut->berat_kirim = $request->berat_surat_jalan2 ;
        $detail_susut->save();
        


        return redirect('/penerimaan/history_penerimaan');
    }

     public function store1(Request $request)
    {
         $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_supplier' => 'required',
            'id_bahan_baku' => 'required',
            'nomor_kontainer' => 'required',
            'nomor_polisi' => 'required',
            'berat_surat_jalan' => 'required',
            'berat_aktual' => 'required',
            'berat_susut_kg' => 'required|min:0',
            'berat_susut_persen' => 'required|min:0'
        
        ]);

        



        $penerimaan = new Penerimaan;
        $penerimaan->status_simpan = 1;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();


         
        $penerimaan_supplier = new PenerimaanSupplier;
        $penerimaan_supplier->id_penerimaan= $request->id_penerimaan;
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
        $detail_transaksi->id_transaksi =$request->id_penerimaan;
        $detail_transaksi->jumlah = $request->berat_aktual;
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = new DetailSusut;
        $detail_susut->id_detail_transaksi = $id_detail_transaksi;
        $detail_susut->nama = "penerimaan";
        $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
        $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_susut->save();

        return redirect('/penerimaan/history_penerimaan')->with('alert_simpan', 'Data Berhasil Disimpan.');
       


    }

      public function store2(Request $request)
    {
         $request->validate  
        ([  'id_transaksi2' => 'required|max:18',
            'id_jenis_penerimaan2' => 'required',
            'id_gudang2' => 'required',
            'id_bahan_baku2' => 'required',
            'berat_surat_jalan2' => 'required',
            'berat_aktual2' => 'required',
            'berat_susut_kg2' => 'required|min:0',
            'berat_susut_persen2' => 'required|min:0'
    
        ]);


        $penerimaan = new Penerimaan;
        $penerimaan->status_simpan = 1;
        $penerimaan->id_transaksi = $request->id_transaksi2;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan2;
        $penerimaan->id_gudang = $request->id_gudang2;
        $penerimaan->save();




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
        $detail_transaksi->id_transaksi = $request->id_penerimaan;
        $detail_transaksi->jumlah = $request->berat_aktual2;
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku2;
        $detail_transaksi->save();

        $detail_susut = new DetailSusut;
        $detail_susut->id_detail_transaksi = $id_detail_transaksi;
        $detail_susut->nama = "penerimaan";
        $detail_susut->berat_susut_kg = $request->berat_susut_kg2 ;
        $detail_susut->berat_susut_persen = $request->berat_susut_persen2 ;
        $detail_susut->berat_kirim = $request->berat_surat_jalan2 ;
        $detail_susut->save();
        
        return redirect('/penerimaan/history_penerimaan')->with('alert_simpan2', 'Data Berhasil Disimpan.');
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
    public function edit1($id)
    {
        
        $gudang = Gudang::all(); 
        $supplier = Supplier::all(); 
        $bahanbaku = BahanBaku::select('bahan_baku.id_bahan_baku', 'bahan_baku.nama AS nama_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', 'tipe_bahan_baku.nama AS nama_tipe_bahan_baku')
                    ->join('tipe_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', '=', 'tipe_bahan_baku.id_tipe_bahan_baku' )
                    ->orderBy('id_bahan_baku', 'asc')
                    ->get();
        $penerimaan_supplier = PenerimaanSupplier::where('id_penerimaan', $id)->first();
        $penerimaan= Penerimaan::select('penerimaan.id_penerimaan', 'penerimaan.timestamp' , 'penerimaan.id_gudang','penerimaan.id_transaksi', 'penerimaan.id_jenis_penerimaan' , 'detail_transaksi.id_bahan_baku' , 'bahan_baku.nama AS nama_bahan_baku')
                        ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'penerimaan.id_penerimaan')
                        ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'detail_transaksi.id_bahan_baku')
                        ->where('penerimaan.id_penerimaan',$id)
                        ->first();

        $detail_transaksi = DetailTransaksi::select('detail_susut.berat_susut_kg AS berat_susut_kg',  'detail_susut.berat_susut_persen AS berat_susut_persen')
                        ->join('detail_susut', 'detail_transaksi.id_detail_transaksi', '=', 'detail_susut.id_detail_transaksi')
                        ->where('detail_transaksi.id_transaksi',$id)
                        ->first();

                    //echo $penerimaan;    
        return view('managerproduksi.penerimaan.edit_penerimaan_supplier')->with(compact('gudang', 'supplier', 'bahanbaku', 'penerimaan', 'penerimaan_supplier', 'detail_transaksi'));
        
    }

    public function edit2($id)
    {
        
        $gudang = Gudang::all(); 
        $bahanbaku = BahanBaku::select('bahan_baku.id_bahan_baku', 'bahan_baku.nama AS nama_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', 'tipe_bahan_baku.nama AS nama_tipe_bahan_baku')
                    ->join('tipe_bahan_baku', 'bahan_baku.id_tipe_bahan_baku', '=', 'tipe_bahan_baku.id_tipe_bahan_baku' )
                    ->orderBy('id_bahan_baku', 'asc')
                    ->get();

        $penerimaan= Penerimaan::select('penerimaan.id_penerimaan', 'penerimaan.timestamp' , 'penerimaan.id_gudang','penerimaan.id_transaksi', 'penerimaan.id_jenis_penerimaan', 'detail_transaksi.id_bahan_baku', 'detail_transaksi.jumlah AS berat_aktual' , 'bahan_baku.nama AS nama_bahan_baku')
                        ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'penerimaan.id_penerimaan')
                        ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'detail_transaksi.id_bahan_baku')
                        ->where('id_penerimaan', $id)
                        ->first();

         $detail_transaksi = DetailTransaksi::select('detail_susut.berat_susut_kg AS berat_susut_kg',  'detail_susut.berat_susut_persen AS berat_susut_persen', 'detail_susut.berat_kirim AS berat_surat_jalan')
                        ->join('detail_susut', 'detail_transaksi.id_detail_transaksi', '=', 'detail_susut.id_detail_transaksi')
                        ->where('detail_transaksi.id_transaksi',$id)
                        ->first();

        return view('managerproduksi.penerimaan.edit_penerimaan_pemindahanbahan')->with(compact('gudang', 'bahanbaku', 'penerimaan', 'detail_transaksi'));
        
    }

    public function update_sementara1(Request $request, $id)
    {
        $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_supplier' => 'required',
            'id_bahan_baku' => 'required',
            'nomor_kontainer' => 'required',
            'nomor_polisi' => 'required',
            'berat_surat_jalan' => 'required'
        
        ]);
        
        $penerimaan = Penerimaan::find($id);
        $penerimaan->status_simpan = 0;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();



        $penerimaan_supplier = PenerimaanSupplier::find($id);
        $penerimaan_supplier->id_supplier= $request->id_supplier;
        $penerimaan_supplier->berat_surat_jalan= $request->berat_surat_jalan;
        if (empty($request->berat_aktual)) {
            $penerimaan_supplier->berat_aktual=0;
          
        }
        else{
            $penerimaan_supplier->berat_aktual= $request->berat_aktual;
           
        }
        $penerimaan_supplier->nomor_kontainer= $request->nomor_kontainer;
        $penerimaan_supplier->nomor_polisi= $request->nomor_polisi;
        $penerimaan_supplier->save();

        $detail_transaksi = DetailTransaksi::where('id_transaksi', $id)->first();
        $detail_transaksi->id_satuan = 1;

        if (empty($request->berat_aktual)) {
            $detail_transaksi->jumlah = 0;
        }
        else{
            $detail_transaksi->jumlah = $request->berat_aktual;
        }
        
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = DetailSusut::where('id_detail_transaksi', $detail_transaksi->id_detail_transaksi)->first();
        $detail_susut->nama = "penerimaan";
        if (empty($request->berat_susut_kg )) {
            $detail_susut->berat_susut_kg = 0;
            $detail_susut->berat_susut_persen = 0 ;
        }
        else{
            $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
            $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        }
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_susut->save();

        return redirect('/penerimaan/history_penerimaan');

    }

     public function update_sementara2(Request $request, $id)
    {
        $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_bahan_baku' => 'required',
            'berat_surat_jalan' => 'required'
        
        ]);
        
        $penerimaan = Penerimaan::find($id);
        $penerimaan->status_simpan = 0;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();

        $detail_transaksi = DetailTransaksi::where('id_transaksi', $id)->first();
        $detail_transaksi->id_satuan = 1;
        
        if (empty($request->berat_aktual)) {
            $detail_transaksi->jumlah = 0;
        }
        else{
            $detail_transaksi->jumlah = $request->berat_aktual;
        }
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = DetailSusut::where('id_detail_transaksi', $detail_transaksi->id_detail_transaksi)->first();
        $detail_susut->nama = "penerimaan";
        if (empty($request->berat_susut_kg )) {
            $detail_susut->berat_susut_kg = 0;
            $detail_susut->berat_susut_persen = 0 ;
        }
        else{
            $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
            $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        }
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_susut->save();

        return redirect('/penerimaan/history_penerimaan');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_supplier' => 'required',
            'id_bahan_baku' => 'required',
            'nomor_kontainer' => 'required',
            'nomor_polisi' => 'required',
            'berat_surat_jalan' => 'required',
            'berat_aktual' => 'required',
            'berat_susut_kg' => 'required|min:0',
            'berat_susut_persen' => 'required|min:0'
        
        ]);
        
        $penerimaan = Penerimaan::find($id);
        $penerimaan->status_simpan = 1;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();

        $penerimaan_supplier = PenerimaanSupplier::find($id);
        $penerimaan_supplier->id_supplier= $request->id_supplier;
        $penerimaan_supplier->berat_surat_jalan= $request->berat_surat_jalan;
        $penerimaan_supplier->berat_aktual= $request->berat_aktual;
        $penerimaan_supplier->nomor_kontainer= $request->nomor_kontainer;
        $penerimaan_supplier->nomor_polisi= $request->nomor_polisi;
        $penerimaan_supplier->save();

        $detail_transaksi = DetailTransaksi::where('id_transaksi', $id)->first();
        $detail_transaksi->id_satuan = 1;
        $detail_transaksi->jumlah = $request->berat_aktual;
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = DetailSusut::where('id_detail_transaksi', $detail_transaksi->id_detail_transaksi)->first();
        $detail_susut->nama = "penerimaan";
        $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
        $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_susut->save();

        return redirect('/penerimaan/history_penerimaan')->with('alert_update', 'Data Berhasil Diupdate.');

    }

     public function update2(Request $request, $id)
    {
        $request->validate  
        ([  'id_transaksi' => 'required|max:18',
            'id_jenis_penerimaan' => 'required',
            'id_gudang' => 'required',
            'id_bahan_baku' => 'required',
            'berat_surat_jalan' => 'required',
            'berat_aktual' => 'required',
            'berat_susut_kg' => 'required|min:0',
            'berat_susut_persen' => 'required|min:0'
        
        ]);
        
        $penerimaan = Penerimaan::find($id);
        $penerimaan->status_simpan = 1;
        $penerimaan->id_transaksi = $request->id_transaksi;
        $penerimaan->id_jenis_penerimaan = $request->id_jenis_penerimaan;
        $penerimaan->id_gudang = $request->id_gudang;
        $penerimaan->save();

        $detail_transaksi = DetailTransaksi::where('id_transaksi', $id)->first();
        $detail_transaksi->id_satuan = 1;
        $detail_transaksi->jumlah = $request->berat_aktual;
        $detail_transaksi->id_jenis_transaksi = 3;
        $detail_transaksi->id_bahan_baku = $request->id_bahan_baku;
        $detail_transaksi->save();

        $detail_susut = DetailSusut::where('id_detail_transaksi', $detail_transaksi->id_detail_transaksi)->first();
        $detail_susut->nama = "penerimaan";
        $detail_susut->berat_susut_kg = $request->berat_susut_kg ;
        $detail_susut->berat_susut_persen = $request->berat_susut_persen ;
        $detail_susut->berat_kirim = $request->berat_surat_jalan ;
        $detail_susut->save();

        return redirect('/penerimaan/history_penerimaan')->with('alert_update2', 'Data Berhasil Diupdate.');

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

    public  function printBarcode($id){ 
        
        $id_penerimaan= $id;
        $pdf =  PDF::loadView('managerproduksi.penerimaan.cetak_barcode', compact('id_penerimaan')); 
        $pdf->setPaper('a4',  'potrait'); 
        return $pdf->stream(); 
    }

   

    


}

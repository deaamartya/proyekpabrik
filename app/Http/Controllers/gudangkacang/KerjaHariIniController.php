<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use App\Models\KerjaHarianGroup;
// use App\Models\RekapKerjaHarianGroup;
// use App\Models\DetailRekapKerjaHarianGroup;
use App\Models\Stock;
use App\Models\GroupKerja;

use DB;

class KerjaHariIniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $req)
    {
        if($req->ajax()){
            
            $data = json_decode($req->data);

            DB::transaction(function() use ($data){

                //Kacang Keluar
                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000003',
                    'id_transaksi' => 'TR0000000000000004',
                    'keterangan' => 'Kacang OB Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->penerimaan_ob;
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000005',
                    'keterangan' => 'Kacang HC Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->penerimaan_hc,
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000005',
                    'id_transaksi' => 'TR0000000000000006',
                    'keterangan' => 'Kacang 8 ML Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->penerimaan_8ml,
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                //Hasil Sortir
                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000007',
                    'keterangan' => 'Kacang GS Masuk',
                    'masuk' => $data[0]->hasil_gs,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000008',
                    'keterangan' => 'Kacang SP Masuk',
                    'masuk' => $data[0]->hasil_sp,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000009',
                    'keterangan' => 'Kacang HC Masuk',
                    'masuk' => $data[0]->hasil_hc,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000010',
                    'keterangan' => 'Telor Masuk',
                    'masuk' => $data[0]->hasil_telor,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '9'
                ]);

                //Kacang Sortir Keluar
                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000011',
                    'keterangan' => 'Kacang GS Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->sortir_gs,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000012',
                    'keterangan' => 'Kacang SP Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->sortir_sp,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000013',
                    'keterangan' => 'Kacang HC Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->sortir_hc,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => 'TR0000000000000014',
                    'keterangan' => 'Telor Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->sortir_telor,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                //Group Kerja
                GroupKerja::insert([
                    'id_gudang' => '9',
                    'nama' => 'Sortir Kacang',
                    'jumlah_personil' => $data[0]->pekerja,
                    'level' => 0,
                    'parent_id_grup_kerja' => ''
                ]);

                //Rekap Stock
            });
        return response()->json(['success' => true]);
        }
        
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

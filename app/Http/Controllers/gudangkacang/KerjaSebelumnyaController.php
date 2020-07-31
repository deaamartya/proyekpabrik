<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Stock;
use App\Models\GroupKerja;
use App\Models\BahanBaku;
use App\Models\DetailRekap;

class KerjaSebelumnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stockob = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000004')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();
        
        $stockhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000005')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $stock8ml = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000006')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasilgs = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('stock.keterangan','like', '%GS%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasilsp = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('stock.keterangan','like', '%SP%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasilhc = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('stock.keterangan','like', '%HC%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $hasiltelor = Stock::select('stock.masuk')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
                    ->where('stock.keterangan','like', '%Telor%')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirgs = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000011')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirsp = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000012')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirhc = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000013')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();

        $sortirtelor = Stock::select('stock.keluar')
                    ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku' )
                    ->join('gudang', 'gudang.id_gudang', '=', 'stock.id_gudang')
                    ->where('stock.id_transaksi', '=', 'TR0000000000000014')
                    ->whereDate('stock.timestamp', $request->date)
                    ->get();
        
        $kacangbs = DetailRekap::select('detail_rekap.berat_bs')
                    ->join('detail_transaksi', 'detail_rekap.id_detail_transaksi', '=', 'detail_transaksi.id_detail_transaksi')
                    ->where('id_jenis_transaksi', '=', '5')
                    ->whereDate('detail_transaksi.timestamp', $request->date)
                    ->get();

        $grupkerja = GroupKerja::select('group_kerja.jumlah_personil')
                    ->join('kerja_harian_group', 'group_kerja.id_group_kerja', '=', 'kerja_harian_group.id_group_kerja')
                    ->whereDate('kerja_harian_group.tanggal', $request->date)
                    ->get();

                    return response()->json(['stockob'=>$stockob, 'stockhc'=>$stockhc, 'stock8ml'=>$stock8ml, 'hasilgs'=>$hasilgs, 'hasilsp'=>$hasilsp, 'hasilhc'=>$hasilhc, 'hasiltelor'=>$hasiltelor, 'sortirgs'=>$sortirgs, 'sortirsp'=>$sortirsp, 'sortirhc'=>$sortirhc, 'sortirtelor'=>$sortirtelor, 'grupkerja'=>$grupkerja, 'kacangbs'=>$kacangbs]);
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

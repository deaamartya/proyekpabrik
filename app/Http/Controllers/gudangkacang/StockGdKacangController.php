<?php

namespace App\Http\Controllers\gudangkacang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\stock;
use App\Models\DetailTransaksi;
use App\Models\Penerimaan;
use DB;
use Auth;
use App\Models\PemindahanBahan;

class StockGdKacangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function select()
    {
        $ob = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang OB','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc')->paginate(10);

        $tujuhML = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 7 ml','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc')->paginate(10);
        
        $delapanML = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 8 ml','stock.id_gudang' => '9'])
              ->orderBy('stock.timestamp','asc')->paginate(10);

        return view('gudangkacang.gd_kacang', ['ob'=>$ob, 'tujuhML'=>$tujuhML, 'delapanML'=>$delapanML]);
    }

    public function selectSortir(){
        $gs = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'GS'.'%')
              ->orderBy('stock.timestamp','asc')->paginate(10);
        $sp = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'SP'.'%')
              ->orderBy('stock.timestamp','asc')->paginate(10);
        $hc = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'HC'.'%')
              ->orderBy('stock.timestamp','asc')->paginate(10);
        $telor = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '10'])
              ->where('stock.keterangan', 'LIKE', '%'.'Telor'.'%')
              ->orderBy('stock.timestamp','asc')->paginate(10);

        return view('gudangkacang.gd_kacang_sortir', ['gs'=>$gs, 'sp'=>$sp, 'hc'=>$hc,'telor' => $telor]);
    }



    public function insertOB(Request $request)
    {
        Penerimaan::insert([
            'id_transaksi' => $request->barcode,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 9,
            'status_simpan' => 2,
            'timestamp' => $request->tanggal_penerimaan_kacang." ".date("H:i:s")
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'id_bahan_baku' => 'BB000000003',
            'keterangan' => 'Dari penerimaan kacang OB',
            'masuk' => $request->jumlah,
            'keluar' => 0,
            'id_gudang' => 9
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'jumlah' => $request->jumlah,
            'id_bahan_baku' => 'BB000000003',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang');
    }

    public function insert7ml(Request $request)
    {
        Penerimaan::insert([
            'id_transaksi' => $request->barcode,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 9,
            'status_simpan' => 2,
            'timestamp' => $request->tanggal_penerimaan_kacang." ".date("H:i:s")
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'id_bahan_baku' => 'BB000000004',
            'keterangan' => 'Dari penerimaan kacang 7ml',
            'masuk' => $request->jumlah,
            'keluar' => 0,
            'id_gudang' => 9
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'jumlah' => $request->jumlah,
            'id_bahan_baku' => 'BB000000004',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang');
    }

    public function insert8ml(Request $request)
    {
        Penerimaan::insert([
            'id_transaksi' => $request->barcode,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 9,
            'status_simpan' => 2,
            'timestamp' => $request->tanggal_penerimaan_kacang." ".date("H:i:s")
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'id_bahan_baku' => 'BB000000005',
            'keterangan' => 'Dari penerimaan kacang 8ml',
            'masuk' => $request->jumlah,
            'keluar' => 0,
            'id_gudang' => 9
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $request->barcode,
            'jumlah' => $request->jumlah,
            'id_bahan_baku' => 'BB000000005',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang');
    }

    public function filterDate(Request $req){
        $dateMin = str_replace('/', '-', $req->dateMin);
        $dateMin = date("Y-m-d",strtotime($dateMin));
        $dateMax = str_replace('/', '-', $req->dateMax);
        $dateMax = date("Y-m-d",strtotime($dateMax));

        if($req->jenis == "OB"){
            $ob = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang OB','stock.id_gudang' => '9'])
              ->whereBetween(DB::raw('DATE(penerimaan.TIMESTAMP)'),[$dateMin,$dateMax])
              ->orderBy('stock.timestamp','asc')->get();
            return response()->json(['success' => true,'stock' => $ob]);
        }

        if($req->jenis == "7ml"){
            $tujuhML = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 7 ml','stock.id_gudang' => '9'])
              ->whereBetween(DB::raw('DATE(penerimaan.TIMESTAMP)'),[$dateMin,$dateMax])
              ->orderBy('stock.timestamp','asc')->get();
              return response()->json(['success' => true,'stock' => $tujuhML]);
        }

        if($req->jenis == "8ml"){
            $delapanML = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang 8ml','stock.id_gudang' => '9'])
              ->whereBetween(DB::raw('DATE(penerimaan.TIMESTAMP)'),[$dateMin,$dateMax])
              ->orderBy('stock.timestamp','asc')->get();
              return response()->json(['success' => true,'stock' => $delapanML]);
        }

        if($req->jenis == "GS" || $req->jenis == "SP" || $req->jenis == "HC" || $req->jenis == "Telor"){
            $ks = stock::select('stock.timestamp', 'penerimaan.TIMESTAMP', 'stock.keterangan', 'stock.masuk', 'stock.keluar', 'stock.stock')
              ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'stock.id_transaksi')
              ->join('penerimaan', 'penerimaan.id_transaksi', '=', 'stock.id_transaksi')
              ->join('bahan_baku', 'bahan_baku.id_bahan_baku', '=', 'stock.id_bahan_baku')
              ->where(['bahan_baku.nama' => 'Kacang Sortir','stock.id_gudang' => '9'])
              ->where('stock.keterangan', 'LIKE', '%'.$req->jenis.'%')
              ->whereBetween(DB::raw('DATE(penerimaan.TIMESTAMP)'),[$dateMin,$dateMax])
              ->orderBy('stock.timestamp','asc')->get();
              return response()->json(['success' => true,'stock' => $ks]);
        }        
    }

    public function insertGS(Request $request)
    {
        PemindahanBahan::insert([
            'id_gudang_asal' => 1,
            'id_gudang_tujuan' => 10,
            'id_pegawai' => Auth::user()->id_pegawai,
        ]);

        $id_pb = PemindahanBahan::select('id_pemindahan_bahan')->where('id_gudang_tujuan','=',10)->orderBy('timestamp','desc')->first();


        Penerimaan::insert([
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 10,
            'status_simpan' => 2,
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_bahan_baku' => 'BB000000010',
            'keterangan' => 'Kacang GS Masuk',
            'masuk' => $request->berat_gs,
            'keluar' => 0,
            'id_gudang' => 10
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'jumlah' => $request->berat_gs,
            'id_bahan_baku' => 'BB000000010',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang_sortir');
    }

    public function insertSP(Request $request)
    {
        PemindahanBahan::insert([
            'id_gudang_asal' => 1,
            'id_gudang_tujuan' => 10,
            'id_pegawai' => Auth::user()->id_pegawai,
        ]);

        $id_pb = PemindahanBahan::select('id_pemindahan_bahan')->where('id_gudang_tujuan','=',10)->orderBy('timestamp','desc')->first();


        Penerimaan::insert([
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 10,
            'status_simpan' => 2,
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_bahan_baku' => 'BB000000010',
            'keterangan' => 'Kacang SP Masuk',
            'masuk' => $request->berat_sp,
            'keluar' => 0,
            'id_gudang' => 10
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'jumlah' => $request->berat_sp,
            'id_bahan_baku' => 'BB000000010',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang_sortir');
    }

    public function insertHC(Request $request)
    {
        PemindahanBahan::insert([
            'id_gudang_asal' => 1,
            'id_gudang_tujuan' => 10,
            'id_pegawai' => Auth::user()->id_pegawai,
        ]);

        $id_pb = PemindahanBahan::select('id_pemindahan_bahan')->where('id_gudang_tujuan','=',10)->orderBy('timestamp','desc')->first();


        Penerimaan::insert([
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 10,
            'status_simpan' => 2,
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_bahan_baku' => 'BB000000010',
            'keterangan' => 'Kacang HC Masuk',
            'masuk' => $request->berat_hc,
            'keluar' => 0,
            'id_gudang' => 10
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'jumlah' => $request->berat_hc,
            'id_bahan_baku' => 'BB000000010',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang_sortir');
    }

    public function insertTelor(Request $request)
    {
        PemindahanBahan::insert([
            'id_gudang_asal' => 1,
            'id_gudang_tujuan' => 10,
            'id_pegawai' => Auth::user()->id_pegawai,
        ]);

        $id_pb = PemindahanBahan::select('id_pemindahan_bahan')->where('id_gudang_tujuan','=',10)->orderBy('timestamp','desc')->first();


        Penerimaan::insert([
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_jenis_penerimaan' => 2,
            'id_gudang' => 10,
            'status_simpan' => 2,
        ]);

        stock::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'id_bahan_baku' => 'BB000000010',
            'keterangan' => 'Telor Masuk',
            'masuk' => $request->berat_telor,
            'keluar' => 0,
            'id_gudang' => 10
        ]);

        DetailTransaksi::insert([
            'id_satuan' => 1,
            'id_transaksi' => $id_pb->id_pemindahan_bahan,
            'jumlah' => $request->berat_telor,
            'id_bahan_baku' => 'BB000000010',
            'id_jenis_transaksi' => 3
        ]);

        return redirect('/gd_kacang_sortir');
    }
}

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
use App\Models\DetailTransaksi;
use App\Models\DetailRekap;
use App\Models\DetailRekapKerjaHarianGroup;
use App\Models\RekapKerjaHarianGroup;
use App\Models\KerjaHarianGroup;
use App\Models\Penerimaan;
use App\Models\PemindahanBahan;
use Auth;

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

                //Pemindahan Bahan
                PemindahanBahan::insert([
                    'timestamp' => date('Y-m-d H:i:s'),
                    'id_gudang_asal' => 9,
                    'id_gudang_tujuan' => 10,
                    'id_pegawai' => Auth::user()->id_pegawai,
                ]);

                $id_pb = PemindahanBahan::select('id_pemindahan_bahan')->where('id_gudang_tujuan','=',10)->orderBy('timestamp','desc')->first();

                //Input Penerimaan
                Penerimaan::insert([
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'id_jenis_penerimaan' => 2,
                    'id_gudang' => 10,
                    'status_simpan' => 1,
                ]);

                //Kacang Keluar
                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000003',
                    'id_transaksi' => 'TR0000000000000004',
                    'keterangan' => 'Kacang OB Keluar',
                    'masuk' => 0,
                    'keluar' => $data[0]->penerimaan_ob,
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
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'keterangan' => 'Kacang GS Masuk',
                    'masuk' => $data[0]->hasil_gs,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'keterangan' => 'Kacang SP Masuk',
                    'masuk' => $data[0]->hasil_sp,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'keterangan' => 'Kacang HC Masuk',
                    'masuk' => $data[0]->hasil_hc,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '10'
                ]);

                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000010',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'keterangan' => 'Telor Masuk',
                    'masuk' => $data[0]->hasil_telor,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '10'
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
                ]);

                $idgrupkerja = GroupKerja::select('id_group_kerja')->orderBy('id_gudang', 'desc')->first();

                KerjaHarianGroup::insert([
                    'id_group_kerja' => $idgrupkerja->id_group_kerja,
                    'tanggal' => date('Y-m-d'),
                    'id_pegawai' => 'null'
                ]);

                RekapKerjaHarianGroup::insert([
                    'timestamp' => date('Y-m-d H:i:s')
                ]);

                $idrekapkerja = RekapKerjaHarianGroup::select('id_rekap_kerja_harian_group')->orderBy('timestamp', 'desc')->first();
                $idkerjaharian = KerjaHarianGroup::select('id_kerja_harian_group')->orderBy('tanggal', 'desc')->first();

                DetailRekapKerjaHarianGroup::insert([
                    'id_kerja_harian_group' => $idkerjaharian->id_kerja_harian_group,
                    'id_rekap_kerja_harian_group' => $idrekapkerja->id_rekap_kerja_harian_group
                ]);


                //Detail Transaksi
                DetailTransaksi::insert([
                    'id_satuan' => '1',
                    'id_transaksi' => 'TR0000000000000015',
                    'jumlah' => $data[0]->bs,
                    'id_bahan_baku' => 'BB000000010',
                    'id_jenis_transaksi' => '5'
                ]);

                DetailTransaksi::insert([
                    'id_satuan' => '1',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'jumlah' => $data[0]->hasil_gs,
                    'id_bahan_baku' => 'BB000000010',
                    'id_jenis_transaksi' => '4'
                ]);

                DetailTransaksi::insert([
                    'id_satuan' => '1',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'jumlah' => $data[0]->hasil_sp,
                    'id_bahan_baku' => 'BB000000010',
                    'id_jenis_transaksi' => '4'
                ]);

                DetailTransaksi::insert([
                    'id_satuan' => '1',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'jumlah' => $data[0]->hasil_hc,
                    'id_bahan_baku' => 'BB000000010',
                    'id_jenis_transaksi' => '4'
                ]);

                DetailTransaksi::insert([
                    'id_satuan' => '1',
                    'id_transaksi' => $id_pb->id_pemindahan_bahan,
                    'jumlah' => $data[0]->hasil_telor,
                    'id_bahan_baku' => 'BB000000010',
                    'id_jenis_transaksi' => '4'
                ]);

                //Select
                $id = DetailTransaksi::select('id_detail_transaksi')->orderBy('timestamp', 'desc')->first();

                DetailRekap::insert([
                    'id_detail_transaksi' => $id->id_detail_transaksi,
                    'berat_wadah_kosong' => 0,
                    'berat_BS' => $data[0]->bs
                ]);

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

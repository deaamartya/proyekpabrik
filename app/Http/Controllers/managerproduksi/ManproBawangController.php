<?php

namespace App\Http\Controllers\managerproduksi;

use App\Models\OrderMasak;
use App\Models\Stock;
use App\Models\KerjaHarianGroup;
use App\Models\Pegawai;
use App\Models\DetailOrderMasak;
use App\Models\KupasBawang;
use App\Models\DetailTransaksi;
use App\Models\DetailKupasBawang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class ManproBawangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

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
        
        $orderkupasbawang = OrderMasak::select('order_masak.*','dom.jumlah AS jumlah')
        ->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'PR00000000005');
        })
        ->get();

        $stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000008')->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000008')->sum('keluar');
        $stock1c = $stock1a - $stock1b;


        return view('managerproduksi.gudang-bawang.home_gudangbawang')->with(compact('ordermasak', 'orderkupasbawang', 'stock1c'));
    }

    public function stock_bawangkulit()
    {

        $bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d %M %Y") AS tgl_terima') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where('keterangan','kulit')
                    ->get();
        return view('managerproduksi.gudang-bawang.stock_bawangkulit')->with(compact('bawangkulit'));
    }

     public function get_stock_bawangkulit(Request $req)
    {

         $stock_bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d %M %Y") AS tgl_terima') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                        ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                        ->where('keterangan','kulit')
                        ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                        ->exists();

        if($stock_bawangkulit){
            $stock_bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d %M %Y") AS tgl_terima') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                        ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                        ->where('keterangan','kulit')
                        ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                        ->get();
                        

            return response()->json(['error'=>false , 'stock_bawangkulit'=>$stock_bawangkulit]);

         }else{

          return response()->json(['error'=>true]);
      }

        
    }

    public function stock_bawangkupas()
    {
        $bawangkupas = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->where('keterangan','kupas')
                    ->get();
        return view('managerproduksi.gudang-bawang.stock_bawangkupas')->with(compact('bawangkupas'));
    }


      public function get_stock_bawangkupas(Request $req)
    {

         $stock_bawangkupas = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.masuk', 'stock.keluar' , 'stock.stock')
                        ->where('keterangan','kupas')
                        ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                        ->exists();

        if($stock_bawangkupas){
           $stock_bawangkupas = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.masuk', 'stock.keluar' , 'stock.stock')
                        ->where('keterangan','kupas')
                        ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                        ->get();
                        

            return response()->json(['error'=>false ,'stock_bawangkupas'=>$stock_bawangkupas]);

        }else{

          return response()->json(['error'=>true]);
      }

        
    }


    public function tenaga_kupas()
    {
        
        $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();

        if($tenagakupas){     
            $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
            $tenagakupas = json_decode($tenagakupas->id_pegawai);
            $arrtenaga = [];
            $i=0;
            foreach($tenagakupas as $t){
                $arrtenaga[$i] = Pegawai::where('id_pegawai','=',$t->id_pegawai)->first();

                $i++;
            }

          return view('managerproduksi.gudang-bawang.tenaga_kupas', ['tenagakupas' => $arrtenaga]);

        }else{

            return view('managerproduksi.gudang-bawang.tenaga_kupas');
        }   


       
    }

    public function pembagian_bawang()
    {

        $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();

        /* $id_det = DetailKupasBawang::select('dt.id_detail_transaksi')
                    ->join('detail_transaksi AS dt','dt.id_detail_transaksi','=','detail_kupas_bawang.id_detail_transaksi')
                    ->where('id_pegawai','=',$t->id_pegawai)
                    ->exists();
*/
        if($tenagakupas){ 

             $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
                $tenagakupas = json_decode($tenagakupas->id_pegawai);
                $arrtenaga = [];
                $jumlah = [];
                $i=0;
                foreach($tenagakupas as $t){
                    $id_det = DetailKupasBawang::select('dt.id_detail_transaksi')
                    ->join('detail_transaksi AS dt','dt.id_detail_transaksi','=','detail_kupas_bawang.id_detail_transaksi')
                    ->where('id_pegawai','=',$t->id_pegawai)
                    ->first();

                    $arrtenaga[$i] = Pegawai::where('id_pegawai','=',$t->id_pegawai)->first();

                    $id_det = $id_det->id_detail_transaksi;

                    $id_det = "DT".str_pad(intval(substr($id_det,2))-1,9,"0",STR_PAD_LEFT);
                    
                    $jumlah[$i] = DetailTransaksi::select('jumlah')->where('id_detail_transaksi','=',$id_det)->first();

                    $i++;
                }

            return view('managerproduksi.gudang-bawang.pembagian_bawang' ,['tenagakupas' => $arrtenaga, 'jumlah' => $jumlah]);

        }else{

            return view('managerproduksi.gudang-bawang.pembagian_bawang');
        } 

    }


    public function penerimaan_bawang()
    {

      $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();

      /* $id_det = DetailKupasBawang::select('dt.id_detail_transaksi','kulit')
                    ->join('detail_transaksi AS dt','dt.id_detail_transaksi','=','detail_kupas_bawang.id_detail_transaksi')
                    ->where('id_pegawai','=',$t->id_pegawai)
                    ->exists();
*/
        if($tenagakupas){ 
            $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
                
            $tenagakupas = json_decode($tenagakupas->id_pegawai);

            for($i=0;$i<count($tenagakupas);$i++){
                $pegawai[$i] = Pegawai::select('id_pegawai','nama')->where('id_pegawai','=',$tenagakupas[$i]->id_pegawai)->first();
            }

                foreach($pegawai as $t){

                    $id_det = DetailKupasBawang::select('dt.id_detail_transaksi','kulit')
                    ->join('detail_transaksi AS dt','dt.id_detail_transaksi','=','detail_kupas_bawang.id_detail_transaksi')
                    ->where('id_pegawai','=',$t->id_pegawai)
                    ->first();

                    $t->jumlahkulit = $id_det->kulit;

                    $jumlahbawang = DetailTransaksi::select('jumlah')->where('id_detail_transaksi','=',$id_det->id_detail_transaksi)->first();

                    $t->jumlahbawang = $jumlahbawang->jumlah;

                    $id_det = $id_det->id_detail_transaksi;

                    $id_det = "DT".str_pad(intval(substr($id_det,2))-1,9,"0",STR_PAD_LEFT);
                    
                    $jumlah = DetailTransaksi::select('jumlah')->where('id_detail_transaksi','=',$id_det)->first();

                    $t->jumlah = $jumlah->jumlah;
                    $t->idtr = $id_det;
                }

            return view('managerproduksi.gudang-bawang.penerimaan_bawang' ,['tenagakupas' => $pegawai]);

        }else{
           
            return view('managerproduksi.gudang-bawang.penerimaan_bawang');
        }

    }




    public function persiapan_masak()
    {

        $ordermasak = OrderMasak::select('order_masak.*','dom.*')
        ->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'BB000000008');
        })
        ->where('tanggal_order_masak','>=',date('Y-m-d'))
        ->exists();

        if($ordermasak){

            $ordermasak = OrderMasak::select('order_masak.*','dom.*')
            ->join('detail_order_masak AS dom', function ($join) {
                $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                     ->where('dom.id_bahan_product', '=', 'BB000000008');
            })
            ->where('tanggal_order_masak','>=',date('Y-m-d'))
            ->get();

            return view('managerproduksi.gudang-bawang.persiapan_masak')->with(compact('ordermasak'));

        }else{
             return view('managerproduksi.gudang-bawang.persiapan_masak');
        }
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

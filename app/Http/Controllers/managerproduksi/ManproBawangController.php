<?php

namespace App\Http\Controllers\managerproduksi;


use App\Models\Pegawai;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;
use App\Models\KerjaHarianGroup;
use App\Models\RekapKerjaHarianGroup;
use App\Models\DetailRekapKerjaHarianGroup;
use App\Models\Stock;
use App\Models\KupasBawang;
use App\Models\DetailTransaksi;
use App\Models\DetailKupasBawang;
use App\Models\RekapTransaksiHarianGudang;
use App\Models\SusutDlmProse;

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
        
        $orderkupasbawang = OrderMasak::select('order_masak.*','dom.jumlah AS jumlah', 'dom.presentase_status AS presentase_status')
        ->join('detail_order_masak AS dom', function ($join) {
            $join->on('order_masak.id_order_masak', '=', 'dom.id_order_masak')
                 ->where('dom.id_bahan_product', '=', 'BB000000008');
        })
        ->get();

        $stock1a = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000008')->sum('masuk');
        $stock1b = DB::table('stock')->where('id_bahan_baku', '=', 'BB000000008')->sum('keluar');
        $stock1c = $stock1a - $stock1b;


        return view('managerproduksi.gudang-bawang.home_gudangbawang')->with(compact('ordermasak', 'orderkupasbawang', 'stock1c'));
    }

    public function stock_bawangkulit()
    {
/*
        $bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d %M %Y") AS tgl_terima') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                    ->where('keterangan','kulit')
                    ->get();
*/
        $bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') , 'keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))->where('id_bahan_baku','BB000000006')->get();


        return view('managerproduksi.gudang-bawang.stock_bawangkulit')->with(compact('bawangkulit'));
    }

     public function get_stock_bawangkulit(Request $req)
    {
        /*

         $stock_bawangkulit = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') ,DB::raw('DATE_FORMAT(penerimaan.timestamp, "%d %M %Y") AS tgl_terima') , 'stock.keterangan', 'stock.masuk', 'stock.keluar' , 'stock.stock')
                        ->join('penerimaan','stock.id_transaksi' ,'=', 'penerimaan.id_penerimaan')
                        ->where('keterangan','kulit')
                        ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                        ->exists();
*/
                        
        $stock_bawangkulit  =  Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') , 'keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))
                            ->where('id_bahan_baku','BB000000006')
                            ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                            ->exists();           

        if($stock_bawangkulit){
           $stock_bawangkulit  =Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') , 'keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))
                            ->where('id_bahan_baku','BB000000006')
                            ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                            ->get();
                        

            return response()->json(['error'=>false , 'stock_bawangkulit'=>$stock_bawangkulit]);

         }else{

          return response()->json(['error'=>true]);
      }

        
    }

    public function stock_bawangkupas()
    {
        /*
        $bawangkupas = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal'), 'stock.masuk', 'stock.keluar' , 'stock.stock')
                    ->where('keterangan','kupas')
                    ->get();
*/
       

        $bawangkupas = Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') , 'keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))->where('id_bahan_baku','BB000000008')->get();
        
        return view('managerproduksi.gudang-bawang.stock_bawangkupas')->with(compact('bawangkupas'));
    }


      public function get_stock_bawangkupas(Request $req)
    {

         $stock_bawangkupas =Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') , 'keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))
                        ->where('id_bahan_baku','BB000000008')
                        ->whereBetween(DB::raw('DATE(stock.timestamp)'), array($req->tgl_awal, $req->tgl_akhir))
                        ->exists();

        if($stock_bawangkupas){
          $stock_bawangkupas =Stock::select(DB::raw('DATE_FORMAT(stock.timestamp, "%d/%m/%Y") AS tanggal') , 'keterangan','masuk','keluar',DB::raw('masuk - keluar as stocks'))
                        ->where('id_bahan_baku','BB000000008')
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

          return view('managerproduksi.gudang-bawang.tenaga_kupas', ['tenagakupas' => $arrtenaga, 'datakosong'=>false]);

        }else{

            return view('managerproduksi.gudang-bawang.tenaga_kupas', ['datakosong'=>true])->with('alert_datakosong', 'Data tenaga kupas untuk hari ini belum tersedia.');;
        }   


       
    }

    public function pembagian_bawang()
    {

/*
        $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();

    
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

        */



         $or = OrderMasak::join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                    ->where([
                        ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                        ['dom.jenis_order','=',1]
                    ])
                    ->exists();

        if($or == true){

            $or = OrderMasak::join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                    ->where([
                        ['order_masak.tanggal_order_masak','=',date('Y-m-d',strtotime('tomorrow'))],
                        ['dom.jenis_order','=',1]
                    ])
                    ->exists();
            if($or){
                // AMBIL JUMLAH ORDER BESOK
                $orderbesok = OrderMasak::select('dom.jumlah')
                ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                ->where([
                    ['order_masak.tanggal_order_masak','=',date('Y-m-d',strtotime('tomorrow'))],
                    ['dom.jenis_order','=',1]
                ])
                ->first();
                //AMBIL STOCK BAWANG KULIT
                $stockbawang = Stock::select('stock')->where([
                    ['id_gudang','=','7'],
                    ['id_bahan_baku','=','BB000000006']
                ])->orderBy('timestamp','DESC')->first();
                
                
                if($stockbawang != null){
                    // AMBIL JUMLAH STOCK BEBAS
                    $stockbebas = $stockbawang->stock - $orderbesok->jumlah;
                }
                else{
                    //return redirect('/gudang-bawang/home-bawang')->with('stock','Stock bawang kulit sedang kosong. Silahkan menambah stok terlebih dahulu.');
                  return view('managerproduksi.gudang-bawang.pembagian_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data pembagian bawang untuk hari ini belum tersedia.');

                    
                }
            }
            else{

                //AMBIL STOCK BAWANG KULIT
                $stockbawang = Stock::select('stock')->where([
                    ['id_gudang','=','7'],
                    ['id_bahan_baku','=','BB000000006']
                ])->orderBy('timestamp','DESC')->first();
                
                
                if($stockbawang != null){
                    // AMBIL JUMLAH STOCK BEBAS
                    $stockbebas = $stockbawang->stock - 0;
                    $orderbesok = OrderMasak::select('dom.jumlah')
                    ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                    ->where([
                        ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                        ['dom.jenis_order','=',1]
                    ])
                    ->first();
                    $orderbesok->jumlah = 0;
                }
                else{
                    //return redirect('/gudang-bawang/home-bawang')->with('stock','Stock bawang kulit sedang kosong. Silahkan menambah stok terlebih dahulu.');

                    return view('managerproduksi.gudang-bawang.pembagian_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data pembagian bawang untuk hari ini belum tersedia.');
                }

            }

            // AMBIL RATA-RATA SUSUT
            $id_rekap = RekapTransaksiHarianGudang::select('id_rekap_transaksi_gudang')->where('id_gudang','=','7')->get();
            $ratasusut = SusutDlmProse::join('rekap_transaksi_harian_gudang AS rh','rh.id_rekap_transaksi_gudang','=','susut_dlm_proses.id_rekap_transaksi_harian_gudang')->average('berat_susut_persen');
            if(!$ratasusut){
                $ratasusut = 0;
            }

            // AMBIL JUMLAH ORDER HARI INI
            $targetkupas = OrderMasak::select('dom.jumlah','tanggal_order_masak','dom.id_order_masak')
            ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
            ->where([
                ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                ['dom.jenis_order','=',1]
            ])
            ->first();

            /*

            // CEK APAKAH KERJA HARIAN UDAH DIBUAT ATAU BELUM
            $cekkerja = KerjaHarianGroup::where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();


            if(!$cekkerja){
                $tenagaaktif = Pegawai::select('id_pegawai')->where(['id_jabatan' => '2', 'status' => 1])->get();
                $json = json_encode($tenagaaktif);
                KerjaHarianGroup::insert([
                    'id_group_kerja' => 'G0000000001',
                    'tanggal' => date('Y-m-d'),
                    'id_pegawai' => $json,
                ]);
            }
            */

            // CEK APAKAH KUPAS BAWANG UDAH DIBUAT ATAU BELUM, ADA = SUDAH ADA DATA PEMBERIAN BAWANG
            $cek = KupasBawang::where('tanggal_beri',date('Y-m-d'))->exists();

            if($cek){
                // AMBIL TENAGA KUPAS
                $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
                $tenagakupas = json_decode($tenagakupas->id_pegawai);
                $arrtenaga = [];
                $jumlah = [];
                $i=0;
                foreach($tenagakupas as $t){
                    // AMBIL DETAIL TRANSAKSI UNTUK TENAGA KUPAS (BERI BAWANG)
                    $id_det = DetailKupasBawang::select('dt.id_detail_transaksi')
                    ->join('detail_transaksi AS dt','dt.id_detail_transaksi','=','detail_kupas_bawang.id_detail_transaksi')
                    ->where('id_pegawai','=',$t->id_pegawai)
                    ->first();

                    $arrtenaga[$i] = Pegawai::where('id_pegawai','=',$t->id_pegawai)->first();

                    $id_det = $id_det->id_detail_transaksi;

                    $id_det = "DT".str_pad(intval(substr($id_det,2))-1,9,"0",STR_PAD_LEFT);
                    
                     // AMBIL JUMLAH BAWANG YANG DIBERI PER TENAGA KUPAS
                    $jumlah[$i] = DetailTransaksi::select('jumlah')->where('id_detail_transaksi','=',$id_det)->first();

                    $i++;
                }

                 // AMBIL DATA TOTAL PROSES HARI INI
                $totalproses = Stock::select('keluar')->where([
                        ['id_satuan','=','1'],
                        ['id_bahan_baku','=','BB000000006'],
                        ['id_transaksi','=',$targetkupas->id_order_masak],
                        ['keterangan','=','Beri Bawang'],
                        ['id_gudang','=','7']
                    ])->orderBy('TIMESTAMP','desc')->first();

               

                return view('managerproduksi.gudang-bawang.pembagian_bawang',['tenagakupas' => $arrtenaga,'orderbesok' => $orderbesok,'stockbebas' => $stockbebas, 'ratasusut' => $ratasusut , 'targetkupas' => $targetkupas, 'cek' => $cek,'totalproses' => $totalproses,'jumlah' => $jumlah, 'datakosong'=>false]);
            }
            else{
                //$tenagakupas = Pegawai::select('*')->where('id_jabatan','=','2')->get();
                //return view('gudangbawang.pembagianbawang',['tenagakupas' => $tenagakupas,'orderbesok' => $orderbesok,'stockbebas' => $stockbebas, 'ratasusut' => $ratasusut , 'targetkupas' => $targetkupas, 'cek' => $cek]);

              
                return view('managerproduksi.gudang-bawang.pembagian_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data pembagian bawang untuk hari ini belum tersedia.');
            }
        }
        else{
            //return redirect('/gudang-bawang/home-bawang')->with('ordermasak','Order masak untuk hari ini belum tersedia. Silahkan membuat order masak terlebih dahulu.');
            
            return view('managerproduksi.gudang-bawang.pembagian_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data pembagian bawang untuk hari ini belum tersedia.');
        }

    }


    public function penerimaan_bawang()
    {

/*
      $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();


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


        */


/*
         $cekkerja = KerjaHarianGroup::where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();

        if(!$cekkerja){
            $tenagaaktif = Pegawai::select('id_pegawai')->where(['id_jabatan' => '2', 'status' => 1])->get();
            $json = json_encode($tenagaaktif);
            KerjaHarianGroup::insert([
                'id_group_kerja' => 'G0000000001',
                'tanggal' => date('Y-m-d'),
                'id_pegawai' => $json,
            ]);
        }
*/
        $cek = KupasBawang::where('tanggal_beri',date('Y-m-d'))->exists();

        if(!$cek){
            //return redirect('gudang-bawang/pembagian-bawang')->with('kupasbawang','Data Pembagian Bawang untuk hari ini belum dibuat. Silahkan simpan pembagian bawang terlebih dahulu');
          return view('managerproduksi.gudang-bawang.penerimaan_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data penerimaan bawang untuk hari ini belum tersedia.');
        }
        else{
            $idkerja = KerjaHarianGroup::select('id_kerja_harian_group')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
            $cek = DB::table('detail_rekap_kerja_harian_group')->where(['id_kerja_harian_group' => $idkerja->id_kerja_harian_group])->exists();

            $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->exists();


            if($tenagakupas){ 

              $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
                  
              $tenagakupas = json_decode($tenagakupas->id_pegawai);

              for($i=0;$i<count($tenagakupas);$i++){
                  $pegawai[$i] = Pegawai::select('id_pegawai','nama')->where('id_pegawai','=',$tenagakupas[$i]->id_pegawai)->first();
              }

            }else{
                return view('managerproduksi.gudang-bawang.penerimaan_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data penerimaan bawang untuk hari ini belum tersedia.');
            }

              $or = OrderMasak::select('order_masak.id_order_masak')
                  ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                  ->where([
                      ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                      ['dom.jenis_order','=',1]
                  ])
                  ->first();

            if($cek!=0){
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
                return view('managerproduksi.gudang-bawang.penerimaan_bawang',['tenagakupas' => $pegawai, 'datakosong'=>false]);
                
            }
            else{
                return view('managerproduksi.gudang-bawang.penerimaan_bawang', ['datakosong'=>true])->with('alert_datakosong', 'Data penerimaan bawang untuk hari ini belum tersedia.');
            }
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

            return view('managerproduksi.gudang-bawang.persiapan_masak', ['datakosong'=>false])->with(compact('ordermasak'));

        }else{
             return view('managerproduksi.gudang-bawang.persiapan_masak', ['datakosong'=>true])->with('alert_datakosong', 'Data persiapan masak kanji untuk hari ini belum tersedia.');
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

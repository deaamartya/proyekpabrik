<?php

namespace App\Http\Controllers\gudangbawang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
use DB;


class KerjaHarianController extends Controller
{
    public function tenagakupas(){
    	$tenagakupas = Pegawai::where('id_jabatan','=','2')->orderBy('nama','asc')->get();
    	$tenagaaktif = Pegawai::select('id_pegawai')->where(['id_jabatan' => '2', 'status' => 1])->get();
    	$json = json_encode($tenagaaktif);

    	$kerjahariangroup = KerjaHarianGroup::where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();

    	if($kerjahariangroup){
	    	$kerjahariangroup->id_pegawai = $json;
	    	$kerjahariangroup->save();
    	}
    	else{
    		KerjaHarianGroup::insert([
	    		'id_group_kerja' => 'G0000000001',
				'tanggal' => date('Y-m-d'),
				'id_pegawai' => $json,
	    	]);
	    	
	    }

    	return view('gudangbawang.tenagakupas',['tenagakupas' => $tenagakupas]);
    }

    public function addtenagakupas(Request $req){
    	if($req->ajax()){
    		$validatedData = $req->validate([
		        'nama' => 'required|unique:Pegawai|max:50',
		    ]);

	    	$pegawai = Pegawai::insert([
	            'id_gudang' => '7',
				'id_jabatan' => '2',
				'nama' => $req->nama,
				'status' => 1,
	        ]);

            $pegawai = Pegawai::where(['id_jabatan' => '2', 'status' => 1])->orderBy('id_pegawai','DESC')->first();

	        $tenagaaktif = Pegawai::select('id_pegawai')->where(['id_jabatan' => '2', 'status' => 1])->get();
	    	$json = json_encode($tenagaaktif);

	    	$kerjahariangroup = KerjaHarianGroup::where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();

	    	if($kerjahariangroup){
		    	$kerjahariangroup->id_pegawai = $json;
		    	$kerjahariangroup->save();
	    	}

	        return response()->json(['success' => true,'pegawai' => $pegawai]);
    	}
    }

    public function statustenagakupas(Request $req){
    	if($req->ajax()){
	    	$pegawai = Pegawai::find($req->id);
	    	$pegawai->status = $req->status;
	    	$pegawai->save();

	    	$tenagaaktif = Pegawai::select('id_pegawai')->where(['id_jabatan' => '2', 'status' => 1])->get();
	    	$json = json_encode($tenagaaktif);

	    	$kerjahariangroup = KerjaHarianGroup::where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();

	    	if($kerjahariangroup){
		    	$kerjahariangroup->id_pegawai = $json;
		    	$kerjahariangroup->save();
	    	}

	        return response()->json(['success' => true,'pegawai' => $pegawai]);
    	}
    }

    public function pembagianbawang(){
    	$tenagakupas = Pegawai::select('*')->where('id_jabatan','=','2')->get();

    	$orderbesok = OrderMasak::select('dom.jumlah')
    	->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
    	->where([
    		['order_masak.tanggal_order_masak','=',date('Y-m-d',strtotime('tomorrow'))],
    		['dom.jenis_order','=',1]
    	])
    	->first();

    	//AMBIL STOCK BAWANG KUPAS

    	$stockbawang = Stock::select('stock')->where([
    		['id_gudang','=','7'],
    		['id_bahan_baku','=','BB000000004']
    	])->orderBy('timestamp','DESC')->first();

    	$stockbebas = $stockbawang->stock - $orderbesok->jumlah;

    	$ratasusut = 5;

    	$targetkupas = OrderMasak::select('dom.jumlah','tanggal_order_masak')
    	->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
    	->where([
    		['order_masak.tanggal_order_masak','=',date('Y-m-d')],
    		['dom.jenis_order','=',1]
    	])
    	->first();

        $cek = KupasBawang::where('tanggal_beri','=',date('Y-m-d'))->exists();

    	return view('gudangbawang.pembagianbawang',['tenagakupas' => $tenagakupas,'orderbesok' => $orderbesok,'stockbebas' => $stockbebas, 'ratasusut' => $ratasusut , 'targetkupas' => $targetkupas, 'cek' => $cek]);
    }

    public function simpanBeri(Request $req){
        if($req->ajax()){
            $tenagakupas = json_decode($req->tenagakupas);
            $deleted = json_decode($req->deleted);
            DB::transaction(function() use ($req,$tenagakupas,$deleted){
                $or = OrderMasak::select('order_masak.id_order_masak')
                    ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                    ->where([
                        ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                        ['dom.jenis_order','=',1]
                    ])
                    ->first();

                KupasBawang::insert([
                    'id_kupas_bawang' => $or->id_order_masak,
                    'tanggal_beri' => date('Y-m-d')
                ]);

                $i=-1;

                foreach($tenagakupas as $t){
                    DetailTransaksi::insert([
                        'id_transaksi' => $or->id_order_masak,
                        'id_jenis_transaksi' => 1,
                        'jumlah' => $t->jumlah,
                        'id_satuan' => 1,
                        'id_bahan_baku' => 'BB000000004',
                    ]);

                    $id_dt = DetailTransaksi::select('id_detail_transaksi')->where("id_bahan_baku",'=','BB000000004')->orderBy('timestamp','DESC')->first();

                    DetailTransaksi::insert([
                        'id_transaksi' => $or->id_order_masak,
                        'id_jenis_transaksi' => 2,
                        'jumlah' => 0,
                        'id_satuan' => 1,
                        'id_bahan_baku' => 'BB000000006',
                    ]);

                    $id_dtterima = DetailTransaksi::select('id_detail_transaksi')->where("id_bahan_baku",'=','BB000000006')->orderBy('timestamp','DESC')->first();

                    DetailKupasBawang::insert([
                        'id_detail_transaksi' => $id_dtterima->id_detail_transaksi,
                        'id_pegawai' => $t->id_pegawai,
                        'kulit' => 0
                    ]);

                    $i++;

                    $tenagahariini[$i] = $t->id_pegawai;
                }

                //mengurangi stock bawang kulit di gudang bawang
                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000004',
                    'id_transaksi' => $or->id_order_masak,
                    'keterangan' => 'Beri Bawang',
                    'masuk' => 0,
                    'keluar' => $req->jumlah,
                    'stock' => 0,
                    'id_gudang' => '7'
                ]);

                $jsonp = json_encode($tenagahariini);

                $khg = KerjaHarianGroup::where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
                $khg->id_pegawai = $jsonp;
                $khg->save();           

                foreach ($deleted as $p) {
                    $peg = Pegawai::find($p);
                    $peg->status = 0;
                    $peg->save();
                }
            });
            return response()->json(['success' => true]);
        }
    }

    public function penerimaanbawang(){

        $idkerja = KerjaHarianGroup::select('id_kerja_harian_group')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();

        $cek = DetailRekapKerjaHarianGroup::where('id_kerja_harian_group','=',$idkerja)->exists();

        $tenagakupas = KerjaHarianGroup::select('id_pegawai')->where(['id_group_kerja' => 'G0000000001','tanggal' => date('Y-m-d')])->first();
            
        $tenagakupas = json_decode($tenagakupas->id_pegawai);

        for($i=0;$i<count($tenagakupas);$i++){
            $pegawai[$i] = Pegawai::select('id_pegawai','nama')->where('id_pegawai','=',$tenagakupas[$i])->first();
        }

        $or = OrderMasak::select('order_masak.id_order_masak')
            ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
            ->where([
                ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                ['dom.jenis_order','=',1]
            ])
            ->first();

        if($cek == false){
            foreach($pegawai as $t){

                $id_det = DetailKupasBawang::select('dt.id_detail_transaksi')
                ->join('detail_transaksi AS dt','dt.id_detail_transaksi','=','detail_kupas_bawang.id_detail_transaksi')
                ->where('id_pegawai','=',$t->id_pegawai)
                ->first();

                $id_det = $id_det->id_detail_transaksi;

                $id_det = "DT".str_pad(intval(substr($id_det,2))-1,9,"0",STR_PAD_LEFT);
                
                $jumlah = DetailTransaksi::select('jumlah')->where('id_detail_transaksi','=',$id_det)->first();

                $t->jumlah = $jumlah->jumlah;
                $t->idtr = $id_det;
            }
            return view('gudangbawang.penerimaanbawang',['tenagakupas' => $pegawai]);
        }
        else{
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
            return view('gudangbawang.penerimaanbawangisi',['tenagakupas' => $pegawai]);
        }
        
    }

    public function simpanPenerimaan(Request $req){
        if($req->ajax()){
            $data = json_decode($req->data);
            
            DB::transaction(function() use ($req,$data){
                $or = OrderMasak::select('order_masak.id_order_masak')
                    ->join('detail_order_masak AS dom','dom.id_order_masak','=','order_masak.id_order_masak')
                    ->where([
                        ['order_masak.tanggal_order_masak','=',date('Y-m-d')],
                        ['dom.jenis_order','=',1]
                    ])
                    ->first();

                foreach($data as $t){

                    $id_det = $t->idtr;

                    $id_det = "DT".str_pad(intval(substr($id_det,2)),9,"0",STR_PAD_LEFT);

                    $dkb = DB::table("detail_kupas_bawang")
                    ->where([
                        'id_detail_transaksi' => $id_det,
                        'id_pegawai' => $t->id_pegawai,
                    ])->update([
                        'kulit' => $t->beratkulit
                    ]);

                    $det = DetailTransaksi::find($id_det)->first();
                    $det->jumlah = $t->beratbawang;
                    $det->save();
                }

                //mengurangi stock bawang kulit di gudang bawang
                Stock::insert([
                    'id_satuan' => '1',
                    'id_bahan_baku' => 'BB000000006',
                    'id_transaksi' => $or->id_order_masak,
                    'keterangan' => 'Terima Bawang',
                    'masuk' => $req->total_output,
                    'keluar' => 0,
                    'stock' => 0,
                    'id_gudang' => '7'
                ]);

            	$idkhg = KerjaHarianGroup::select('id_kerja_harian_group')->where([
                    ['id_group_kerja','=','G0000000001'],
                    ['tanggal','=',date('Y-m-d')]])->first();

        		RekapKerjaHarianGroup::insert([
                    'timestamp' => date('Y-m-d h:i:s')
        		]);

        		$idrkhg = RekapKerjaHarianGroup::select('id_rekap_kerja_harian_group')->orderBy('timestamp','DESC')->first();

        		DetailRekapKerjaHarianGroup::insert([
        			'id_kerja_harian_group' => $idkhg->id_kerja_harian_group,
        			'id_rekap_kerja_harian_group' => $idrkhg->id_rekap_kerja_harian_group
        		]);

        		RekapTransaksiHarianGudang::insert([
        			'id_gudang' => '7',
                    'timestamp' => date('Y-m-d h:i:s')
        		]);

        		$id_rthg =  RekapTransaksiHarianGudang::select('id_rekap_transaksi_gudang')->orderBy('timestamp','DESC')->first();

                $susut_kg = floatval($req->total_input) - floatval($req->total_output);
                $susut_persen = floatval($susut_kg/$req->total_input*100);

        		SusutDlmProse::insert([
        			'id_rekap_kerja_harian_group' => $idrkhg->id_rekap_kerja_harian_group,
        			'id_rekap_transaksi_harian_gudang' => $id_rthg->id_rekap_transaksi_gudang,
        			'input' => $req->total_input,
        			'output' => $req->total_output,
        			'berat_susut_kg' => $susut_kg,
        			'berat_susut_persen' => $susut_persen
        		]);
            });
    	}
        return response()->json(['success' => true]);
    }

    public function persiapanmasakkanji(){
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
    	->where('tanggal_order_masak','>=',date('Y-m-d'))
    	->get();
    	return view('gudangbawang.persiapanmasakkanji',['ordermasak' => $ordermasak]);
    }

    public function statusordermasak(Request $req){
    	if($req->ajax()){
	    	$ordermasak = OrderMasak::find($req->id);
	    	if($ordermasak->status){
	    		$ordermasak->status = 0;
	    	}
	    	else{
	    		$ordermasak->status = 1;
	    	}
	    	
	    	$ordermasak->save();

	        return response()->json(['success' => true,'ordermasak' => $ordermasak]);
    	}
    }

}

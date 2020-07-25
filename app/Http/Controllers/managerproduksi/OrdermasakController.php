<?php

namespace App\Http\Controllers\managerproduksi;

use App\Models\Product;
use App\Models\OrderMasak;
use App\Models\DetailOrderMasak;
use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdermasakController extends Controller
{

    /* 
    Menampilkan view order masak
    */
    public function index()
    {
        $product = Product::all();
        $order_masak = OrderMasak::all();
        $detail_order_masak = DetailOrderMasak::all();
        return view('managerproduksi/order-masak/ordermasak',
                    compact('product'), compact('order_masak'), compact('detail_order_masak'));
    }

    /*
    Simpat input order masak ke database  
    */
    public function store(Request $request)
    {
        // dd($tes);

        // Validasi request
        $rules = [
            'input_tanggal' => 'required'
        ];

        $custommessage = [
            'input_tanggal.required' => 'Tanggal wajib dipilih'
        ];

        $this->validate($request, $rules, $custommessage);

        // Input ke tabel order masak
        $get_id_pegawai = Pegawai::where('id_jabatan', '3')->pluck('id_pegawai');
        $id_pegawai = $get_id_pegawai[0];

        $order_masak = new OrderMasak;
        $order_masak->tanggal_order_masak = $request->input_tanggal;
        $order_masak->id_pegawai = $id_pegawai;
        $order_masak->save();

        // Input ke tabel detail order masak

        if ( $request->input_hc != null ){
            $detail_order_masak = new DetailOrderMasak;
            $detail_order_masak->id_bahan_product = 'PR00000000001';
            $detail_order_masak->jenis_order = 0;
            $detail_order_masak->jumlah = $request->input_hc;
            $detail_order_masak->save();
        }

        if ( $request->input_sp != null ){
            $detail_order_masak = new DetailOrderMasak;
            $detail_order_masak->id_bahan_product = 'PR00000000002';
            $detail_order_masak->jenis_order = 0;
            $detail_order_masak->jumlah = $request->input_sp;
            $detail_order_masak->save();
        }

        if ( $request->input_gs != null ){
            $detail_order_masak = new DetailOrderMasak;
            $detail_order_masak->id_bahan_product = 'PR00000000003';
            $detail_order_masak->jenis_order = 0;
            $detail_order_masak->jumlah = $request->input_gs;
            $detail_order_masak->save();
        }

        if ( $request->input_bawang != null ){
            $detail_order_masak = new DetailOrderMasak;
            $detail_order_masak->id_bahan_product = 'BB000000004';
            $detail_order_masak->jenis_order = 1;
            $detail_order_masak->jumlah = $request->input_bawang;
            $detail_order_masak->save();
        }
        
        return redirect('/manager-produksi/order-masak')->with('status', 'Data order masak berhasil ditambahkan.');
        
    }

    /*
    Return data untuk edit order masak
    */
    public function edit()
    {
        $id_order_masak = $_POST['id'];
        $detail_order_masak = DB::table('detail_order_masak')->select('jumlah', 'id_bahan_product')->where('id_order_masak', $id)->get();
        $jumlah = array();

        foreach($detail as $detail){
            array_push($jumlah, $detail);
        }

        $HC = 0;
        $SP = 0;
        $GS = 0;
        $BAWANG = 0;

        foreach ($jumlah as $jumlah){
            if ($jumlah->id_bahan_product == 'PR00000000001'){
                $HC = $jumlah->jumlah;
            } elseif ($jumlah->id_bahan_product == 'PR00000000002'){
                $SP = $jumlah->jumlah;
            } elseif ($jumlah->id_bahan_product == 'PR00000000003'){
                $GS = $jumlah->jumlah;
            } elseif ($jumlah->id_bahan_product == 'BB000000004'){
                $BAWANG = $jumlah->jumlah;
            }
        }

        $data = array(
            'HC' => $HC,
            'SP' => $SP,
            'GS' => $GS,
            'BAWANG' => $BAWANG
        );

        // return response()->json([
        //     'HC' => $HC,
        //     'SP' => $SP,
        //     'GS' => $GS,
        //     'BAWANG' => $BAWANG
        // ]);

        return json_encode($data);
    }

    public function test()
    {
        $id = "ORM2007250001";

        $detail = DB::table('detail_order_masak')->select('jumlah', 'id_bahan_product')->where('id_order_masak', $id)->get();
        $jumlah = array();

        foreach($detail as $detail){
            array_push($jumlah, $detail);
        }

        dd($jumlah);
    }
}

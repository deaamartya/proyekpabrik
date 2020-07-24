<?php

namespace App\Http\Controllers\gudangbawang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;

class KerjaHarianController extends Controller
{
    public function tenagakupas(){
    	$tenagakupas = Pegawai::select('*')->where('id_jabatan','=','2')->orderBy('nama','asc')->get();
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
	        return response()->json(['success' => true,'pegawai' => $pegawai]);
    	}
    }

    public function statustenagakupas(Request $req){
    	if($req->ajax()){
	    	$pegawai = Pegawai::find($req->id);
	    	$pegawai->status = $req->status;
	    	$pegawai->save();

	        return response()->json(['success' => true,'pegawai' => $pegawai]);
    	}
    }

    public function pembagianbawang(){
    	$tenagakupas = Pegawai::select('*')->where('id_jabatan','=','2')->get();
    	return view('gudangbawang.pembagianbawang',['tenagakupas' => $tenagakupas]);
    }

}

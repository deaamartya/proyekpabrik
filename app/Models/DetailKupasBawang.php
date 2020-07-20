<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailKupasBawang
 * 
 * @property string $id_detail_transaksi
 * @property string $id_pegawai
 * @property float $kulit
 * 
 * @property DetailTransaksi $detail_transaksi
 * @property Pegawai $pegawai
 *
 * @package App\Models
 */
class DetailKupasBawang extends Model
{
	protected $table = 'detail_kupas_bawang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'kulit' => 'float'
	];

	protected $fillable = [
		'id_detail_transaksi',
		'id_pegawai',
		'kulit'
	];

	public function detail_transaksi()
	{
		return $this->belongsTo(DetailTransaksi::class, 'id_detail_transaksi');
	}

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}
}

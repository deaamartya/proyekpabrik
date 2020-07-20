<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailRekap
 * 
 * @property string $id_detail_transaksi
 * @property float $berat_wadah_kosong
 * @property float $berat_BS
 * 
 * @property DetailTransaksi $detail_transaksi
 *
 * @package App\Models
 */
class DetailRekap extends Model
{
	protected $table = 'detail_rekap';
	protected $primaryKey = 'id_detail_transaksi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'berat_wadah_kosong' => 'float',
		'berat_BS' => 'float'
	];

	protected $fillable = [
		'berat_wadah_kosong',
		'berat_BS'
	];

	public function detail_transaksi()
	{
		return $this->belongsTo(DetailTransaksi::class, 'id_detail_transaksi');
	}
}

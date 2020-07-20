<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailRekapStock
 * 
 * @property string $id_detail_transaksi
 * @property float $stock_awal
 * @property float $stock_akhir
 * 
 * @property DetailTransaksi $detail_transaksi
 *
 * @package App\Models
 */
class DetailRekapStock extends Model
{
	protected $table = 'detail_rekap_stock';
	protected $primaryKey = 'id_detail_transaksi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'stock_awal' => 'float',
		'stock_akhir' => 'float'
	];

	protected $fillable = [
		'stock_awal',
		'stock_akhir'
	];

	public function detail_transaksi()
	{
		return $this->belongsTo(DetailTransaksi::class, 'id_detail_transaksi');
	}
}

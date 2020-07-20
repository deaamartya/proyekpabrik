<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 * 
 * @property string $id_stock
 * @property int $id_satuan
 * @property string $id_transaksi
 * @property string $id_bahan_baku
 * @property Carbon $TIMESTAMP
 * @property string $keterangan
 * @property float $masuk
 * @property float $keluar
 * @property float $stock
 * @property int $id_gudang
 * 
 * @property BahanBaku $bahan_baku
 * @property Gudang $gudang
 * @property Satuan $satuan
 *
 * @package App\Models
 */
class Stock extends Model
{
	protected $table = 'stock';
	protected $primaryKey = 'id_stock';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_satuan' => 'int',
		'masuk' => 'float',
		'keluar' => 'float',
		'stock' => 'float',
		'id_gudang' => 'int'
	];

	protected $dates = [
		'TIMESTAMP'
	];

	protected $fillable = [
		'id_satuan',
		'id_transaksi',
		'id_bahan_baku',
		'TIMESTAMP',
		'keterangan',
		'masuk',
		'keluar',
		'stock',
		'id_gudang'
	];

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
	}

	public function gudang()
	{
		return $this->belongsTo(Gudang::class, 'id_gudang');
	}

	public function satuan()
	{
		return $this->belongsTo(Satuan::class, 'id_satuan');
	}
}

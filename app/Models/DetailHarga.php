<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailHarga
 * 
 * @property int $id_detail_transaksi
 * @property float $harga
 * @property float $subtotal
 * @property bool $mata_uang
 *
 * @package App\Models
 */
class DetailHarga extends Model
{
	protected $table = 'detail_harga';
	protected $primaryKey = 'id_detail_transaksi';
	public $timestamps = false;

	protected $casts = [
		'harga' => 'float',
		'subtotal' => 'float',
		'mata_uang' => 'bool'
	];

	protected $fillable = [
		'harga',
		'subtotal',
		'mata_uang'
	];
}

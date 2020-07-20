<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailOrderMasak
 * 
 * @property string $id_order_masak
 * @property string $id_bahan_product
 * @property bool $jenis_order
 * @property int $jumlah
 * 
 * @property OrderMasak $order_masak
 *
 * @package App\Models
 */
class DetailOrderMasak extends Model
{
	protected $table = 'detail_order_masak';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'jenis_order' => 'bool',
		'jumlah' => 'int'
	];

	protected $fillable = [
		'id_order_masak',
		'id_bahan_product',
		'jenis_order',
		'jumlah'
	];

	public function order_masak()
	{
		return $this->belongsTo(OrderMasak::class, 'id_order_masak');
	}
}

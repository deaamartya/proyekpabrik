<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderMasak
 * 
 * @property string $id_order_masak
 * @property Carbon $timestamp_buat
 * @property Carbon $tanggal_order_masak
 * @property string $id_pegawai
 * @property bool $status
 * 
 * @property Pegawai $pegawai
 * @property DetailOrderMasak $detail_order_masak
 *
 * @package App\Models
 */
class OrderMasak extends Model
{
	protected $table = 'order_masak';
	protected $primaryKey = 'id_order_masak';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $dates = [
		'timestamp_buat',
		'tanggal_order_masak'
	];

	protected $fillable = [
		'timestamp_buat',
		'tanggal_order_masak',
		'id_pegawai',
		'status'
	];

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}

	public function detail_order_masak()
	{
		return $this->hasMany(DetailOrderMasak::class, 'id_order_masak');
	}
}

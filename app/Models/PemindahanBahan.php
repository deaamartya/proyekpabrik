<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PemindahanBahan
 * 
 * @property string $id_pemindahan_bahan
 * @property Carbon $timestamp
 * @property int $id_gudang_asal
 * @property int $id_gudang_tujuan
 * @property string $id_pegawai
 * 
 * @property Gudang $gudang
 * @property Pegawai $pegawai
 *
 * @package App\Models
 */
class PemindahanBahan extends Model
{
	protected $table = 'pemindahan_bahan';
	protected $primaryKey = 'id_pemindahan_bahan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_gudang_asal' => 'int',
		'id_gudang_tujuan' => 'int'
	];

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'timestamp',
		'id_gudang_asal',
		'id_gudang_tujuan',
		'id_pegawai'
	];

	public function gudang()
	{
		return $this->belongsTo(Gudang::class, 'id_gudang_tujuan');
	}

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}
}

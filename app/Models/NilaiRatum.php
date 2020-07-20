<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NilaiRatum
 * 
 * @property int $id_nilai_rata
 * @property int $satuan_besar
 * @property int $satuan_kecil
 * @property string $id_bahan_baku
 * @property float $nilai
 * @property Carbon $timestamp
 * 
 * @property BahanBaku $bahan_baku
 * @property Satuan $satuan
 *
 * @package App\Models
 */
class NilaiRatum extends Model
{
	protected $table = 'nilai_rata';
	protected $primaryKey = 'id_nilai_rata';
	public $timestamps = false;

	protected $casts = [
		'satuan_besar' => 'int',
		'satuan_kecil' => 'int',
		'nilai' => 'float'
	];

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'satuan_besar',
		'satuan_kecil',
		'id_bahan_baku',
		'nilai',
		'timestamp'
	];

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
	}

	public function satuan()
	{
		return $this->belongsTo(Satuan::class, 'satuan_kecil');
	}
}

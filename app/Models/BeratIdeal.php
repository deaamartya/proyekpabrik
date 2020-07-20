<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BeratIdeal
 * 
 * @property string $id_berat_ideal
 * @property float $berat_ideal_kg
 * @property int $id_satuan
 * @property string $id_bahan_baku
 * 
 * @property BahanBaku $bahan_baku
 * @property Satuan $satuan
 *
 * @package App\Models
 */
class BeratIdeal extends Model
{
	protected $table = 'berat_ideal';
	protected $primaryKey = 'id_berat_ideal';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'berat_ideal_kg' => 'float',
		'id_satuan' => 'int'
	];

	protected $fillable = [
		'berat_ideal_kg',
		'id_satuan',
		'id_bahan_baku'
	];

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
	}

	public function satuan()
	{
		return $this->belongsTo(Satuan::class, 'id_satuan');
	}
}

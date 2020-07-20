<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipeBahanBaku
 * 
 * @property int $id_tipe_bahan_baku
 * @property string $nama
 * 
 * @property Collection|BahanBaku[] $bahan_bakus
 *
 * @package App\Models
 */
class TipeBahanBaku extends Model
{
	protected $table = 'tipe_bahan_baku';
	protected $primaryKey = 'id_tipe_bahan_baku';
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function bahan_bakus()
	{
		return $this->hasMany(BahanBaku::class, 'id_tipe_bahan_baku');
	}
}

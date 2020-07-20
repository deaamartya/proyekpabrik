<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BahanBaku
 * 
 * @property string $id_bahan_baku
 * @property string $nama
 * @property bool $status
 * @property int $id_tipe_bahan_baku
 * 
 * @property TipeBahanBaku $tipe_bahan_baku
 * @property Collection|BeratIdeal[] $berat_ideals
 * @property Collection|DetailTransaksi[] $detail_transaksis
 * @property Collection|NilaiRatum[] $nilai_rata
 * @property Collection|Stock[] $stocks
 *
 * @package App\Models
 */
class BahanBaku extends Model
{
	protected $table = 'bahan_baku';
	protected $primaryKey = 'id_bahan_baku';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'id_tipe_bahan_baku' => 'int'
	];

	protected $fillable = [
		'nama',
		'status',
		'id_tipe_bahan_baku'
	];

	public function tipe_bahan_baku()
	{
		return $this->belongsTo(TipeBahanBaku::class, 'id_tipe_bahan_baku');
	}

	public function berat_ideals()
	{
		return $this->hasMany(BeratIdeal::class, 'id_bahan_baku');
	}

	public function detail_transaksis()
	{
		return $this->hasMany(DetailTransaksi::class, 'id_bahan_baku');
	}

	public function nilai_rata()
	{
		return $this->hasMany(NilaiRatum::class, 'id_bahan_baku');
	}

	public function stocks()
	{
		return $this->hasMany(Stock::class, 'id_bahan_baku');
	}
}

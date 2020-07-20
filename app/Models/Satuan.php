<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Satuan
 * 
 * @property int $id_satuan
 * @property string $nama
 * @property bool $status
 * 
 * @property Collection|BeratIdeal[] $berat_ideals
 * @property Collection|DetailTransaksi[] $detail_transaksis
 * @property Collection|NilaiRatum[] $nilai_rata
 * @property Collection|Stock[] $stocks
 *
 * @package App\Models
 */
class Satuan extends Model
{
	protected $table = 'satuan';
	protected $primaryKey = 'id_satuan';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'nama',
		'status'
	];

	public function berat_ideals()
	{
		return $this->hasMany(BeratIdeal::class, 'id_satuan');
	}

	public function detail_transaksis()
	{
		return $this->hasMany(DetailTransaksi::class, 'id_satuan');
	}

	public function nilai_rata()
	{
		return $this->hasMany(NilaiRatum::class, 'satuan_kecil');
	}

	public function stocks()
	{
		return $this->hasMany(Stock::class, 'id_satuan');
	}
}

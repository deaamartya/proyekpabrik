<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisTransaksi
 * 
 * @property int $id_jenis_transaksi
 * @property string $nama
 * 
 * @property Collection|DetailTransaksi[] $detail_transaksis
 *
 * @package App\Models
 */
class JenisTransaksi extends Model
{
	protected $table = 'jenis_transaksi';
	protected $primaryKey = 'id_jenis_transaksi';
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function detail_transaksis()
	{
		return $this->hasMany(DetailTransaksi::class, 'id_jenis_transaksi');
	}
}

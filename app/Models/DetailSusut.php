<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailSusut
 * 
 * @property int $id_detail_susut
 * @property string $nama
 * @property float $berat_susut_kg
 * @property float $berat_susut_persen
 * @property float $berat_kirim
 * @property string $id_detail_transaksi
 * 
 * @property DetailTransaksi $detail_transaksi
 *
 * @package App\Models
 */
class DetailSusut extends Model
{
	protected $table = 'detail_susut';
	protected $primaryKey = 'id_detail_susut';
	public $timestamps = false;

	protected $casts = [
		'berat_susut_kg' => 'float',
		'berat_susut_persen' => 'float',
		'berat_kirim' => 'float'
	];

	protected $fillable = [
		'nama',
		'berat_susut_kg',
		'berat_susut_persen',
		'berat_kirim',
		'id_detail_transaksi'
	];

	public function detail_transaksi()
	{
		return $this->belongsTo(DetailTransaksi::class, 'id_detail_transaksi');
	}
}

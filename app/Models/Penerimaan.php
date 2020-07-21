<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penerimaan
 * 
 * @property string $id_penerimaan
 * @property Carbon $timestamp
 * @property string $id_transaksi
 * @property int $id_jenis_penerimaan
 * @property int $id_gudang
 * 
 * @property Gudang $gudang
 * @property JenisPenerimaan $jenis_penerimaan
 * @property Collection|Supplier[] $suppliers
 *
 * @package App\Models
 */
class Penerimaan extends Model
{
	protected $table = 'penerimaan';
	protected $primaryKey = 'id_penerimaan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_jenis_penerimaan' => 'int',
		'id_gudang' => 'int'
	];

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'timestamp',
		'id_transaksi',
		'id_jenis_penerimaan',
		'id_gudang'
	];

	public function gudang()
	{
		return $this->belongsTo(Gudang::class, 'id_gudang');
	}

	public function jenis_penerimaan()
	{
		return $this->belongsTo(JenisPenerimaan::class, 'id_jenis_penerimaan');
	}

	public function suppliers()
	{
		return $this->belongsToMany(Supplier::class, 'penerimaan_supplier', 'id_penerimaan', 'id_supplier')
					->withPivot('berat_surat_jalan', 'berat_aktual', 'nomor_kontainer', 'nomor_polisi');
	}
}

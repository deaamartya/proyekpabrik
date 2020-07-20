<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PenerimaanSupplier
 * 
 * @property string $id_penerimaan
 * @property string $id_supplier
 * @property float $berat_surat_jalan
 * @property float $berat_aktual
 * @property string $nomor_kontainer
 * @property string $nomor_polisi
 * 
 * @property Penerimaan $penerimaan
 * @property Supplier $supplier
 *
 * @package App\Models
 */
class PenerimaanSupplier extends Model
{
	protected $table = 'penerimaan_supplier';
	protected $primaryKey = 'id_penerimaan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'berat_surat_jalan' => 'float',
		'berat_aktual' => 'float'
	];

	protected $fillable = [
		'id_supplier',
		'berat_surat_jalan',
		'berat_aktual',
		'nomor_kontainer',
		'nomor_polisi'
	];

	public function penerimaan()
	{
		return $this->belongsTo(Penerimaan::class, 'id_penerimaan');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'id_supplier');
	}
}

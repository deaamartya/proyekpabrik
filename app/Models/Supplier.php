<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property string $id_supplier
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $kontak_person
 * @property string $NPWP
 * @property int $id_kota
 * 
 * @property Kotum $kotum
 * @property Collection|Penerimaan[] $penerimaans
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'supplier';
	protected $primaryKey = 'id_supplier';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_kota' => 'int'
	];

	protected $fillable = [
		'nama',
		'alamat',
		'email',
		'kontak_person',
		'NPWP',
		'id_kota'
	];

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'id_kota');
	}

	public function penerimaans()
	{
		return $this->belongsToMany(Penerimaan::class, 'penerimaan_supplier', 'id_supplier', 'id_penerimaan')
					->withPivot('berat_surat_jalan', 'berat_aktual', 'nomor_kontainer', 'nomor_polisi');
	}
}

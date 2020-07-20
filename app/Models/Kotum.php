<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kotum
 * 
 * @property int $id_kota
 * @property string $nama
 * @property int $id_provinsi
 * 
 * @property Provinsi $provinsi
 * @property Collection|Supplier[] $suppliers
 *
 * @package App\Models
 */
class Kotum extends Model
{
	protected $table = 'kota';
	protected $primaryKey = 'id_kota';
	public $timestamps = false;

	protected $casts = [
		'id_provinsi' => 'int'
	];

	protected $fillable = [
		'nama',
		'id_provinsi'
	];

	public function provinsi()
	{
		return $this->belongsTo(Provinsi::class, 'id_provinsi');
	}

	public function suppliers()
	{
		return $this->hasMany(Supplier::class, 'id_kota');
	}
}

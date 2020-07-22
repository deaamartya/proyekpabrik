<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provinsi
 * 
 * @property int $id_provinsi
 * @property string $nama
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Kotum[] $kota
 *
 * @package App\Models
 */
class Provinsi extends Model
{
	protected $table = 'provinsi';
	protected $primaryKey = 'id_provinsi';
	public $timestamps = false;
	
	protected $fillable = [
		'nama'
	];

	public function kota()
	{
		return $this->hasMany(Kotum::class, 'id_provinsi');
	}
}

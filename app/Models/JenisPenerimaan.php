<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisPenerimaan
 * 
 * @property int $id_jenis_penerimaan
 * @property string $nama_jenis_penerimaan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Penerimaan[] $penerimaans
 *
 * @package App\Models
 */
class JenisPenerimaan extends Model
{
	protected $table = 'jenis_penerimaan';
	protected $primaryKey = 'id_jenis_penerimaan';

	protected $fillable = [
		'nama_jenis_penerimaan'
	];

	public function penerimaans()
	{
		return $this->hasMany(Penerimaan::class, 'id_jenis_penerimaan');
	}
}

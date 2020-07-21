<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Telp
 * 
 * @property int $id_telp
 * @property string $nomor
 * @property string $id_pemilik
 * @property string $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Telp extends Model
{
	protected $table = 'telp';
	protected $primaryKey = 'id_telp';
	public $timestamps = false;

	protected $fillable = [
		'nomor',
		'id_pemilik',
		'keterangan'
	];
}

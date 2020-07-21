<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KupasBawang
 * 
 * @property string $id_kupas_bawang
 * @property Carbon $tanggal_beri
 *
 * @package App\Models
 */
class KupasBawang extends Model
{
	protected $table = 'kupas_bawang';
	protected $primaryKey = 'id_kupas_bawang';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'tanggal_beri'
	];

	protected $fillable = [
		'tanggal_beri'
	];
}

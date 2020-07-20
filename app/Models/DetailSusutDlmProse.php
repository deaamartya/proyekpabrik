<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailSusutDlmProse
 * 
 * @property int $id_detail_susut_dlm_proses
 * @property string $id_susut_dlm_proses
 * @property string $nama
 * @property bool $tipe
 * @property float $nilai
 * 
 * @property SusutDlmProse $susut_dlm_prose
 *
 * @package App\Models
 */
class DetailSusutDlmProse extends Model
{
	protected $table = 'detail_susut_dlm_proses';
	protected $primaryKey = 'id_detail_susut_dlm_proses';
	public $timestamps = false;

	protected $casts = [
		'tipe' => 'bool',
		'nilai' => 'float'
	];

	protected $fillable = [
		'id_susut_dlm_proses',
		'nama',
		'tipe',
		'nilai'
	];

	public function susut_dlm_prose()
	{
		return $this->belongsTo(SusutDlmProse::class, 'id_susut_dlm_proses');
	}
}

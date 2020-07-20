<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RekapKerjaHarianGroup
 * 
 * @property string $id_rekap_kerja_harian_group
 * @property Carbon $timestamp
 * 
 * @property DetailRekapKerjaHarianGroup $detail_rekap_kerja_harian_group
 * @property Collection|SusutDlmProse[] $susut_dlm_proses
 *
 * @package App\Models
 */
class RekapKerjaHarianGroup extends Model
{
	protected $table = 'rekap_kerja_harian_group';
	protected $primaryKey = 'id_rekap_kerja_harian_group';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'timestamp'
	];

	public function detail_rekap_kerja_harian_group()
	{
		return $this->hasOne(DetailRekapKerjaHarianGroup::class, 'id_rekap_kerja_harian_group');
	}

	public function susut_dlm_proses()
	{
		return $this->hasMany(SusutDlmProse::class, 'id_rekap_kerja_harian_group');
	}
}

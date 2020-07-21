<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailRekapKerjaHarianGroup
 * 
 * @property string $id_kerja_harian_group
 * @property string $id_rekap_kerja_harian_group
 * 
 * @property KerjaHarianGroup $kerja_harian_group
 * @property RekapKerjaHarianGroup $rekap_kerja_harian_group
 *
 * @package App\Models
 */
class DetailRekapKerjaHarianGroup extends Model
{
	protected $table = 'detail_rekap_kerja_harian_group';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'id_kerja_harian_group',
		'id_rekap_kerja_harian_group'
	];

	public function kerja_harian_group()
	{
		return $this->belongsTo(KerjaHarianGroup::class, 'id_kerja_harian_group');
	}

	public function rekap_kerja_harian_group()
	{
		return $this->belongsTo(RekapKerjaHarianGroup::class, 'id_rekap_kerja_harian_group');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KerjaHarianGroup
 * 
 * @property string $id_kerja_harian_group
 * @property string $id_group_kerja
 * @property Carbon $tanggal
 * @property string $id_pegawai
 * 
 * @property GroupKerja $group_kerja
 * @property Pegawai $pegawai
 * @property DetailRekapKerjaHarianGroup $detail_rekap_kerja_harian_group
 *
 * @package App\Models
 */
class KerjaHarianGroup extends Model
{
	protected $table = 'kerja_harian_group';
	protected $primaryKey = 'id_kerja_harian_group';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'tanggal'
	];

	protected $fillable = [
		'id_group_kerja',
		'tanggal',
		'id_pegawai'
	];

	public function group_kerja()
	{
		return $this->belongsTo(GroupKerja::class, 'id_group_kerja');
	}

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}

	public function detail_rekap_kerja_harian_group()
	{
		return $this->hasOne(DetailRekapKerjaHarianGroup::class, 'id_kerja_harian_group');
	}
}

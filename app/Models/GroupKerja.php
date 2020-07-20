<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupKerja
 * 
 * @property string $id_group_kerja
 * @property int $id_gudang
 * @property string $nama
 * @property int $jumlah_personil
 * @property bool $level
 * @property string|null $parent_id_group_kerja
 * 
 * @property Gudang $gudang
 * @property GroupKerja $group_kerja
 * @property Collection|GroupKerja[] $group_kerjas
 * @property Collection|KerjaHarianGroup[] $kerja_harian_groups
 *
 * @package App\Models
 */
class GroupKerja extends Model
{
	protected $table = 'group_kerja';
	protected $primaryKey = 'id_group_kerja';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_gudang' => 'int',
		'jumlah_personil' => 'int',
		'level' => 'bool'
	];

	protected $fillable = [
		'id_gudang',
		'nama',
		'jumlah_personil',
		'level',
		'parent_id_group_kerja'
	];

	public function gudang()
	{
		return $this->belongsTo(Gudang::class, 'id_gudang');
	}

	public function group_kerja()
	{
		return $this->belongsTo(GroupKerja::class, 'parent_id_group_kerja');
	}

	public function group_kerjas()
	{
		return $this->hasMany(GroupKerja::class, 'parent_id_group_kerja');
	}

	public function kerja_harian_groups()
	{
		return $this->hasMany(KerjaHarianGroup::class, 'id_group_kerja');
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pegawai
 * 
 * @property string $id_pegawai
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property int $id_jabatan
 * @property int|null $id_gudang
 * @property bool $status
 * 
 * @property Gudang $gudang
 * @property Jabatan $jabatan
 * @property DetailKupasBawang $detail_kupas_bawang
 * @property Collection|KerjaHarianGroup[] $kerja_harian_groups
 * @property Collection|OrderMasak[] $order_masaks
 * @property Collection|PemindahanBahan[] $pemindahan_bahans
 *
 * @package App\Models
 */
class Pegawai extends Model
{
	protected $table = 'pegawai';
	protected $primaryKey = 'id_pegawai';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_jabatan' => 'int',
		'id_gudang' => 'int',
		'status' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nama',
		'username',
		'password',
		'id_jabatan',
		'id_gudang',
		'status'
	];

	public function gudang()
	{
		return $this->belongsTo(Gudang::class, 'id_gudang');
	}

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'id_jabatan');
	}

	public function detail_kupas_bawang()
	{
		return $this->hasOne(DetailKupasBawang::class, 'id_pegawai');
	}

	public function kerja_harian_groups()
	{
		return $this->hasMany(KerjaHarianGroup::class, 'id_pegawai');
	}

	public function order_masaks()
	{
		return $this->hasMany(OrderMasak::class, 'id_pegawai');
	}

	public function pemindahan_bahans()
	{
		return $this->hasMany(PemindahanBahan::class, 'id_pegawai');
	}
}

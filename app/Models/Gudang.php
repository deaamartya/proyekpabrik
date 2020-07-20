<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gudang
 * 
 * @property int $id_gudang
 * @property string $nama
 * @property bool $status
 * 
 * @property Collection|GroupKerja[] $group_kerjas
 * @property Collection|Pegawai[] $pegawais
 * @property Collection|PemindahanBahan[] $pemindahan_bahans
 * @property Collection|Penerimaan[] $penerimaans
 * @property Collection|RekapTransaksiHarianGudang[] $rekap_transaksi_harian_gudangs
 * @property Collection|Stock[] $stocks
 *
 * @package App\Models
 */
class Gudang extends Model
{
	protected $table = 'gudang';
	protected $primaryKey = 'id_gudang';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'nama',
		'status'
	];

	public function group_kerjas()
	{
		return $this->hasMany(GroupKerja::class, 'id_gudang');
	}

	public function pegawais()
	{
		return $this->hasMany(Pegawai::class, 'id_gudang');
	}

	public function pemindahan_bahans()
	{
		return $this->hasMany(PemindahanBahan::class, 'id_gudang_tujuan');
	}

	public function penerimaans()
	{
		return $this->hasMany(Penerimaan::class, 'id_gudang');
	}

	public function rekap_transaksi_harian_gudangs()
	{
		return $this->hasMany(RekapTransaksiHarianGudang::class, 'id_gudang');
	}

	public function stocks()
	{
		return $this->hasMany(Stock::class, 'id_gudang');
	}
}

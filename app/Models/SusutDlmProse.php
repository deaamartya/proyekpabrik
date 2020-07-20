<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SusutDlmProse
 * 
 * @property string $id_susut_dlm_proses
 * @property string $id_rekap_kerja_harian_group
 * @property string $id_rekap_transaksi_harian_gudang
 * @property Carbon $timestamp
 * @property float $input
 * @property float $output
 * @property float $berat_susut_kg
 * @property float $berat_susut_persen
 * 
 * @property RekapKerjaHarianGroup $rekap_kerja_harian_group
 * @property RekapTransaksiHarianGudang $rekap_transaksi_harian_gudang
 * @property Collection|DetailSusutDlmProse[] $detail_susut_dlm_proses
 *
 * @package App\Models
 */
class SusutDlmProse extends Model
{
	protected $table = 'susut_dlm_proses';
	protected $primaryKey = 'id_susut_dlm_proses';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'input' => 'float',
		'output' => 'float',
		'berat_susut_kg' => 'float',
		'berat_susut_persen' => 'float'
	];

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'id_rekap_kerja_harian_group',
		'id_rekap_transaksi_harian_gudang',
		'timestamp',
		'input',
		'output',
		'berat_susut_kg',
		'berat_susut_persen'
	];

	public function rekap_kerja_harian_group()
	{
		return $this->belongsTo(RekapKerjaHarianGroup::class, 'id_rekap_kerja_harian_group');
	}

	public function rekap_transaksi_harian_gudang()
	{
		return $this->belongsTo(RekapTransaksiHarianGudang::class, 'id_rekap_transaksi_harian_gudang');
	}

	public function detail_susut_dlm_proses()
	{
		return $this->hasMany(DetailSusutDlmProse::class, 'id_susut_dlm_proses');
	}
}

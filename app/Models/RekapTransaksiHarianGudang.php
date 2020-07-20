<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RekapTransaksiHarianGudang
 * 
 * @property string $id_rekap_transaksi_gudang
 * @property int $id_gudang
 * @property Carbon $timestamp
 * 
 * @property Gudang $gudang
 * @property Collection|SusutDlmProse[] $susut_dlm_proses
 *
 * @package App\Models
 */
class RekapTransaksiHarianGudang extends Model
{
	protected $table = 'rekap_transaksi_harian_gudang';
	protected $primaryKey = 'id_rekap_transaksi_gudang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_gudang' => 'int'
	];

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'id_gudang',
		'timestamp'
	];

	public function gudang()
	{
		return $this->belongsTo(Gudang::class, 'id_gudang');
	}

	public function susut_dlm_proses()
	{
		return $this->hasMany(SusutDlmProse::class, 'id_rekap_transaksi_harian_gudang');
	}
}

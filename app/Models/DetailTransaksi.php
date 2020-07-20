<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailTransaksi
 * 
 * @property string $id_detail_transaksi
 * @property int $id_satuan
 * @property float $jumlah
 * @property string $id_bahan_baku
 * @property int $id_jenis_transaksi
 * @property Carbon $timestamp
 * @property bool $flag
 * 
 * @property BahanBaku $bahan_baku
 * @property JenisTransaksi $jenis_transaksi
 * @property Satuan $satuan
 * @property DetailKupasBawang $detail_kupas_bawang
 * @property DetailRekap $detail_rekap
 * @property DetailRekapStock $detail_rekap_stock
 * @property Collection|DetailSusut[] $detail_susuts
 *
 * @package App\Models
 */
class DetailTransaksi extends Model
{
	protected $table = 'detail_transaksi';
	protected $primaryKey = 'id_detail_transaksi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_satuan' => 'int',
		'jumlah' => 'float',
		'id_jenis_transaksi' => 'int',
		'flag' => 'bool'
	];

	protected $dates = [
		'timestamp'
	];

	protected $fillable = [
		'id_satuan',
		'jumlah',
		'id_bahan_baku',
		'id_jenis_transaksi',
		'timestamp',
		'flag'
	];

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class, 'id_bahan_baku');
	}

	public function jenis_transaksi()
	{
		return $this->belongsTo(JenisTransaksi::class, 'id_jenis_transaksi');
	}

	public function satuan()
	{
		return $this->belongsTo(Satuan::class, 'id_satuan');
	}

	public function detail_kupas_bawang()
	{
		return $this->hasOne(DetailKupasBawang::class, 'id_detail_transaksi');
	}

	public function detail_rekap()
	{
		return $this->hasOne(DetailRekap::class, 'id_detail_transaksi');
	}

	public function detail_rekap_stock()
	{
		return $this->hasOne(DetailRekapStock::class, 'id_detail_transaksi');
	}

	public function detail_susuts()
	{
		return $this->hasMany(DetailSusut::class, 'id_detail_transaksi');
	}
}

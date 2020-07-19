<?php

namespace App\Managerproduksi;

use Illuminate\Database\Eloquent\Model;

class Penerimaan_supplier extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $table = "penerimaan_supplier";
    protected $fillable = ['id_penerimaan','id_supplier', 'berat_surat_jalan', 'berat_aktual', 'nomor_kontaner', 'nomor_polisi'];
    protected $primaryKey = 'id_penerimaan';
    protected $keyType = 'string';
}

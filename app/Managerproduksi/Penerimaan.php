<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $table = "penerimaan";
    protected $fillable = ['id_penerimaan','timestamp', 'id_transaksi', 'id_jenis_penerimaan', 'id_gudang'];
    protected $primaryKey = 'id_penerimaan';
    
}

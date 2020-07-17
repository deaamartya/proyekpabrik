<?php

namespace App\Managerproduksi;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    
    protected $table = 'gudang';
    protected $fillable = ['id_gudang','nama', 'status'];
    protected $primaryKey = 'id_gudang';

    public $timestamps = false;
}

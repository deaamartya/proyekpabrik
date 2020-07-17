<?php

namespace App\Managerproduksi;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   
    protected $table = 'supplier';
    protected $fillable = ['id_supplier','nama', 'alamat', 'email', 'kontak_person', 'NPWP', 'id_kota'];
    protected $primaryKey = 'id_supplier';
    protected $keyType = 'string';

    public $timestamps = false;
    public $incrementing = false;
}

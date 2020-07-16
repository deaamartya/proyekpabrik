<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    
    protected $table = "supplier";
    protected $fillable = ['id_supplier','nama', 'alamat', 'email', 'kontak_person', 'NPWP', 'id_kota'];
    protected $primaryKey = 'id_supplier';
}

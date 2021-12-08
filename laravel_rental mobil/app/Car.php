<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    protected $fillable = ['merek', 'nopol', 'harga', 'type', 'status', 'deskripsi', 'gambar'];
    protected $primaryKey = 'id_kendaraan';
    use SoftDeletes;
    protected $table = 'tb_kendaraan';
}

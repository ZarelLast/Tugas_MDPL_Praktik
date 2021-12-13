<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Returns;
use Eloquent;

class Car extends Model
{
    protected $table = 'tb_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $fillable = ['merek', 'nopol', 'harga', 'type', 'status', 'deskripsi', 'gambar'];
    use SoftDeletes;

    public function transaksiHas()
    {
        return $this->hasMany('\App\Returns', 'id_kendaraan', 'id_kendaraan');
    }
}

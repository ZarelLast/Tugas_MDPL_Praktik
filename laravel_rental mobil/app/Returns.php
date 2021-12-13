<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\User;
// use App\Car;

class Returns extends Model
{
    public $incrementing = false;
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $foreignKey = ['id_pelanggan', 'id_kendaraan'];
    protected $fillable = ['id_transaksi','id_pelanggan', 'id_kendaraan', 'harga', 'tgl_pinjam', 'tgl_kembali', 'waktu', 'total', 'denda', 'status'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function hasUser()
    {
        return $this->belongsTo('\App\User', 'id_pelanggan', 'id_pelanggan');
    }
    public function hasMobil()
    {
        return $this->belongsTo("\App\Car", 'id_kendaraan', 'id_kendaraan');
    }
}

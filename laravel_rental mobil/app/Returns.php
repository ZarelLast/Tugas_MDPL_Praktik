<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Car;

class Returns extends Model
{
    protected $fillable = ['id_pelanggan', 'nopol', 'harga', 'tgl_pinjam', 'tgl_kembali', 'waktu', 'total', 'denda'];
    protected $primaryKey = 'id_transaksi';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tb_transaksi';
    public function user(){
        return $this->belongsTo('User');
    }
    public function Car(){
        return $this->belongsTo('Car');
    }
}

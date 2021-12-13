<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Returns;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_pelanggan';
    protected $fillable = [
        'id_pelanggan', 'nama', 'email', 'password','alamat','telp'
    ];
    protected $primaryKey = 'id_pelanggan';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Transaksi()
    {
        return $this->hasMany('App\Returns');
    }
}

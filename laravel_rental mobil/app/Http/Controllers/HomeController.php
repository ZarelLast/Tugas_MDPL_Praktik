<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Car;
use App\User;
use App\Returns;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Home";
        $data = Car::Where('status', '=', 'tersedia')->get();
        $menu = 0;
        return view('pages.dashboard', compact('title', 'menu', 'data'));
    }

    public function viewMobil($id)
    {
        $title = "Pesan Mobil";
        $mobil = Car::Where('id_kendaraan', '=', $id)->get();
        $menu = 0;
        return view('pages.view_mobil', compact('title', 'menu', 'mobil'));
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pesan(Request $request)
    {
        $validate = $request->validate([
            'id_transaksi' => 'nullable',
            'nopol' => 'nullable',
            'harga' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'waktu' => 'required',
            'denda' => 'nullable',
            'total' => 'required'
        ]);
        $id = DB::table('tb_transaksi')->orderBy('id_transaksi', 'desc')->select('id_transaksi')->first()->id_transaksi;
        $data['id_transaksi'] = 'PM'.sprintf("%04d", (int)str_replace('PM', '', $id)+1);
        $data['id_pelanggan'] = Auth::user()->id_pelanggan;
        $data['id_kendaraan'] = (int)$request['id_mobil'];
        $data['harga'] = (int)$request['harga'];
        $data['tgl_pinjam'] = $request['tgl_pinjam'];
        $data['tgl_kembali'] = $request['tgl_kembali'];
        $data['total'] = (int)$request['total'];
        $data['waktu'] = (int)$request['waktu'];
        if ($data['waktu'] < 0){
            $data['denda'] = int((($data['harga']/100)*2)*$data['waktu']);
        }else{
            $data['denda'] = 0;
        }

        $data['total'] = $data['denda']+$data['total'];
        $data['status'] = 'dipinjam';
        $insert = Returns::create($data);
        $status['status'] = 'dipinjam';
        $update = Car::find($data['id_kendaraan'])->update($status);
        return redirect()->route('nota', $data['id_transaksi']);
    }

    public function nota($id)
    {
        $title = "Nota - ".$id;
        $menu = 0;
        $data = Returns::find($id)->where('id_transaksi', $id)->get();
        return view('pages.nota', compact('data', 'title', 'menu'));
    }
}

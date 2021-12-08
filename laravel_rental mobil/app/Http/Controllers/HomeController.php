<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Car;

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
}

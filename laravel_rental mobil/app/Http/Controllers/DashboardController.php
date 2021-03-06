<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class DashboardController extends Controller
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
        $title = "Dashboard";
        $menu = 0;
        return view('home', compact('title', 'menu'));
    }
}

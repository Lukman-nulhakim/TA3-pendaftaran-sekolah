<?php

namespace App\Http\Controllers;
use App\Siswa;
use App\Sekolah;


use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.create');
    }

    public function dashboard(){
        $siswa = Siswa::all();
        $sekolah = Sekolah::all();
        return view('user.dashboard', compact('siswa','sekolah'));
    }
}

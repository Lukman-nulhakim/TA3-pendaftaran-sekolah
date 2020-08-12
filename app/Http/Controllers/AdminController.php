<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Sekolah;
use App\Kecamatan;
use App\Kota;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    // public function index(){
    //     return view('admin.master');
    // }

    public function dashboard(){
        return view('admin.dashboard',[
            'siswa' => Siswa::count(),
            'sekolah' => Sekolah::count(),
            'kecamatan' => Kecamatan::count(),
            'kota' => Kota::count()
        ]);
    }
}

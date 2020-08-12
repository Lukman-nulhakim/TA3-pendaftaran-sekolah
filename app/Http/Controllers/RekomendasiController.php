<?php

namespace App\Http\Controllers;

use App\Rekomendasi;
use Illuminate\Http\Request;
use App\Siswa;
use App\Sekolah;
use Illuminate\Support\Facades\DB;

class RekomendasiController extends Controller
{

    public function index()
    {
        $siswa = Siswa::all();
        $sekolah = Sekolah::all();

        return view('admin.rekomendasi.index', compact('siswa', 'sekolah'));
    }

    public function store(Request $request)
    {
        $siswa = Siswa::find($request->siswa_id);
        $siswa->sekolah()->attach($request->sekolah);
        return redirect()->route('rekomendasi.index');
    }

    public function update(Request $request, Rekomendasi $rekomendasi)
    {
        $rekomendasi->update();
        $rekomendasi->sekolah()->sync($request->sekolah);
        return redirect()->route('rekomendasi.index');
    }
}

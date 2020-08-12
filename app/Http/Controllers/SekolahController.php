<?php

namespace App\Http\Controllers;

use App\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('admin.sekolah.index', compact('sekolahs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'status' => 'required',
            'min_nilai' => 'required',
            'email' => 'required',
        ]);

        Sekolah::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['nama_sekolah']} berhasil ditambah");
        return redirect()->route('sekolah.index');
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'status' => 'required',
            'min_nilai' => 'required',
            'email' => 'required',
        ]);

        $sekolah->update($validatedData);
        return redirect()->route('sekolah.index')->with('pesan', "sekolah $sekolah->nama_sekolah berhasil diubah");
    }

    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('pesan', "Hapus data $sekolah->nama_sekolah Berhasil");
    }
}

<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kecamatan;
use App\Kota;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswas = Siswa::all();
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        return view('admin.siswa.index', compact('siswas', 'kecamatan', 'kota'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        return view('user.create', compact('kecamatan','kota'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:20',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan_id' => 'required',
            'kota_id' => 'required',
            'agama' => 'required',
            'ijazah' => 'required|file|image|max:1024',
            'skhun' => 'required|file|image|max:1024'
        ]);

        $data = $request->all();
        $data['ijazah'] = $request->file('ijazah')->store('assets/ijazah', 'public');
        $data['skhun'] = $request->file('skhun')->store('assets/skhun', 'public');
        
        Siswa::create($data);
        $request->session()->flash('pesan', "Data {$validatedData['nama']} berhasil ditambah");
        return redirect('/dashboard');
    }

    public function show(Siswa $siswa)
    {
        return view('admin.siswa.show', ['siswa' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:20',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan_id' => 'required',
            'kota_id' => 'required',
            'agama' => 'required',
            'ijazah' => 'required|file|image|max:1024',
            'skhun' => 'required|file|image|max:1024'
        ]);
        
        $dataId = $siswa->find($siswa->id);
        $data = $request->all();
        if ($request->ijazah) {
            Storage::delete('public/'.$dataId->ijazah);
            $data['ijazah'] = $request->file('ijazah')->store('assets/ijazah', 'public');
        }
        if ($request->skhun) {
            Storage::delete('public/'.$dataId->skhun);
            $data['skhun'] = $request->file('skhun')->store('assets/skhun', 'public');
        }
        $dataId->update($data);
        return redirect()->route('siswa.index');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        Storage::delete('public/'.$siswa->ijazah);
        Storage::delete('public/'.$siswa->skhun);
        return redirect()->route('siswa.index')->with('pesan', "Hapus data $siswa->nama Berhasil");
    }
}
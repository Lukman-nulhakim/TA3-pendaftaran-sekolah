<?php

namespace App\Http\Controllers\Admin;

use App\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\KecamatanRepo;


class KecamatanController extends Controller
{
    protected $repo;

    public function __construct(){
        $this->repo = new KecamatanRepo();
    }

    public function index()
    {
        $kecamatans = Kecamatan::all();
        return view('admin.kecamatan.index', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $this->repo->storeKecamatan($request);
        return redirect()->route('kecamatans.index');
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $this->repo->updateKecamatan($request, $kecamatan);
        return redirect()->route('kecamatans.index');
    }

    public function destroy(Request $request, Kecamatan $kecamatan)
    {
        $this->repo->destroyKecamatan($request, $kecamatan);
        return redirect()->route('kecamatans.index');
    }
}

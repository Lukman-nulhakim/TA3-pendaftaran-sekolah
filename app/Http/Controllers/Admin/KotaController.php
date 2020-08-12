<?php

namespace App\Http\Controllers\Admin;

use App\Kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\KotaRepo;

class KotaController extends Controller
{
    protected $repo;

    public function __construct(){
        $this->repo = new KotaRepo();
    }

    public function index()
    {
        $kota = Kota::all();
        return view('admin.kota.index', compact('kota'));
    }

    public function store(Request $request)
    {
        $this->repo->storeKota($request);
        return redirect()->route('kotas.index');
    }

    public function update(Request $request, Kota $kota)
    {
        $this->repo->updateKota($request, $kota);
        return redirect()->route('kotas.index');
    }

    public function destroy(Request $request, Kota $kota)
    {
        $this->repo->deleteKota($request, $kota);
        return redirect()->route('kotas.index');
    }
}

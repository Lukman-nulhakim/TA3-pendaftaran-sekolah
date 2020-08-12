<?php

namespace App\Http\Controllers\Repo;

use App\Kecamatan;
use Illuminate\Http\Request;

class KecamatanRepo{

    public function storeKecamatan($request){
        $validatedData = $request->validate([
            'kecamatan' => 'required|unique:kecamatans'
        ]);
    
        $kecamatan = Kecamatan::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['kecamatan']} Berhasil Disimpan");
        return $kecamatan;
    }

    public function updateKecamatan($request, $kecamatan){
        $validatedData = $request->validate([
            'kecamatan' => 'required|unique:kecamatans,kecamatan'
        ]);

        $kecamatan->update($validatedData);
        $request->session()->flash('pesan', "Data $kecamatan->kecamatan berhasil diubah");
        return $kecamatan;
    }

    public function destroyKecamatan($request, $kecamatan){
        $kecamatan->delete();
        $request->session()->flash('pesan', "Hapus data $kecamatan->kecamatan Berhasil");
        return $kecamatan;
    }
}


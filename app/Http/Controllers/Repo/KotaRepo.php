<?php

namespace App\Http\Controllers\Repo;

use App\Kota;
use Illuminate\Http\Request;

class KotaRepo{

    public function storeKota($request){
        
        $validatedData = $request->validate([
            'kota' => 'required|unique:kotas'
        ]);

        $kota = Kota::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['kota']} Berhasil Disimpan");
        return $kota;
    }

    public function updateKota($request, $kota){
        $validatedData = $request->validate([
            'kota' => 'required|unique:kotas,kota'
        ]);

        $kota->update($validatedData);
        $request->session()->flash('pesan', "Kota $kota->kota berhasil diubah");
        return $kota;
    }

    public function deleteKota($request, $kota){
        $kota->delete();
        $request->session()->flash('pesan', "Hapus data $kota->kota Berhasil");
        return $kota;
    }
}
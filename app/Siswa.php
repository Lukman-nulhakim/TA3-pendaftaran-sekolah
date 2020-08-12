<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
    }

    public function kota(){
        return $this->belongsTo('App\Kota', 'kota_id', 'id');
    }

    public function sekolah(){
        return $this->belongsToMany('App\Sekolah', 'sekolah_siswa', 'siswa_id', 'sekolah_id' )->withTimestamps();
    }
}

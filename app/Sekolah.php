<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $guarded = [];

    public function siswa(){
        return $this->belongsToMany('App\Siswa', 'sekolah_siswa', 'sekolah_id', 'siswa_id')->withTimestamps();
    }

}

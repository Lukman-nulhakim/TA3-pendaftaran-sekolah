<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['kecamatan'];

    public function siswa(){
        return $this->hasMany('App\Siswa', 'kecamatan_id', 'id');
    }
}

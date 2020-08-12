<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = ['kota'];

    public function siswa(){
        return $this->hasMany('App\Siswa', 'kota_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa_telat extends Model
{
    protected $table = 'siswa_telat';
    protected $guarded = [];

    public function data_siswa(){
    	return $this->belongsTo('App\Data_siswa','siswa_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];

    public function siswa_telat(){
    	return $this->hasMany('App\Siswa_telat','kelas_id');
    }

    public function data_siswa(){
    	return $this->hasMany('App\Data_siswa','kelas_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_siswa extends Model
{
    protected $table = 'data_siswa';
    protected $fillable = ['nis','nama','kelas_id'];

    public function kelas(){
    	return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function siswa_telat(){
    	return $this->hasMany('App\Data_siswa','siswa_id');
    }
}

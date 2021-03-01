<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seksiosis extends Model
{
    protected $table = 'seksioses';
    protected $fillable = ['nama_seksi','jumlah_anggota','bidang','user_id'];
}

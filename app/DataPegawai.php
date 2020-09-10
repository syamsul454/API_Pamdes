<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $fillable = ['user_id','name','jabatan','nomor_telepon','alamat','nip'];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}

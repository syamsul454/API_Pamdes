<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $fillable = ['user_id','name','jabatan','nomor_telepon','alamat','nip'];

}

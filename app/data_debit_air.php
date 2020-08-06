<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_debit_air extends Model
{
    protected $fillable = ['pelanngan_id','pegawai_id','meter_awal','meter_akhir','pemakain'];
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    public $timestamps = true;
    protected $fillable = ['name','nomor_telepon','jenis_kelamin','nomor_kk','id_dusun','alamat'];
    public function dusun()
    {
        return $this->belongsTo('App\dusun', 'id_dusun', 'id')->select('id','name');
    }

    public static function add($request)
    {
       $add = self::create([
            'name' => $request->name,
            'nomor_telepon' =>  $request->nomor_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_kk' => $request->nomor_kk,
            'id_dusun' => $request->id_dusun,
            'alamat' => $request->alamat,
       ]);

       return $add;
    }
}

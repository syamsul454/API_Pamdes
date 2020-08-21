<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_debit_air extends Model
{
    protected $fillable = ['pelanggan_id', 'pegawai_id', 'meter_awal', 'meter_akhir', 'pemakain'];

    public static function insert($request)
    {
       
        $pelanggan = self::where('pelanggan_id', $request->pelanggan_id)->latest()->first();
        if (!$pelanggan) {
            $add = self::create([
                'pelanggan_id' => $request->pelanggan_id,
                'pegawai_id' => $request->pegawai_id,
                'meter_akhir' => $request->meter_akhir,
                'meter_awal' => $request->meter_akhir,
                'pemakain' => $request->meter_akhir,
            ]);
        }
            $meterawal = $pelanggan->meter_akhir;
            $pemakain = $request->meter_akhir - $pelanggan->meter_akhir ;
            $add = self::create([
                'pelanggan_id' => $request->pelanggan_id,
                'pegawai_id' => $request->pegawai_id,
                'meter_akhir' => $request->meter_akhir,
                'meter_awal' =>  $meterawal,
                'pemakain' => $pemakain,
            ]);
        return $add;
    }

}

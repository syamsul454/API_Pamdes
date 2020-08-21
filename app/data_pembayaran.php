<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_pembayaran extends Model
{
    protected $fillable = ['id_debit_air', 'harga_M3', 'beban', 'jumlah_pembayaran', 'tanggal_pembayaran','status'];

    public static function insert($debit)
    {
        $jumlahpembayaran = 500 * $debit->pemakain + 1500;
        self::create([
            'id_debit_air' => $debit->id,
            'harga_M3' => 500,
            'beban' => 1500,
            'jumlah_pembayaran' => $jumlahpembayaran,
            'tanggal_pembayaran' => date("Y-m-d H:i:s"),
            'status' => 0,
        ]);
    }
}

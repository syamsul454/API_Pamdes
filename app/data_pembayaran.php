<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_pembayaran extends Model
{
    protected $fillable = ['id_debit_air', 'harga_M3', 'beban', 'jumlah_pembayaran', 'tanggal_pembayaran','status'];
    protected $appends = ['months'];

    public function debitAir()
    {
        return $this->belongsTo('App\data_debit_air', 'id_debit_air')->with('pelanggan');   
    }

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

        return $jumlahpembayaran;
    }
   
    public function getMonthsAttribute()
    {
        return date('F', strtotime($this->tanggal_pembayaran));
    }

}

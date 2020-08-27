<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_debit_air;
use App\data_pembayaran;

class TransactionController extends Controller
{
    
    public function add(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'pegawai_id' => 'required',
            'meter_akhir' => 'required'
        ]);
        
        $pelanggan = $request->all();
        $data = json_encode($pelanggan);
        $dataDebitAir = data_debit_air::insert($request);
        $pembayaran = data_pembayaran::insert($dataDebitAir);
        return response()->json(['message' => 'sucesss', 'data' => $pembayaran],200);
    }

    public function listPembayaran()
    {
       return data_pembayaran::with('debitAir')->get();
    }

    public function listPembayaranIdpelanggan($idPelanggan)
    {
        $data = data_pembayaran::with('debitAir')->whereHas('debitAir',function($q)use($idPelanggan){
            $q->where('pelanggan_id',$idPelanggan);
        })->latest()->get();
        $tunggakan = data_pembayaran::with('debitAir')->whereHas('debitAir',function($q)use($idPelanggan){
            $q->where('pelanggan_id',$idPelanggan);
        })->where('status', 0)->latest()->get()->sum('jumlah_pembayaran');

        return response()->json(['data' => $data, 'jumlah_tunggakan' => $tunggakan], 200);
    }
}

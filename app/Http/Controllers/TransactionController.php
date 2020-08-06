<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_debit_air;

class TransactionController extends Controller
{
    
    public function add(Request $request)
    {
        // $request->validate([
        //     'pelanggan_id' => 'required',
        //     'pegawai_id' => 'required',
        //     'meter_akhir' => 'required'
        // ]);
        
        $pelanggan = $request->all();
        $data = json_encode($pelanggan);
        dd($pelanggan);
        data_debit_air::insert(json_decode($data));  
        
       
    }
}

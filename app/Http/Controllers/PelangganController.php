<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    public function view()
    {
        $pelanggan = Pelanggan::with('dusun')->get();
        return response()->json(['message' => 'success get Data', 'data' => $pelanggan], 200);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'nomor_telepon' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'nomor_kk' => 'required',
            'id_dusun' => 'required',
            'alamat' => 'required'
        ]);

        $pelanggan = Pelanggan::add($request);
        if ($pelanggan) {
            return response()->json(['message' => 'success', 'data' => $pelanggan], 200);
        }
            return response()->json(['message' => 'register Failed'],403);

    }

    public function update()
    {
        
    }
}

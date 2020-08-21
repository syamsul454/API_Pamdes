<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function view()
    {
        $pelanggan = Pelanggan::with('dusun')->get();
        return response()->json( $pelanggan,200);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'nomor_telepon' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'nomor_kk' => 'required',
            'id_dusun' => 'required',
            'alamat' => 'required',
        ]);

        $pelanggan = Pelanggan::add($request);
        if ($pelanggan) {
            return response()->json(['message' => 'success', 'data' => $pelanggan], 200);
        }
        return response()->json(['message' => 'register Failed'], 403);

    }

    public function update(Pelanggan $pelanggan, Request $request)
    {
        $pelanggan->name = request('name', $pelanggan->name);
        $pelanggan->nomor_telepon = request('nomor_telepon', $pelanggan->nomor_telepon);
        $pelanggan->jenis_kelamin = request('jenis_kelamin', $pelanggan->jenis_kelamin);
        $pelanggan->nomor_kk = request('nomor_kk', $pelanggan->nomor_kk);
        $pelanggan->alamat = request('alamat', $pelanggan->alamat);
        $pelanggan->id_dusun = request('id_dusun', $pelanggan->id_dusun);
        $pelanggan->save();
        if (!$pelanggan) {
            return response()->json(['message' => 'gagal edit'], 403);
        }
        return response()->json(['message' => 'success', 'data' => $pelanggan], 200);
    }
    public function delete(Pelanggan $pelanggan)
    {
        $delete = $pelanggan->delete();
        if (!$delete) {
            return response()->json(['message' => 'error'],403);
        }
        return response()->json(['message' => 'success'],200);
    }

    public function checkPelanggan($codePelanggan)
    {
        $pelanggan = Pelanggan::where('code_pelanggan',$codePelanggan)->first();
        if ($pelanggan) {
            return response()->json(['message' => 'success get data', 'data' => $pelanggan], 200);
        }
            return response()->json(['message' => 'gagal get data'],403);
    }
}

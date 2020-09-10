<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPegawai;

class DataPegawaiController extends Controller
{
    public function view()
    {
        $view = DataPegawai::with('user')->get();
        return response()->json(['message' => 'succes', 'data' => $view],200);
    }

    public function delete(DataPegawai $pegawai)
    {
        $pegawai->delete();
        return response()->json(['message' => 'Success'], 200);
    }
}

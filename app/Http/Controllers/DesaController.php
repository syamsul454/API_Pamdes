<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\desa;
use App\dusun;
class DesaController extends Controller
{
    public function view()
    {
        return desa::all();
    }

    public function dusun($id)
    {
        return dusun::where('desa_id', $id)->get();
    }

    public function listDusun()
    {
        return dusun::all();
    }
    
}

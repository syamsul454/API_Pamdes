<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\desa;
class DesaController extends Controller
{
    public function view()
    {
        return desa::all();
    }
    
}

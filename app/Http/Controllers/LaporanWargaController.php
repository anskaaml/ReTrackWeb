<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LaporanWargaController extends Controller{
    
    public function index(){
        return view('laporan.laporan-warga');
    }
}
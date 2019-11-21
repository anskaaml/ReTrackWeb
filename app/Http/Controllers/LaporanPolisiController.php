<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LaporanPolisiController extends Controller{
    
    public function index(){
        return view('laporan.laporan-polisi');
    }
}
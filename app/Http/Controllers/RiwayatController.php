<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RiwayatController extends Controller{
    
    public function index(){
        return view('admin.riwayat');
    }
}
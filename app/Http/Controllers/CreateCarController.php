<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CreateCarController extends Controller{
    
    public function index(){
        return view('data.create-car');
    }
}
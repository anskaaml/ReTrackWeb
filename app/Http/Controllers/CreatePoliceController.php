<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CreatePoliceController extends Controller{
    
    public function index(){
        return view('data.create-police');
    }
}
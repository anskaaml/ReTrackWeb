<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DetailsPoliceController extends Controller{
    
    public function index(){
        return view('data.details-police');
    }
}
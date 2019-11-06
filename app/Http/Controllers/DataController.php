<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DataController extends Controller{
    
    public function index(){
        return view('admin.data');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HistoryController extends Controller{
    
    public function index(){
        return view('admin.history');
    }
}
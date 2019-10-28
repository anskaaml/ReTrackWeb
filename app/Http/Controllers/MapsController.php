<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController  extends Controller{
    public function index(){
        Mapper::map([
            [-7.250445, 112.768845],
            [-12.250445, 112.768845]
        ]);
        
        return view('admin.maps');
    }
}


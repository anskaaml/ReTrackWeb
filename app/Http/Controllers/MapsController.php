<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController  extends Controller{
    public function index(){
        Mapper::map(-7.277810, 112.795517);
        return view('admin.maps');
    }
}


<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController extends Controller {
    public function index()
    {
        return view('admin.maps');
    }

    public function mapsOne()
    {
        return view('admin.maps-one');
    }
}


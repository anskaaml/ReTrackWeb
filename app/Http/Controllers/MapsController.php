<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController extends Controller {
    public function index()
    {
        if(Session::get('token')) {
            return view('admin.maps');
        } else {
            return redirect()
                ->route('login');
        }
    }

    public function mapsOne()
    {
        if(Session::get('token')) {
            return view('admin.maps-one');
        } else {
            return redirect()
                ->route('login');
        }
    }
}


<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController  extends Controller {
    // Pure GMAPS with JS & AJAX but only have one marker for every user and marker clusterer
    public function index()
    {
        return view('admin.maps');
    }

    // Pure GMAPS with JS & AJAX. Probably will be using Marker for every user
    public function maps_marker()
    {
        return view('admin.maps-marker');
    }
      
    // GMAPS with Googlmapper library from Sir Cornford
    public function mapper()
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/history/distinct/today', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);

        Mapper::map(-7.27674670, 112.79474210);
        // If we use mapper with marker we gonna do it like this
        // if(isset($jsonObjs)) {
        //     for ($i = 0 ; $i < count($jsonObjs) ; $i++) {
        //         Mapper::marker( (double) $jsonObjs[$i]->history_latitude, (double) $jsonObjs[$i]->history_longitude, [
        //             'icon' => 'assets/img/lokasi-now.png',
        //             'center' => true]);                
        //     }
        // }

        // If we use mapper with polyline we gonna do it like this
        if(isset($jsonObjs)) {
            for ($i = 0 ; $i < count($jsonObjs) - 1 ; $i++) {
                Mapper::polyline([
                    ['latitude' => (double) $jsonObjs[$i]->history_latitude, 'longitude' => (double) $jsonObjs[$i]->history_longitude],
                    ['latitude' => (double) $jsonObjs[$i+1]->history_latitude, 'longitude' => (double) $jsonObjs[$i+1]->history_longitude]
                ]);
            }
        }

        return view('admin.mapper');
    }
}


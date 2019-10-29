<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController  extends Controller{
    public $base_url;
    public $client;
    
    public function __construct()
    {
        $this->base_url = "https://api.retrack-app.site";
        $this->client = new Client();
    }

    public function index() {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/history', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);

        Mapper::map(-7.27674670, 112.79474210);
        
        if(isset($jsonObjs)) {
            for ($i = 0 ; $i < count($jsonObjs) ; $i++) {
                Mapper::marker( (double) $jsonObjs[$i]->history_latitude, (double) $jsonObjs[$i]->history_longitude, [
                    'icon' => 'assets/img/lokasi-now.png',
                    'center' => true]);                
            }
        }

        // Mapper::map((-7.27674670), 112.79474210)->polyline(
        //     [
        //         // ['latitude' => (double) $jsonObjs[0]->history_latitude, 'longitude' => (double) $jsonObjs[0]->history_longitude],
        //         // ['latitude' => (double) end($jsonObjs)->history_latitude, 'longitude' => (double) end($jsonObjs)->history_longitude]
        //     ]
        //     , ['strokeColor' => '#080dcc', 'strokeOpacity' => 1, 'strokeWeight' => 4]);
        
        return view('admin.maps');
    }
}


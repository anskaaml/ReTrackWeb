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
                // print_r($jsonObjs[$i]->history_latitude);
                // die();
                Mapper::marker( (double) $jsonObjs[$i]->history_latitude, (double) $jsonObjs[$i]->history_longitude, [
                    'icon' => 'assets/img/lokasi-now.png',
                    'center' => true]);                
            }
        }

        // Mapper::map((-7.27674670), 112.79474210)->polyline(
        //     [
        //         $jsonObjs
        //         // ['latitude' => -7.27673970, 'longitude' => 112.79475440],
        //         // ['latitude' => -7.27674670, 'longitude' => 112.57297]
        //     ]
        //     , ['strokeColor' => '#080dcc', 'strokeOpacity' => 1, 'strokeWeight' => 4]);
        

        // Mapper::marker(-8.250445, 110.768845, [
        //     'icon' => 'assets/img/lokasi-now.png',
        //     'center' => true]);
        // Mapper::marker(-1.250445, 111.768845, [
        //     'icon' => 'assets/img/lokasi-now.png',
        //     'center' => true]);
        // Mapper::marker(-3.250445, 115.768845, [
        //     'icon' => 'assets/img/lokasi-now.png',
        //     'center' => true,]);
      
        //Mapper::map(52.381128999999990000, 0.470085000000040000)->polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#FF0000', 'strokeOpacity' => 1, 'strokeWeight' => 2]);
        //Mapper::map(52.381128999999990000, 0.470085000000040000)->polygon([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF']);
        return view('admin.maps');
    }
}


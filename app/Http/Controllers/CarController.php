<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/car', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);
        
        return view('data.data-mobil', ['cars' => $jsonObjs]);
    }
}

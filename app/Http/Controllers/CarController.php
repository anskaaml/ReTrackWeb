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

    public function create(Request $request)
    {
        $token = Session::get('token');
        $response= $this->client->request('POST', $this->base_url.'/car', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
            ],
            'form_params' => [
                'car_number' => $request->input('car_number'),
                'car_brand' => $request->input('car_brand'),
                'car_type' => $request->input('car_type')
            ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);
        
        return view('data.create-car', ['cars' => $jsonObjs]);
        return redirect()->route('car');
    }
}

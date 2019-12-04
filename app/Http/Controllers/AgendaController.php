<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller{    
    public function index()
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/team', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            return view('agenda.agenda', ['teams' => $jsonObjs]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function create()
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/car', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            $arr = [];
            for ($i=0; $i < count($jsonObjs); $i++) { 
                $arr[$jsonObjs[$i]->car_id] = $jsonObjs[$i]->car_number;
            }
            
            return view('agenda.create-agenda', ['cars' => $arr]);
        } catch(\Exception $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }
    
    public function show($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/team/'.$id, [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            return view('agenda.detail-agenda', ['team' => $jsonObjs]);
        } catch(\Exception $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }
}
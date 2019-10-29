<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class TrackController extends Controller
{
    public $base_url;
    public $client;
    
    public function __construct()
    {
        $this->base_url = "https://api.retrack-app.site";
        $this->client = new Client();
    }
    
    public function trackAll ()
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/history', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        return $response;
    }
}

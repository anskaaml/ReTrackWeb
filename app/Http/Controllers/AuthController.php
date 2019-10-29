<?php

namespace App\Http\Controllers;

use Session;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $base_url;
    public $client;

    public function __construct()
    {
        $this->base_url = "https://api.retrack-app.site";
        $this->client = new Client();
    }

    public function root()
    {
        $request = $this->client->get($this->base_url);
        $response = $request->getBody();
    
        return $response;
    }

    public function login(Request $request)
    {
        $response = $this->client
            ->request('POST', $this->base_url.'/login',  [
                'form_params' => [
                    'user_employee_id' => $request->input('user_employee_id'),
                    'user_password' => $request->input('user_password')
            ]
        ]);
        
        $response = $response->getBody()->getContents();
        $jsonObj = json_decode($response);
        if (isset($jsonObj->token)) {
            Session::put('token', $jsonObj->token);

            return redirect()->route('home');
        }

        return redirect()->route('login')->with('failed', 'User is not registered');
    }
}

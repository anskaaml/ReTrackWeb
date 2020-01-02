<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function root()
    {
        if(Session::get('token')) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function loginPage()
    {
        if(!Session::get('token')) {
            return view('admin.login');
        } else {
            return redirect()->route('home');
        }
    }

    public function login(Request $request)
    {
        if(!Session::get('token')) {
            $response = $this->client
                ->request('POST', $this->base_url.'/login',  [
                    'form_params' => [
                        'user_employee_id' => $request->input('user_employee_id'),
                        'user_password' => $request->input('user_password')
                ]
            ])->getBody()->getContents();

            $jsonObj = json_decode($response);
            if(isset($jsonObj->token) && isset($jsonObj->role_id)) {
                // 2 is admin id
                if($jsonObj->role_id == 2) {
                    Session::put('token', $jsonObj->token);

                    return redirect()->route('home');
                }
            }

            return redirect()->route('login')->with('failed', 'User is not registered / not allowed to login');
        } else {
            return redirect()->route('home');
        }
    }

    public function logout(Request $request)
    {
        if(Session::get('token')) {
            $request->session()->flush();

            return redirect()->route('login');
        } else {
            return redirect()->route('login');
        }
    }

    public function home(){
        if(Session::get('token')) {
            try {
                $token = Session::get('token');
                $response= $this->client->request('GET', $this->base_url.'/patrol-report/count/status', [
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                        ]
                ])->getBody()->getContents();
            
                $patrolStatuses = json_decode($response);

                return view('admin.home', ['patrolStatuses' => $patrolStatuses]);
            } catch(\GuzzleHttp\Exception\BadResponseException $e) {
                if($e->getResponse()->getStatusCode() == 401) {
                    return redirect()
                        ->route('login');
                } else {
                    echo($e->getResponse()->getBody());
                }
            }
        } else {
            return redirect()->route('login');
        }
    }
}

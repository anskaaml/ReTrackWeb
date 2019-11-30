<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function root()
    {
        $request = $this->client->get($this->base_url);
        $response = $request->getBody();
    
        return $response;
    }

    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $response = $this->client
            ->request('POST', $this->base_url.'/login',  [
                'form_params' => [
                    'user_employee_id' => $request->input('user_employee_id'),
                    'user_password' => $request->input('user_password')
            ]
        ])->getBody()->getContents();

        $jsonObj = json_decode($response);
        if (isset($jsonObj->token)) {
            Session::put('token', $jsonObj->token);

            return redirect()->route('home');
        }

        return redirect()->route('login')->with('failed', 'User is not registered');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login');
    }
}

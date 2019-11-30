<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller{
    public function index()
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/role', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            return view('data.data-role', ['roles' => $jsonObjs]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }
    
    public function show($id){    
        try {
            $jsonObjs = json_decode($this->getRole($id));

            return view('data.detail-role', ['role' => $jsonObjs]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getRole($id)
    {
        $token = Session::get('token');
        return $response= $this->client->request('GET', $this->base_url.'/role/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    }

    public function delete($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('DELETE', $this->base_url.'/role/'.$id.'/delete', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();

            return redirect()
                ->route('role')
                ->with('success', 'Role has been deleted!');
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
        if(Session::get('token')) {
            return view('data.createOrUpdate-role');
        } else {
            return redirect()
                ->route('login');
        }
    }

    public function store(Request $request)
    {
        try {
            $token = Session::get('token');
            $response = $this->client
                ->request('POST', $this->base_url.'/role',  [
                    'form_params' => [
                        'role_name' => $request->input('role_name'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
            
            $jsonObj = json_decode($response);

            return redirect()
                ->route('role')
                ->with('success', 'Role has been created!');
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function edit($id)
    {
        $jsonObjs = json_decode($this->getRole($id));

        return view('data.createOrUpdate-role', ['role' => $jsonObjs]);
    }

    public function update(Request $request, $id)
    {
        try {
            $token = Session::get('token');
            $response = $this->client
                ->request('PUT', $this->base_url.'/role/'.$id, [
                    'form_params' => [
                        'role_name' => $request->input('role_name'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObj = json_decode($response);

            return redirect()
                ->route('role')
                ->with('success', 'Role has been updated!');
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }
}
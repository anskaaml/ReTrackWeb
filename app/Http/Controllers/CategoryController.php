<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/category', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);

        return view('data.data-kategori', ['categories' => $jsonObjs]);
    }

    public function show($id)
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/category/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);

        
    }
}

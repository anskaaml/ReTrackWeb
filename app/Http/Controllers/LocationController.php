<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;


class LocationController extends Controller{
    public function index(Request $request)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/location', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            // Get current page form url e.x. &page=1
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
    
            // Create a new Laravel collection from the array data
            $itemCollection = collect($jsonObjs);
    
            // Define how many items we want to be visible in each page
            $perPage = 5;

            // Slice the collection to get the items to display in current page
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

            // Create our paginator and pass it to the view
            $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
    
            // set url path for generted links
            $paginatedItems->setPath($request->url());

            return view('data.data-lokasi', ['locations' => $paginatedItems]);
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
            $jsonObjs = json_decode($this->getLocation($id));

            return view('data.detail-lokasi', ['location' => $jsonObjs]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getLocation($id)
    {
        $token = Session::get('token');
        return $response= $this->client->request('GET', $this->base_url.'/location/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    }

    public function delete($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('DELETE', $this->base_url.'/location/'.$id.'/delete', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();

            return redirect()
                ->route('location')
                ->with('success', 'Location has been deleted!');
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
            return view('data.createOrUpdate-lokasi');
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
                ->request('POST', $this->base_url.'/location',  [
                    'form_params' => [
                        'location_name' => $request->input('location_name'),
                        'location_longitude' => $request->input('location_longitude'),
                        'location_latitude' => $request->input('location_latitude'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
            
            $jsonObj = json_decode($response);

            return redirect()
                ->route('location')
                ->with('success', 'Location has been created!');
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
        $jsonObjs = json_decode($this->getLocation($id));

        return view('data.createOrUpdate-lokasi', ['location' => $jsonObjs]);
    }

    public function update(Request $request, $id)
    {
        try {
            $token = Session::get('token');
            $response = $this->client
                ->request('PUT', $this->base_url.'/location/'.$id, [
                    'form_params' => [
                        'location_name' => $request->input('location_name'),
                        'location_longitude' => $request->input('location_longitude'),
                        'location_latitude' => $request->input('location_latitude'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObj = json_decode($response);

            return redirect()
                ->route('location')
                ->with('success', 'Location has been updated!');
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
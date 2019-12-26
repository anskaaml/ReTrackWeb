<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class AgendaController extends Controller{    
    public function index(Request $request)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/team', [
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
             $perPage = 10;
 
             // Slice the collection to get the items to display in current page
             $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
             // Create our paginator and pass it to the view
             $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
     
             // set url path for generted links
             $paginatedItems->setPath($request->url());
            

            return view('agenda.agenda', ['teams' => $paginatedItems]);
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

    public function addmember()
    {
        if(Session::get('token')) {
            return view('agenda.add-member');
        } else {
            return redirect()
                ->route('login');
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
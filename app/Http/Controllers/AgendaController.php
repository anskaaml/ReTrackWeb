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
            
            $cars = [];
            for ($i=0; $i < count($jsonObjs); $i++) { 
                $cars[$jsonObjs[$i]->car_id] = $jsonObjs[$i]->car_number;
            }

            $response= $this->client->request('GET', $this->base_url.'/user', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);

            $users = [];
            for ($i=0; $i < count($jsonObjs); $i++) { 
                $users[$jsonObjs[$i]->user_id] = $jsonObjs[$i]->user_name;
            }
            
            return view('agenda.create-agenda', ['cars' => $cars, 'users' => $users]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $token = Session::get('token');
            $response = $this->client
                ->request('POST', $this->base_url.'/agenda',  [
                    'form_params' => [
                        'agenda_date' => date('Y-m-d'),
                        'agenda_status' => true,
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
            
            $jsonObj = json_decode($response);
            $agendaId = $jsonObj->agenda_id;
            
            for($i = 0 ; $i < count($request->input('checkpoint_longitude')) ; $i++) {
                $response = $this->client
                    ->request('POST', $this->base_url.'/checkpoint',  [
                        'form_params' => [
                            'agenda_id' => $agendaId,
                            'checkpoint_longitude' => $request->input('checkpoint_longitude.'.$i),
                            'checkpoint_latitude' => $request->input('checkpoint_latitude.'.$i),
                            'checkpoint_datetime' => gmdate("Y-m-d H:i:s", strtotime($request->input('checkpoint_date.'.$i).' '.$request->input('checkpoint_time.'.$i)))
                        ],
                        'headers' => [
                            'Authorization' => "Bearer {$token}"
                        ]
                ]);
            }

            $response = $this->client
                ->request('POST', $this->base_url.'/team',  [
                    'form_params' => [
                        'car_id' => $request->input('car_id'),
                        'agenda_id' => $agendaId,
                        // Coordinator
                        'user_id' => $request->input('user_id.0'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
            
            $jsonObj = json_decode($response);
            $teamId = $jsonObj->team_id;
            for($i = 0 ; $i < count($request->input('user_id')) ; $i++) {
                if($request->input('user_id.'.$i)) {
                    $response = $this->client
                        ->request('POST', $this->base_url.'/member',  [
                            'form_params' => [
                                'team_id' => $teamId,
                                'user_id' => $request->input('user_id.'.$i),
                            ],
                            'headers' => [
                                'Authorization' => "Bearer {$token}"
                            ]
                    ]);
                }
            }

            return redirect()
                ->route('agenda')
                ->with('success', 'Agenda has been created!');
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
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
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function delete($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('DELETE', $this->base_url.'/agenda/'.$id.'/delete', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();

            return redirect()
                ->route('agenda')
                ->with('success', 'Agenda has been deleted!');
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
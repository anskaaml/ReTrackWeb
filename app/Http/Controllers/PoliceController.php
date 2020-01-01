<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class PoliceController extends Controller{
    public function index(Request $request)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/user', [
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
            $perPage = 3;

             // Slice the collection to get the items to display in current page
             $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
             // Create our paginator and pass it to the view
             $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
     
             // set url path for generted links
             $paginatedItems->setPath($request->url());

            return view('data.data-polisi', ['polices' => $paginatedItems]);
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
            $jsonObjs = json_decode($this->getPolice($id));

            return view('data.detail-polisi', ['police' => $jsonObjs]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getPolice($id)
    {
        $token = Session::get('token');
        return $response= $this->client->request('GET', $this->base_url.'/user/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    }

    public function delete($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('DELETE', $this->base_url.'/user/'.$id.'/delete', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();

            return redirect()
                ->route('police')
                ->with('success', 'Police has been deleted!');
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getGenders()
    {
        $genders['true'] = 'Male';
        $genders['false'] = 'Female';
        
        return $genders;
    }
    
    public function create()
    {
        try {
            $genders = $this->getGenders();
            $roles = $this->getRoles();

            return view('data.createOrUpdate-polisi', ['genders' => $genders, 'roles' => $roles]);
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
                ->request('POST', $this->base_url.'/user',  [
                    'form_params' => [
                        'user_employee_id' => $request->input('user_employee_id'),
                        'user_name' => $request->input('user_name'),
                        'user_password' => $request->input('user_password'),
                        'user_birthdate' => $request->input('user_birthdate'),
                        'user_gender' => $request->input('user_gender'),
                        // 'user_photo' => $request->input('user_photo'),
                        'role_id' => $request->input('role_id'),
                        'user_status' => $request->input('user_status'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
            
            $jsonObj = json_decode($response);

            if($request->user_photo) {
                $file = fopen($request->user_photo->path(), 'r');
                $response = $this->client
                    ->request('PUT', $this->base_url.'/user/'.$jsonObj->user_id, [
                    'multipart' => [
                        [
                            'name'     => 'user_photo',
                            'contents' => $file,
                            'filename' => 'tmp.jpg'
                        ],
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
                ]);
            }

            return redirect()
                ->route('police')
                ->with('success', 'Police has been created!');
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getRoles()
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/role', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    
        $jsonObjs = json_decode($response);
        
        $roles = [];
        for ($i=0; $i < count($jsonObjs); $i++) { 
            $roles[$jsonObjs[$i]->role_id] = $jsonObjs[$i]->role_name;
        }

        return $roles;
    }


    public function edit($id)
    {
        try {
            $police = json_decode($this->getPolice($id));
            $genders = $this->getGenders();
            $roles = $this->getRoles();

            return view('data.createOrUpdate-polisi', ['police' => $police, 'genders' => $genders, 'roles' => $roles]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $token = Session::get('token');
            $response = $this->client
                ->request('PUT', $this->base_url.'/user/'.$id, [
                    'form_params' => [
                        'user_employee_id' => $request->input('user_employee_id'),
                        'user_name' => $request->input('user_name'),
                        'user_password' => $request->input('user_password'),
                        'user_birthdate' => $request->input('user_birthdate'),
                        'user_gender' => $request->input('user_gender'),
                        'role_id' => $request->input('role_id'),
                        'user_status' => $request->input('user_status'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ]);
        
            if($request->user_photo) {
                $file = fopen($request->user_photo->path(), 'r');
                $response = $this->client
                    ->request('PUT', $this->base_url.'/user/'.$id, [
                    'multipart' => [
                        [
                            'name'     => 'user_photo',
                            'contents' => $file,
                            'filename' => 'tmp.jpg'
                        ],
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
                ]);
            }

            return redirect()
                ->route('police')
                ->with('success', 'Police has been updated!');
        } 
        catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } 
            else {
                echo($e->getResponse()->getBody());
                echo($file);
            }
        }
    }
}
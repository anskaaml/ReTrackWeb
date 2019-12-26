<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;


class CaseEntryController extends Controller{
    public function index(Request $request)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/case-entry', [
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

            return view('laporan.laporan-warga', ['case_entries' => $paginatedItems]);
        } catch(\Exception $e) {
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
            $jsonObjs = json_decode($this->getCaseEntry($id));

            return view('laporan.detail-laporanWarga', ['case_entry' => $jsonObjs]);
        } catch(\Exception $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getCaseEntry($id)
    {
        $token = Session::get('token');
        return $response= $this->client->request('GET', $this->base_url.'/case-entry/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    }

    
    public function delete($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('DELETE', $this->base_url.'/case-entry/'.$id.'/delete', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();

            return redirect()
                ->route('case_entry')
                ->with('success', 'Case Entry has been deleted!');
        } catch(\Exception $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }
    
    public function getCategories()
    {
        $token = Session::get('token');
        $response= $this->client->request('GET', $this->base_url.'/category/', [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
        
        $jsonObjs = json_decode($response);
            
        $categories = [];
        for ($i=0; $i < count($jsonObjs); $i++) { 
            $categories[$jsonObjs[$i]->category_id] = $jsonObjs[$i]->category_name;
        }

        return $categories;
    }
    
    public function create()
    {
        try {
            $categories = $this->getCategories();
            
            return view('laporan.createOrUpdate-laporanWarga', ['categories' => $categories]);
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
                ->request('POST', $this->base_url.'/case-entry',  [
                    'form_params' => [
                        'category_id' => $request->input('category_id'),
                        'case_reporter' => $request->input('case_reporter'),
                        'case_date' => $request->input('case_date'),
                        'case_time' => $request->input('case_time'),
                        'case_longitude' => $request->input('case_longitude'),
                        'case_latitude' => $request->input('case_latitude'),
                        'case_description' => $request->input('case_description'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            if($request->case_photo) {
                $file = fopen($request->case_photo->path(), 'r');
                $response = $this->client
                    ->request('PUT', $this->base_url.'/case-entry/'.$jsonObjs->case_id, [
                    'multipart' => [
                        [
                            'name'     => 'case_photo',
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
                ->route('case_entry')
                ->with('success', 'Case Entry has been created!');
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
        try {
            $jsonObjs = json_decode($this->getCaseEntry($id));
            $categories = $this->getCategories();

            return view('laporan.createOrUpdate-laporanWarga', ['case_entry' => $jsonObjs, 'categories' => $categories]);
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
                ->request('PUT', $this->base_url.'/case-entry/'.$id, [
                    'form_params' => [
                        'category_id' => $request->input('category_id'),
                        'case_reporter' => $request->input('case_reporter'),
                        'case_date' => $request->input('case_date'),
                        'case_time' => $request->input('case_time'),
                        'case_longitude' => $request->input('case_longitude'),
                        'case_latitude' => $request->input('case_latitude'),
                        'case_description' => $request->input('case_description'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ]);

            if($request->case_photo) {
                $file = fopen($request->case_photo->path(), 'r');
                $response = $this->client
                    ->request('PUT', $this->base_url.'/case-entry/'.$id, [
                    'multipart' => [
                        [
                            'name'     => 'case_photo',
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
                ->route('case_entry')
                ->with('success', 'Case Entry has been updated!');
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
                echo($file);
            }
        }
    }
}
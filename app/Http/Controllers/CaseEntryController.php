<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseEntryController extends Controller{
    public function index()
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/case-entry', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            return view('laporan.laporan-warga', ['case_entries' => $jsonObjs]);
        } catch(Exception $e) {
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
        } catch(Exception $e) {
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
                ->route('laporan.laporan-warga')
                ->with('success', 'Case Entry has been deleted!');
        } catch(Exception $e) {
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
            return view('laporan.createOrUpdate-laporanWarga');
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
                ->request('POST', $this->base_url.'/case-entry',  [
                    'form_params' => [
                        'category_id' => $request->input('category_id'),
                        'case_reporter' => $request->input('case_reporter'),
                        'case_date' => $request->input('case_date'),
                        'case_time' => $request->input('case_time'),
                        'case_longitude' => $request->input('case_longitude'),
                        'case_latitude' => $request->input('case_latitude'),
                        'case_description' => $request->input('case_description'),
                        'case_photo' => $request->input('case_photo'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
            
            $jsonObj = json_decode($response);

            return redirect()
                ->route('laporan-warga')
                ->with('success', 'Case Entry has been created!');
        } catch(Exception $e) {
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
        $jsonObjs = json_decode($this->getCaseEntry($id));

        return view('laporan.createOrUpdate-laporanWarga', ['case_entry' => $jsonObjs]);
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
                        'case_photo' => $request->input('case_photo'),
                    ],
                    'headers' => [
                        'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObj = json_decode($response);

            return redirect()
                ->route('laporan-warga')
                ->with('success', 'Case Entry has been updated!');
        } catch(Exception $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }
}
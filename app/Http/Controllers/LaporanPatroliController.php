<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers\Controller;

class LaporanPatroliController extends Controller{
    
    public function index(){
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/patrol-report', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            return view('laporan.laporan-patroli', ['patrol_reports' => $jsonObjs]);
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
            $jsonObjs = json_decode($this->getPatrolReport($id));

            return view('laporan.detail-LaporanPatroli', ['patrol_report' => $jsonObjs]);
        } catch(\GuzzleHttp\Exception\BadResponseException $e) {
            if($e->getResponse()->getStatusCode() == 401) {
                return redirect()
                    ->route('login');
            } else {
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getPatrolReport($id)
    {
        $token = Session::get('token');
        return $response= $this->client->request('GET', $this->base_url.'/patrol-report/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    }

}
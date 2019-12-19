<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class CaseReportController extends Controller
{
    public function index()
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('GET', $this->base_url.'/case-report', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();
        
            $jsonObjs = json_decode($response);
            
            return view('laporan.laporan-kasus', ['case_reports' => $jsonObjs]);
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
        try{
            $jsonObjs = json_decode($this->getCar($id));

            return view('laporan.detail-laporanKasus', ['case_report' => $jsonObjs]);
        }catch(\GuzzleHttp\Exception\BadResponseException $e){
            if($e->getResponse()->getStatusCode() == 401){
                return redirect()
                    ->route('login');
            }else{
                echo($e->getResponse()->getBody());
            }
        }
    }

    public function getCaseReport($id){
        $token = Session::get('token');
        return $response= $this->client->request('GET', $this->base_url.'/case-report/'.$id, [
            'headers' => [
                'Authorization' => "Bearer {$token}"
                ]
        ])->getBody()->getContents();
    }

    public function delete($id)
    {
        try {
            $token = Session::get('token');
            $response= $this->client->request('DELETE', $this->base_url.'/case-report/'.$id.'/delete', [
                'headers' => [
                    'Authorization' => "Bearer {$token}"
                    ]
            ])->getBody()->getContents();

            return redirect()
                ->route('case_report')
                ->with('success', 'Case Report has been deleted!');
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

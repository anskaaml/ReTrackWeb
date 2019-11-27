<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AddAgendaController extends Controller{
    
    public function index(){
        return view('agenda.add-agenda');
    }
}
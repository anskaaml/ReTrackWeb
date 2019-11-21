<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TambahAgendaController extends Controller{
    
    public function index(){
        return view('agenda.tambah-agenda');
    }
}
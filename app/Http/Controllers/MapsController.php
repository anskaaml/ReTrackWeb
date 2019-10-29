<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController  extends Controller{
    public function index(){
        Mapper::map(-7.27674670, 112.79474210,[
            'markers' => [
                'icon' => 'assets/img/lokasi-now.png',
                'center' => true,
                'animation' => 'DROP']]);        

        Mapper::marker(-8.250445, 110.768845, [
            'icon' => 'assets/img/lokasi-now.png',
            'center' => true]);
        Mapper::marker(-1.250445, 111.768845, [
            'icon' => 'assets/img/lokasi-now.png',
            'center' => true]);
        Mapper::marker(-3.250445, 115.768845, [
            'icon' => 'assets/img/lokasi-now.png',
            'center' => true,]);
      
        //Mapper::map(52.381128999999990000, 0.470085000000040000)->polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#FF0000', 'strokeOpacity' => 1, 'strokeWeight' => 2]);
        //Mapper::map(52.381128999999990000, 0.470085000000040000)->polygon([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF']);
        return view('admin.maps');
    }
}


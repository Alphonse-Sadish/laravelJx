<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonsController extends Controller
{
    public function index(){
        return view('dons.index');
    }
    public function  achat(){
        return view('dons.achat');
    }

}

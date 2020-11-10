<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    
        public function index(){
          $houses = House::simplePaginate(3);

          return view('home', compact('houses'));

        }
    
}

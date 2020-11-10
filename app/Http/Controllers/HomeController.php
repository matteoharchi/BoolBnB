<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Commentiamo questa funzione perchè middleware è già nelle rotte
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $houses = House::simplePaginate(3);
        return view('home', compact('houses'));
    }
}

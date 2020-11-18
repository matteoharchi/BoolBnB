<?php

namespace App\Http\Controllers\API;

use App\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseController extends Controller {
    public function index() {
        return response()->json(House::all(), 200);
    }
}

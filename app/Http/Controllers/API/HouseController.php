<?php

namespace App\Http\Controllers\API;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Resources\House as HouseResource;
use Illuminate\Http\Request;

class HouseController extends Controller {
    public function index() {
        // return response()->json(House::all(), 200);
        return HouseResource::collection(House::all());
    }
}

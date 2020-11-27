<?php

namespace App\Http\Controllers;

use App\House;
use App\Service;
use App\View;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HouseController extends Controller {

    public function index() {
        // $houses = House::simplePaginate(3);
        $houses = \DB::table('houses')
            ->join('transactions', 'houses.id', '=', 'transactions.house_id')
            ->where('transactions.start_date', '<', Carbon::now('Europe/Rome'))
            ->where('transactions.end_date', '>', Carbon::now('Europe/Rome'))
            ->get();

        return view('home', compact('houses'));

    }

    public function show($slug) {
        $house = House::where('slug', $slug)->first();

        return view('show', compact('house'));
    }

    public function search(Request $request) {
        $data = $request->all();
        $services = Service::all();

        return view('search', ['services' => $services, 'query' => $data]);
    }

    public function postView(Request $request) {
        $newView = new View;
        $newView->house_id = $request->house_id;
        $newView->view_date = Carbon::now('Europe/Rome');
        $newView->save();
        return redirect(route('houses.show', $request->slug));
    }
}

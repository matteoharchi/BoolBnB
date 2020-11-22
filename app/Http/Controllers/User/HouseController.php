<?php

namespace App\Http\Controllers\User;
use App\House;
use App\Http\Controllers\Controller;
use App\Message;
use App\Service;
use App\Transaction;
use App\View;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class HouseController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $yourHouses = House::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        // SELECT *
        // FROM `messages`
        // INNER JOIN `houses`
        // ON messages.house_id = houses.id
        // INNER JOIN `users`
        // ON houses.user_id = users.id

        $yourMessages = \DB::table('messages')
            ->join('houses', 'messages.house_id', '=', 'houses.id')
            ->join('users', 'houses.user_id', '=', 'users.id')
            ->where('user_id', Auth::id())
            ->get();

        $yourTransactions = \DB::table('transactions')
            ->select('transactions.id', 'houses.title', 'transactions.start_date', 'transactions.end_date')
            ->join('houses', 'transactions.house_id', '=', 'houses.id')
            ->join('users', 'houses.user_id', '=', 'users.id')
            ->where('user_id', Auth::id())
            ->get();

        return view('user.index', compact('yourHouses', 'yourMessages', 'yourTransactions'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $services = Service::all();
        return view('user.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->all();
        $request->validate([
            'title' => 'required|min:5|max:100|unique:houses',
            'address' => 'required|min:10|max:200',
            'description' => 'required|min:10|max:1000',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
            'beds' => 'required|numeric',
            'rooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'img' => 'required|image',
        ]);
        $data['slug'] = Str::slug($data['title'], '-');
        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now('Europe/Rome');
        $data['updated_at'] = $data['created_at'];
        if (!empty($data['img'])) {
            $data['img'] = Storage::disk('public')->put('images', $data['img']);
        }
        $newHouse = new House;
        $newHouse->fill($data);
        $saved = $newHouse->save();
        if (!empty($data['services'])) {
            $newHouse->services()->attach($data['services']);
        }
        if ($saved) {
            return redirect()->route('houses.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $house = House::where('slug', $slug)->first();

        return view('show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house) {
        $services = Service::all();

        // Controllo se l'id dell'utente corrisponde all'id proprietario della casa
        if ($house->user_id == Auth::id()) {
            return view('user.edit', compact('house', 'services'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house) {
        // dd('ciao');
        $data = $request->all();
        $request->validate([
            'title' => ['required', 'min:5', 'max:100', Rule::unique('houses')->ignore($house)],
            'address' => 'required|min:10|max:200',
            'description' => 'required|min:10|max:1000',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
            'beds' => 'required|numeric',
            'rooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
        ]);
        $data['slug'] = Str::slug($data['title'], '-');
        $data['updated_at'] = Carbon::now('Europe/Rome');
        // $data['user_id']=Auth::id();
        if (!empty($data['img'])) {
            if (!empty($house->img)) {
                Storage::disk('public')->delete($house->img);
            }
            $data['img'] = Storage::disk('public')->put('images', $data['img']);
        }
        if (!empty($data['services'])) {
            $house->services()->sync($data['services']);
        } else {
            $house->services()->detach();
        }
        $updated = $house->update($data);

        if ($updated) {
            return redirect()->route('houses.index')->with('status', 'Hai modificato l\'annuncio correttamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house) {
        $deleted = $house->delete();
        if ($deleted) {
            return redirect()->route('houses.index')->with('status', 'Hai cancellato l\'annuncio correttamente');
        }
    }


    public function postView(Request $request){
        $newView= new View;
        $newView->house_id = $request->house_id;
        $newView->view_date = Carbon::now('Europe/Rome');
        $newView->save();
        return redirect(route('houses.show', $request->slug));
    }

    public function viewsStats($house_id){
        $monthlyViews=[];
        $monthlyMessages=[];
        for ($i=1; $i <= 12; $i++) {
            //visualizzazioni 
            $monthlyView= View::whereMonth('view_date', $i)->where('house_id', $house_id)->get();
            $monthlyViews[]=$monthlyView;
            // messaggi
            $monthlyMessage= Message::whereMonth('created_at', $i)->where('house_id', $house_id)->get();
            $monthlyMessages[]=$monthlyMessage;
        }
        
        return view('user.stats.stats', compact('monthlyViews', 'monthlyMessages'));
    }

    
}

<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\House;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $request->validate([
            'title'=> 'required|min:5|max:100|unique:houses',
            'address'=> 'required|min:10|max:200',
            'description' => 'required|min:10|max:1000',
            'price'=> 'required|numeric',
            'size'=> 'required|numeric',
            'beds'=> 'required|numeric',
            'rooms'=> 'required|numeric',
            'bathrooms'=>'required|numeric'
        ]);
        $data['slug']=Str::slug($data['title'], '-');
        $data['user_id']=Auth::id();
        $data['created_at'] = Carbon::now('Europe/Rome');
        $data['updated_at'] = $data['created_at'];
        $newHouse= new House;
        $newHouse->fill($data);
        $saved=$newHouse->save();
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        return view('user.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        // dd('ciao');
        $data=$request->all();
        $request->validate([
            'title'=> ['required','min:5','max:100',Rule::unique('houses')->ignore($house)],
            'address'=> 'required|min:10|max:200',
            'description' => 'required|min:10|max:1000',
            'price'=> 'required|numeric',
            'size'=> 'required|numeric',
            'beds'=> 'required|numeric',
            'rooms'=> 'required|numeric',
            'bathrooms'=>'required|numeric'
        ]);
        $data['slug']=Str::slug($data['title'], '-');
        $data['updated_at'] = Carbon::now('Europe/Rome');
        $data['user_id']=Auth::id();
        $updated=$house->update($data);
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
    public function destroy(House $house)
    {
        $deleted=$house->delete();
        if ($deleted) {
            return redirect()->route('houses.index')->with('status', 'Hai cancellato l\'annuncio correttamente');
        }
    }
}

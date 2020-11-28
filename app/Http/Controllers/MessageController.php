<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
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
            'sender_mail' => 'required|email:rfc|',
            'object' => 'required|max:200',
            'body' => 'required|max:3000',
        ]);
        $data['created_at'] = Carbon::now('Europe/Rome');
        $data['updated_at'] = Carbon::now('Europe/Rome');
        $newMessage = new Message;
        $newMessage->fill($data);
        $saved = $newMessage->save();
        if ($saved) {
            return back()->with('status', 'messaggio inviato correttamente');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}

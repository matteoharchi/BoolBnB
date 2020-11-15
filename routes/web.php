<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/search', function () {
    return view('search');
});

Auth::routes();
//rotte case di user
Route::prefix('user')->namespace('User')->middleware('auth')->group(function () {
    Route::resource('settings/houses', 'HouseController');
    Route::get('/settings', 'HouseController@index');
    // Route::post('/settings/updateinfo', 'UserController@update')->name('user.update');
    Route::get('/settings/houses/show/{slug}', 'HouseController@show');
    //rotte sponsor
    Route::resource('settings/houses/sponsor', 'SponsorController');
    //rotte messaggi
    Route::resource('settings/houses/messages', 'MessageController');


    //rotte pagamenti
        //parte front
    Route::get('settings/houses/sponsor/create', function(){
        //prende dati validazione da services
        $gateway= new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey'=> config('services.braintree.publicKey'),
            'privateKey'=>config('services.braintree.privateKey')
        ]);
        //genera il client token
        $token = $gateway->ClientToken()->generate();
        return view('user.sponsor.create',['token'=>$token]);
    });
        //parte back
    Route::post('checkout', function(Request $request){
        $gateway= new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey'=> config('services.braintree.publicKey'),
            'privateKey'=>config('services.braintree.privateKey')
        ]);
        //definisco ammontare e metodo di pagamento
        $amount= $request->amount;
        $nonce= $request->payment_method_nonce;
        //crea un oggetto le cui proprietà sono i dati del pagamento
        $result= $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName'=>'Gino',
                'lastName'=>'Beppe',
                'email'=> 'gino@gmail.com',
            ],
            'options'=>[
                'submitForSettlement'=> true
            ]
            ]);
        //se la transazione avviene con sucecsso allora ritorna messaggio di conferma, altrimenti torna indietro con errore.
        if ($result->success) {
            $transaction = $result->transaction;
            return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    });
    // Route::get('/hosted', function () {
    //     $gateway = new Braintree\Gateway([
    //         'environment' => config('services.braintree.environment'),
    //         'merchantId' => config('services.braintree.merchantId'),
    //         'publicKey' => config('services.braintree.publicKey'),
    //         'privateKey' => config('services.braintree.privateKey')
    //     ]);

    //     $token = $gateway->ClientToken()->generate();

    //     return view('hosted', [
    //     'token' => $token
    //     ]);
    // });
});

//rotte case guest
Route::get('/', 'HouseController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('houses/show/{slug}', 'HouseController@show')->name('houses.show');



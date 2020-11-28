<?php

namespace App\Http\Controllers\User;
use App\House;
use App\Http\Controllers\Controller;
use App\Sponsor;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

    }

    // Genera sponsor e token e li manda al front-end
    public function getPay($id) {

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $token = $gateway->ClientToken()->generate();
        $sponsors = Sponsor::all();
        $id = House::where('id', $id)->first();
        return view('user.sponsor.create', ['token' => $token, 'sponsors' => $sponsors, 'id' => $id]);

    }

    public function postPay(Request $request) {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $house = House::where('id', $request->house_id)->first();
        $data = $request->all();

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        // controllo se la casa ha già uno sponsor
        $houseTransaction = Transaction::where('house_id', $request->house_id)->whereDate('end_date', '>', Carbon::now())->get();
        // parte se non c'è
        if (count($houseTransaction) == 0) {
            // transazione con dati di pagamento
            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'customer' => [
                    'firstName' => Auth::user()->name,
                    'lastName' => Auth::user()->surname,
                    'email' => Auth::user()->email,
                ],
                'options' => [
                    'submitForSettlement' => true,
                ],
            ]);

            // aggiungo sponsorizzazione al DB
            if ($result->success) {
                $transaction = $result->transaction;
                $data['start_date'] = Carbon::now('Europe/Rome');
                $data['end_date'] = Carbon::now('Europe/Rome')->addHours($data['duration']);
                $newTransaction = new Transaction;
                $newTransaction->fill($data);
                $saved = $newTransaction->save();
                // messaggio di successo in caso di transazione avvenuta
                if ($saved) {
                    return back()->with('success_message', 'Transazione andata a buon fine. ID pagamento: ' . $transaction->id);
                }
            } else {
                $errorString = "";

                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }

                return back()->withErrors('Si è verificato un errore: ' . $result->message);
            }
            // errore in caso di sponsorizzazione già attiva
        } else {
            return back()->withErrors('Si è verificato un errore: ' . 'Hai già una sponsorizzazione attiva su questo annuncio');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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

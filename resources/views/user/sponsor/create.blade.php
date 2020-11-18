@extends('layouts.app')
@section('content')
<div class="container text-light">

    <h2>Sponsorizza il tuo appartamento</h2>
    {{-- andrà messo il collegamento al titolo della casa --}}
    <p>Scegli la modalità di sponsorizzazione:</p>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
            Normal: €2,99 per 24 ore di sponsorizzazione.
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            Premium: €5,99 per 72 ore di sponsorizzazione.
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            VIP: €9,99 per 144 ore di sponsorizzazione.
        </label>
    </div>
    {{-- <a href="" class="btn btn-success">Conferma</a> --}}

    <div class="container">
                <form method="post" id="payment-form" action="{{ url('/user/checkout') }}">
                    @csrf
                    <section>
                        <label for="amount">
                            <span class="input-label">Amount</span>
                            <div class="input-wrapper amount-wrapper">
                                <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                            </div>
                        </label>

                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>

                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="button" type="submit"><span>Test Transaction</span></button>
                </form>
            </div>
        </div>
    </body>
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
                flow: 'vault'
            }
        }, function (createErr, instance) {
            if (createErr) {
            console.log('Create Error', createErr);
            return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                    return;
                    }
                // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>





    @endsection

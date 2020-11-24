@extends('layouts.authlayout')
@section('content')

<div class="container text-light">

    <div class="sponsor-select">
        <h2>Sponsorizza il tuo appartamento</h2>
        {{-- andrà messo il collegamento al titolo della casa --}}
        <p>Scegli la modalità di sponsorizzazione:</p>
        <div id="sponsor-box">
            @foreach ($sponsors as $sponsor)
                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="sponsor" id="{{$sponsor->id}}" value="{{$sponsor->price}}">
                    <label class="form-check-label" for="sponsor">
                        {{$sponsor->name}}: €{{$sponsor->price}} per {{$sponsor->duration}} ore di sponsorizzazione.
                    </label>
                </div>
            @endforeach
        </div>
    </div>  

    {{-- <a href="" class="btn btn-success">Conferma</a> --}}

        <form method="post" id="payment-form" action="{{ route('checkout') }}">
            @csrf
            
                <label for="house_id">
                    <div class="input-wrapper">
                    <input id="house_id" name="house_id" type="hidden" min="1" value="{{request()->route('id')}}">
                    </div>
                </label>
                <label for="amount">
                    <div class="input-wrapper amount-wrapper">
                        <input id="amount" name="amount" type="hidden" min="1" value="">
                    </div>
                </label>
                <label for="sponsor_id">
                    <div class="input-wrapper">
                        <input id="sponsor_id" name="sponsor_id" type="hidden" min="1" value="">
                    </div>
                </label>
                <label for="duration">
                    <div class="input-wrapper">
                        <input id="duration" name="duration" type="hidden" min="1" value="">
                    </div>
                </label>
                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            
            <input id="nonce" name="payment_method_nonce" type="hidden"/>
            <button id="payment-btn" class="btn btnwhite" type="submit"><span>Paga Ora</span></button>
        </form>
    
</div>
   
{{-- Script pagamento sponsor --}}
{{-- <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script> --}}
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{ $token }}";
    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        // paypal: {
        //     flow: 'vault'
        // }
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

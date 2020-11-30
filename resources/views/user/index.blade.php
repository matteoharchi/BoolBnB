@extends('layouts.authlayout')
@section('content')

{{-- Barra messaggi di stato CRUD --}}
@if (session('status'))
      <div class="alert alert-success rounded-0 conferma" style="position:absolute; width:100vw">
        {{ session('status') }}
      </div>
@endif
@if ($errors->any())
<div class="alert alert-danger error" style="position: absolute; width:100vw;">
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif

<div class="container">
    
    <div class="row dashboard" id="app">
        <div class="col-lg-2 col-md-12 pl-md-2 pr-md-2 pr-sm-0 pl-sm-0 dash-index">
            <div class="list-group flex-lg-column offset-lg-0 col-lg-12 pl-lg-0 pr-lg-0 flex-md-row col-md-12 pr-md-5 pl-md-5 col-12 pr-0 mb-2" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active col-lg-12 col-md-4 pr-md-1 pl-md-1" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">I tuoi appartamenti</a>
                <a class="list-group-item list-group-item-action col-lg-12 col-md-4 pr-md-1 pl-md-1" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messaggi</a>
                <a class="list-group-item list-group-item-action col-lg-12 col-md-4 pr-md-1 pl-md-1" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Pagamenti e compensi</a>
            </div>
        </div>
        <div class="col-lg-10 offset-lg-0 col-md-10 offset-md-1 col-sm-12 pl-sm-0 pr-sm-0">
            <div class="tab-content" id="nav-tabContent">
                <div class="dashboard-section tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <houses :your_houses="{{$yourHouses->toJson()}}"></houses>
                </div>
                <div class="dashboard-section tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    {{-- <table class="col-12">
                        <thead class="head">
                            <th class="col-4 pl-1 col-sm-4 pl-sm-3 col-lg-4 pl-lg-3">Mittente</th>
                            <th class="col-6  col-sm-3 pl-0 pl-sm-1 col-lg-3">Oggetto</th>
                            <th class="col-0  col-sm-3 pr-sm-1 pl-1 pl-sm-0 col-lg-3 message-body">Testo</th>
                            <th class="col-2  col-sm-2 pl-sm-4 pl-0 col-lg-2">Casa</th>
                        </thead>
                    </table> --}}
                    <messages :your_messages="{{$yourMessages->toJson()}}"></messages>
                </div>
                <div class="dashboard-section tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    {{-- <table class="col-12">
                        <thead>
                            <th class="col-4 pl-3 pl-lg-3">N. pagamento</th>
                            <th class="col-4 col-lg-5 pl-2  pr-0">Annuncio</th>
                            <th class="col-4 col-lg-4 pl-3">Scadenza</th>
                        </thead>
                    </table> --}}
                    <transactions :your_transactions="{{$yourTransactions->toJson()}}"></transactions>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
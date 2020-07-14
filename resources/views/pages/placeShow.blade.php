@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card my-4 d-flex align-items-center">
        @if(!empty($place->place_img))
            <img src="{{asset('storage/' . $place->place_img)}}" class="card-img-top" alt="logo" style="width: 18rem; height: 20rem;">
        @else
            <div class="no-image text-danger">No image</div>
        @endif
        <h3 class="card-title">{{$place->title}}</h3>
        <h5 class="card-subtitle text-muted text-sm">{{$place->address}} - {{$place->city}} - {{$place->country}}</h5>
        <h5 class="card-text h3 text-primary my-3">€{{$place->price}}</h5>
        <p>Descrizione: {{$place->description}}</p>
        <h5 class="card-text h6">Numero stanze: {{$place->num_rooms}}</h5>
        <h5 class="card-text h6">Posti letto: {{$place->num_beds}}</h5>
        <h5 class="card-text h6">Bagni: {{$place->num_baths}}</h5>
        <h5 class="card-text h6">Dimensioni: {{$place->square_m}}</h5>
    </div>
</div>

<canvas id="myChart"></canvas>

<h2>Contatta il venditore!</h2>
@include('shared.sendMessageArea')

@endsection
@extends('layouts.app')

@section('content')

<div class="cards d-flex justify-content-center mt-4">
    <div class="card mb-4 text-center" style="width: 30rem;">
        @if(!empty($place->place_img))
            <img src="{{asset('storage/' . $place->place_img)}}" class="card-img-top" alt="logo">
        @else
            <div class="no-image">No image</div>
        @endif
        <div class="card-body">
            <h3 class="card-title">{{$place->title}}</h3>
            <h5 class="card-subtitle text-muted text-sm">{{$place->address}} - {{$place->city}} - {{$place->country}}</h5>
            <h5 class="card-text h3 text-primary my-3">€{{$place->price}}</h5>
            <p>Descrizione: {{$place->description}}</p>
            <h5 class="card-text h6">Numero stanze: {{$place->num_rooms}}</h5>
            <h5 class="card-text h6">Posti letto: {{$place->num_beds}}</h5>
            <h5 class="card-text h6">Bagni: {{$place->num_baths}}</h5>
            <h5 class="card-text h6">Dimensioni: {{$place->square_m}}</h5>
            @auth <a class="btn btn-success" href="{{ route('user.payment',$place->id) }}">Buy Sponsor</a> @endauth
        </div>
        
    </div>
</div>


<h2>Contatta il venditore!</h2>
@include('shared.sendMessageArea')

@endsection
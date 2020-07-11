@extends('layouts.app')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            <p>Messaggio {{ session('message') }} Inviato</p>
        </div>
    @endif

    <div class="places-group container">
        @foreach ($places as $place)
            <a href="{{route('place.show', $place->slug)}}">
                <div class="places-group__box mb-4">
                    <h3>{{$place->title}}</h3>
                    <img src="{{$place->place_img}}" alt="{{$place->title}}">
                    <p>Descrizione: {{$place->description}}</p>
                    <h5>Numero stanze: {{$place->num_rooms}}</h5>
                    <h5>Posti letto: {{$place->num_beds}}</h5>
                    <h5>Bagni: {{$place->num_baths}}</h5>
                    <h5>Dimensioni: {{$place->square_m}}</h5>
                    <h5>{{$place->address}} - {{$place->city}} - {{$place->country}}</h5>
                    <h5>€{{$place->price}}</h5>
                </div>
            </a>
        @endforeach
    </div>

@endsection
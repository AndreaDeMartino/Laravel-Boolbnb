@extends('layouts.app')

@section('content')

<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card my-4 d-flex align-items-center">
        @if(!empty($place->place_img))
            <img src="{{asset('storage/' . $place->place_img)}}" class="card-img-top" alt="logo" style="width: 18rem;">
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
        <input type="hidden" name="lat" id="lat" value="{{ $place->lat }}">
        <input type="hidden" name="long" id="long" value="{{ $place->long }}">
        <div class="card-text" id="mapid" style=" width: 300px;"></div>
    </div>
</div>

<h2>Contatta il venditore!</h2>
@include('shared.sendMessageArea')


<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
<script src="{{ asset('js/map.js') }}"></script>
@endsection
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

    <div class="place-show">
        <div class="container mt-5">
            <div class="row d-flex align-items-center mb-4">
                <div class="col-lg-6 col-md-12 col-sm-12 order-2 order-lg-1">
                    <h3 class="text-center">{{$place->title}}</h3>
                    <h5 class="text-center">{{$place->address}} - {{$place->city}}</h5>
                    <p class="place-show__description">{{$place->description}}</p>
                    <hr>
                    <h6>Caratteristiche:</h6>
                    <ul class="">
                        <li class="place-show__list-info">Numero stanze: {{$place->num_rooms}}</li>
                        <li class="place-show__list-info">Posti letto: {{$place->num_beds}}</li>
                        <li class="place-show__list-info">Bagni: {{$place->num_baths}}</li>
                        <li class="place-show__list-info">Dimensioni: {{$place->square_m}}m²</li>
                    </ul>
                    <hr>
                    {{-- Servizi --}}
                    <div class="d-flex align-items-center">
                        <span class="d-inline-block mr-2">Servizi inclusi</span>
                        @forelse ( $place->amenities as $amenity )
                            <span class="badge badge-pill badge-primary mr-1">{{ $amenity->name }}</span>
                        @empty
                            <span class="badge badge-pill badge-info">Nessun servizio incluso</span>
                        @endforelse
                    </div>
                    <h5 class="text-lg-right text-md-right text-center my-3 my-3-lg my-3-md h3 font-weight-bold" style="color: #e141b9">{{round($place->price)}}€ a notte</h5>
                    <input type="hidden" name="lat" id="lat" value="{{ $place->lat }}">
                    <input type="hidden" name="long" id="long" value="{{ $place->long }}">
                </div>
    
                <div class="col-lg-6 col-md-12 col-sm-12 order-1 order-lg-2 mb-3 mb-lg-0">
                    @if(!empty($place->place_img))
                        <img src="{{asset('storage/' . $place->place_img)}}" class="img-fluid rounded" alt="immaginecasa" style="max-width: 100%; height: auto;">
                    @else
                        <div class="no-image text-danger">No image</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <div id="mapid" class="rounded-lg" style="height: 300px"></div>
            </div> 
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h5 class="text-center">Contatta il venditore</h5>
                @include('shared.sendMessageArea')
            </div> 
            
        </div>
    </div>
</div>



<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
<script src="{{ asset('js/map.js') }}"></script>
@endsection
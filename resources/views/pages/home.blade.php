@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-4">Tutti gli appartamenti</h2>

    @if (session('message'))
        <div class="alert alert-success">
            <p>Messaggio "{{ session('message') }}" Inviato</p>
        </div>
    @endif

    <div class="cards d-flex flex-wrap justify-content-center mt-4">
        {{-- @foreach ($places as $place)
            <a class="card m-4" href="{{route('place.show', $place->slug)}}" style="width: 40%">
                @if(!empty($place->place_img))
                    <img src="{{ asset('storage/' . $place->place_img)}}" class="card-img-top" alt="logo" style="height: 20rem">
                @else
                    <div class="no-image">No image</div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$place->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$place->address}} - {{$place->city}} - {{$place->country}}</h6>
                    <p class="card-text text-sm text-muted">{{$place->description}}</p>
                </div>
            </a>
        @endforeach --}}

        <div class="sponsored d-flex flex-wrap justify-content-center mt-3">
            @foreach ($placesSponsored as $placeSponsored)
                <div class="card text-center bg-primary text-light {{ !$loop->last ? 'mb-4' : '' }}">
                    @if(!empty($placeSponsored->place_img))
                        <img src="{{asset('storage/' . $placeSponsored->place_img)}}" alt="{{$placeSponsored->title}}" style="height: 20rem">
                    @else
                        <div class="no-image">No image</div>
                    @endif
                    <a class="card-title text-light h5 my-3" href="{{ route('place.show', $placeSponsored->slug)}}">{{$placeSponsored->title}}</a>
                    <h5 class="card-subtitle text-warning mb-3">Città: {{$placeSponsored->city}}</h5>
                    
                    <h5 class="card-subtitle text-light h6 mb-2">Indirizzo: {{$placeSponsored->address}}</h5>
                    <h5 class="card-subtitle text-light h6 mb-2">Descrizione: {{$placeSponsored->description}}</h5>
                    <h5 class="card-subtitle text-light h6 mb-2">Prezzo: €{{$placeSponsored->price}}</h5>
                </div>
            @endforeach
        </div>

        <div class="unsponsored d-flex flex-wrap justify-content-center mt-5">
            @foreach ($placesUnsponsored as $placeUnsponsored)
                <div class="card text-center {{ !$loop->last ? 'mb-4' : '' }}">
                    @if(!empty($placeUnsponsored->place_img))
                        <img src="{{asset('storage/' . $placeUnsponsored->place_img)}}" alt="{{$placeUnsponsored->title}}" style="height: 20rem">
                    @else
                        <div class="no-image">No image</div>
                    @endif
                    <a class="card-title text-primary h5 my-3" href="{{ route('place.show', $placeUnsponsored->slug)}}">{{$placeUnsponsored->title}}</a>
                    <h5 class="card-subtitle mb-3">Città: {{$placeUnsponsored->city}}</h5>
                    
                    <h5 class="card-subtitle text-secondary h6">Indirizzo: {{$placeUnsponsored->address}}</h5>
                    <h5 class="card-subtitle text-secondary h6 my-2">Descrizione: {{$placeUnsponsored->description}}</h5>
                    <h5 class="card-subtitle text-secondary h6 my-2">Prezzo: €{{$placeUnsponsored->price}}</h5>

                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="pagination d-flex justify-content-end mt-5">
        {{ $places->links() }}
    </div> --}}

@endsection
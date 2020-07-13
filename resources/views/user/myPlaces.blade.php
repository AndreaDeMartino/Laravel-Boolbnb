@extends('layouts.app')

@section('content')
    <div class="my-places">
        <div class="container">
            @foreach ($places as $place)
                @if ($place->user_id == $user->id)
                    <div class="my-place-box">
                        <a href="{{route('place.show', $place->slug)}}">
                            @if(!empty($place->place_img))
                                {{-- <img src="{{asset('storage/' . $place->place_img)}}" alt="{{$place->title}}"> --}}
                                <img src="{{$place->place_img}}" alt="{{$place->title}}">
                            @else
                                <div class="no-image">No image</div>
                            @endif
                        </a>
                        <h5>Città: {{$place->city}}</h5>
                        <h5>Indirizzo: {{$place->address}}</h5>
                        <h5>{{$place->title}}</h5>
                        <h5>Descrizione{{$place->description}}</h5>
                        <h5>Prezzo: €{{$place->price}}</h5>

                        <div class="my-place-box__actions">
                            <a href="{{route('user.place.edit', $place->slug)}}">Modifica</a>
                            <a href="#">Cancella</a>
                            <a href="#">Acquista Sponsorship!</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
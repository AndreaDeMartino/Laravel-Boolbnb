@extends('layouts.app')

@section('content')

    @if (session('place-deleted'))
    <div class="alert alert-success">
        <p>Appartamento {{ session('place-deleted') }} Eliminato</p>
    </div>
    @endif

    <div class="my-places">
        <div class="container d-flex flex-align-items-center">
            @foreach ($places as $place)
                @if ($place->user_id == $user->id)
                    <div class="card my4 text-center" style="width: 30rem;">
                        <a href="{{route('place.show', $place->slug)}}">
                            @if(!empty($place->place_img))
                                <img src="{{asset('storage/' . $place->place_img)}}" alt="{{$place->title}}" style="width: 30rem;">
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
                            <form action="{{ route('user.place.destroy',$place->slug) }}" method="post">
                                @csrf
                                @method('delete')
                 
                                <input class="btn btn-danger" type="submit" value="DELETE">
                                </form>
                                <a class="btn btn-success" href="{{ route('user.payment',$place->id) }}">Buy Sponsor</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
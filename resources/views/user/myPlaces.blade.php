@extends('layouts.app')

@section('content')

    @if (session('place-deleted'))
    <div class="alert alert-danger">
        <p>Appartamento {{ session('place-deleted') }} Eliminato</p>
    </div>
    @endif

    @if (session('hide') == 1)
        <div class="alert alert-success">
            <p>L'appartamento è stato reso visibile</p>
        </div>
    @elseif(session('hide') == 0)
        <div class="alert alert-secondary">
            <p>L'appartamento è stato nascosto</p>
        </div>
    @endif

    <div class="cards d-flex justify-content-center">
        @foreach ($places as $place)
            @if ($place->user_id == $user->id)
                <div class="card text-center" style="width: 30rem;">
                    <a class="card-img-top" href="{{route('place.show', $place->slug)}}">
                        @if(!empty($place->place_img))
                            <img src="{{asset('storage/' . $place->place_img)}}" alt="{{$place->title}}" style="width: 30rem;">
                        @else
                            <div class="no-image">No image</div>
                        @endif
                    </a>
                    <h5 class="card-title text-primary h5 my-3">{{$place->title}}</h5>
                    <h5 class="card-subtitle">Città: {{$place->city}}</h5>

                    <h5>
                        @if($place->visibility)
                        <span class="badge badge-success my-2">Visibile</span> 
                        @else
                        <span class="badge badge-secondary my-2">Nascosto</span> 
                        @endif
                    </h5>
                    
                    <h5 class="card-subtitle text-secondary h6 mb-2">Indirizzo: {{$place->address}}</h5>
                    <h5 class="card-subtitle text-secondary h6 mb-2">Descrizione: {{$place->description}}</h5>
                    <h5 class="card-subtitle text-secondary h6 mb-2">Prezzo: €{{$place->price}}</h5>

                    <div class="my-place-box__actions d-flex justify-content-center my-2">
                        {{-- Modifica --}}
                        <a class="btn btn-primary btn-sm" href="{{route('user.place.edit', $place->slug)}}">Modifica</a>
                        {{-- Elimina --}}
                        <form class="mx-5" action="{{ route('user.place.destroy',$place->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger btn-sm" type="submit" value="Cancella">
                        </form>
                        {{-- Sponsorizza --}}
                        <a class="btn btn-success btn-sm" href="{{ route('user.payment',$place->id) }}">Sponosorizza</a>
                        {{-- Nascondi --}}
                        <form class="ml-5" action="{{route('user.place.visibility', $place->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <input class="btn btn-info btn-sm" type="submit" 
                            value="@if ($place->visibility == 1) Nascondi @else Mostra @endif ">
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
@extends('layouts.app')

@section('content')

    {{-- Place Cancellato --}}
    @if (session('place-deleted'))
    <div class="alert alert-danger">
        <p>Appartamento {{ session('place-deleted') }} Eliminato</p>
    </div>
    @endif

    {{-- Place Visibility --}}
    @if (session('hide'))
        <div class="alert alert-success">
            <p>L'appartamento <span class="text-primary">{{ session('place') }}</span> è stato reso visibile</p>
        </div>
    @endif

    {{-- Sponosor Pay --}}
    @if(session('transId'))
    <div class="alert alert-warning">
        <p>Per l'appartamento {{ session('placeBuy') }} è stato processato correttamente l'ordine {{ session('transId') }}</p>
    </div>
    @endif

    <div class="cards d-flex justify-content-center mt-5">
        @foreach ($places as $place)
            @if ($place->user_id == $user->id)
                <div class="card text-center mr-3">
                    @if(!empty($place->place_img))
                        <img src="{{asset('storage/' . $place->place_img)}}" alt="{{$place->title}}" style="height: 20rem">
                    @else
                        <div class="no-image">No image</div>
                    @endif
                    <a class="card-title text-primary h5 my-3" href="{{ route('place.show', $place->slug)}}">{{$place->title}}</a>
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

                    <div class="my-place-box__actions d-flex justify-content-center my-2 p-3">
                        {{-- Modifica --}}
                        <a class="btn btn-primary btn-sm" href="{{route('user.place.edit', $place->slug)}}">Modifica</a>
                        {{-- Elimina --}}
                        <form class="ml-2" action="{{ route('user.place.destroy',$place->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger btn-sm" type="submit" value="Cancella">
                        </form>
                        {{-- Sponsorizza --}}
                        <a class="btn btn-warning btn-sm ml-2" href="{{ route('user.payment',$place->id) }}">Sponosorizza</a>
                        {{-- Nascondi --}}
                        <form class="ml-2" action="{{route('user.place.visibility', $place->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <input class="btn btn-secondary btn-sm" type="submit" 
                            value="@if ($place->visibility) Nascondi @else Mostra @endif ">
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
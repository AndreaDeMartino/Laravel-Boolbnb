@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-4">Le mie inserzioni</h2>

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

    <div class="cards d-flex flex-wrap justify-content-center">

        <div class="sponsored d-flex flex-wrap justify-content-center mt-3">
            @foreach ($placesSponsored as $placeSponsored)
                @if ($placeSponsored->user_id == $user->id)
                    <div class="card text-center mr-3 bg-primary text-light {{ !$loop->last ? 'mb-4' : '' }}">
                        @if(!empty($placeSponsored->place_img))
                            <img src="{{asset('storage/' . $placeSponsored->place_img)}}" alt="{{$placeSponsored->title}}" style="height: 20rem">
                        @else
                            <div class="no-image">No image</div>
                        @endif
                        <a class="card-title text-light h5 my-3" href="{{ route('place.show', $placeSponsored->slug)}}">{{$placeSponsored->title}}</a>
                        <h5 class="card-subtitle text-warning">Città: {{$placeSponsored->city}}</h5>

                        <h5>
                            @if($placeSponsored->visibility)
                            <span class="badge badge-success my-2">Visibile</span> 
                            @else
                            <span class="badge badge-light my-2">Nascosto</span> 
                            @endif
                        </h5>
                        
                        <h5 class="card-subtitle text-light h6 mb-2">Indirizzo: {{$placeSponsored->address}}</h5>
                        <h5 class="card-subtitle text-light h6 mb-2">Descrizione: {{$placeSponsored->description}}</h5>
                        <h5 class="card-subtitle text-light h6 mb-2">Prezzo: €{{$placeSponsored->price}}</h5>

                        <div class="my-place-box__actions d-flex justify-content-center my-2 p-3">
                            {{-- Modifica --}}
                            <a class="btn btn-secondary btn-sm" href="{{route('user.place.edit', $placeSponsored->slug)}}">Modifica</a>
                            {{-- Elimina --}}
                            <form class="ml-2" action="{{ route('user.place.destroy',$placeSponsored->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger btn-sm" type="submit" value="Cancella">
                            </form>
                            {{-- Pagina Statistiche --}}
                            {{-- <a class="btn btn-info btn-sm ml-2" href="{{ route('user.place.stats',$placeSponsored->slug) }}">Visualizza Statistiche</a> --}}
                            {{-- Nascondi --}}
                            <form class="ml-2" action="{{route('user.place.visibility', $placeSponsored->id)}}" method="POST">
                                @csrf
                                @method('POST')
                                <input class="btn btn-light btn-sm" type="submit" 
                                value="@if ($placeSponsored->visibility) Nascondi @else Mostra @endif ">
                            </form>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>

        <div class="unsponsored d-flex flex-wrap justify-content-center mt-5">
            @foreach ($placesUnsponsored as $placeUnsponsored)
                @if ($placeUnsponsored->user_id == $user->id)
                    <div class="card text-center {{ !$loop->last ? 'mb-4' : '' }}">
                        @if(!empty($placeUnsponsored->place_img))
                            <img src="{{asset('storage/' . $placeUnsponsored->place_img)}}" alt="{{$placeUnsponsored->title}}" style="height: 20rem">
                        @else
                            <div class="no-image">No image</div>
                        @endif
                        <a class="card-title text-primary h5 my-3" href="{{ route('place.show', $placeUnsponsored->slug)}}">{{$placeUnsponsored->title}}</a>
                        <h5 class="card-subtitle">Città: {{$placeUnsponsored->city}}</h5>

                        <h5>
                            @if($placeUnsponsored->visibility)
                            <span class="badge badge-success my-2">Visibile</span> 
                            @else
                            <span class="badge badge-secondary my-2">Nascosto</span> 
                            @endif
                        </h5>
                        
                        <h5 class="card-subtitle text-secondary h6 mb-2">Indirizzo: {{$placeUnsponsored->address}}</h5>
                        <h5 class="card-subtitle text-secondary h6 mb-2">Descrizione: {{$placeUnsponsored->description}}</h5>
                        <h5 class="card-subtitle text-secondary h6 mb-2">Prezzo: €{{$placeUnsponsored->price}}</h5>

                        <div class="my-place-box__actions d-flex justify-content-center my-2 p-3">
                            {{-- Modifica --}}
                            <a class="btn btn-primary btn-sm" href="{{route('user.place.edit', $placeUnsponsored->slug)}}">Modifica</a>
                            {{-- Elimina --}}
                            <form class="ml-2" action="{{ route('user.place.destroy',$placeUnsponsored->slug) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger btn-sm" type="submit" value="Cancella">
                            </form>
                            {{-- Sponsorizza --}}
                            <a class="btn btn-warning btn-sm ml-2" href="{{ route('user.payment',$placeUnsponsored->id) }}">Sponosorizza</a>
                            {{-- Pagina Statistiche --}}
                            {{-- <a class="btn btn-info btn-sm ml-2" href="{{ route('user.place.stats',$placeUnsponsored->slug) }}">Visualizza Statistiche</a> --}}
                            {{-- Nascondi --}}
                            <form class="ml-2" action="{{route('user.place.visibility', $placeUnsponsored->id)}}" method="POST">
                                @csrf
                                @method('POST')
                                <input class="btn btn-secondary btn-sm" type="submit" 
                                value="@if ($placeUnsponsored->visibility) Nascondi @else Mostra @endif ">
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
    </div>
@endsection
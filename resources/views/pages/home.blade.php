@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-4">Tutti gli appartamenti</h2>


    {{-- Errori --}}
    @if (session('message'))
        <div class="alert alert-success">
            <p>Messaggio "{{ session('message') }}" Inviato</p>
        </div>
    @endif


    {{-- Ricerca --}}
    <div class="search">
        <form class="message-form" action="#" method="GET" enctype="multipart/form-data">
            @csrf
            @method('GET')

            <div class="form-group">
                <label for="city">Città</label>
                <input class="form-control"type="text" name="city" id="city" value="{{old('city')}}">
            </div>
           
            <div class="form-group">
                <label for="num_rooms">Numero Minimo stanze</label>
                <input class="form-control"type="num_rooms" name="num_rooms" id="num_rooms" value="{{old('num_rooms',1)}}">
            </div>

            <div class="form-group">
                <label for="num_beds">Numeri Minimo Posti letto</label>
                <input class="form-control"type="num_beds" name="num_beds" id="num_beds" value="{{old('num_beds',1)}}">
            </div>

            <h4>Seleziona servizi aggiuntivi:</h4>
            <div class="form-group">
                @foreach ($amenities as $amenity)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-{{$loop->iteration}}" value="{{$amenity->id}}">
                    <label class="form-check-label" for="amenity-{{$loop->iteration}}">{{$amenity->name}}</label>
                </div>
                @endforeach
            </div>

            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="long" id="long">
            <input type="hidden" name="algoName" id="algoName" value="{{ $algoName }}">
            <input type="hidden" name="algoKey" id="algoKey" value="{{ $algoKey }}">

            <div class="btn btn-info text-white mb-4" id="ricerca">Ricerca</div>
        </form>
    </div>

    {{-- Places Sponsorizzati --}}
    <div class="cards ">
        <div class="container sponsored">
            <div class="row d-flex flex-wrap justify-content-center mt-4">

                @foreach ($placesSponsored as $placeSponsored)
                    <div class="card text-center col-4 mr-3 bg-primary text-light">
                        @if(!empty($placeSponsored->place_img))
                            <img class="p-2" src="{{asset('storage/' . $placeSponsored->place_img)}}" alt="{{$placeSponsored->title}}" style="height: 20rem">
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
        </div>
        
    {{-- Risultati Ricerca --}}
    <div class="container sponsored">
        <div class="row d-flex flex-wrap justify-content-center mt-4">
            <div id="place-container" class="container mt-3"></div>
        </div>
    </div>    
    


    {{-- Handlebars Template --}}
    <script id="places-tempalte" type="text/x-handlebars-template">
        <div class="card text-center mb-2">

            <img src="http://127.0.0.1:8000/storage/@{{place_img}}" alt="img"" style="height: 20rem">
            <a class="card-title h5 my-3">@{{title}}</a>
            <h5 class="card-subtitle text-primary mb-3">Città: @{{city}}</h5>
            <h5 class="card-subtitle h6 mb-2">Indirizzo: @{{address}}</h5>
            <h5 class="card-subtitle h6 mb-2">Descrizione: @{{description}}</h5>
            <h5 class="card-subtitle h6 mb-2">Prezzo: € @{{price}}</h5>

        </div>  
    </script>

    {{-- Pagination --}}
    {{-- <div class="pagination d-flex justify-content-end mt-5">
        {{ $places->links() }}
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4/dist/algoliasearch.umd.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=Promise%2CObject.entries%2CObject.assign"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.js'></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/searchHome.js') }}"></script>
    <script src="{{ asset('js/filtersearch.js') }}"></script>
@endsection
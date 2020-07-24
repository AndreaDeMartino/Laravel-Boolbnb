@extends('layouts.app')

@section('content')

    {{-- Errori --}}
    @if (session('message'))
        <div class="alert alert-success">
            <p>Messaggio "{{ session('message') }}" Inviato</p>
        </div>
    @endif

    <main class="home">

        <section class="jumbo d-flex flex-wrap justify-content-center align-content-center">
            <div class="jumbo__title col-12 text-center">
                <label class="h1 d-block" for="city">TROVA LA TUA CASA</label>
            </div>
            <div class="jumbo__search col-6 d-flex align-content-center">
                <input class="search__input d-inline" type="text" name="city" id="city" placeholder="Ricerca il tuo appartamento">
                <div class="search__btn btn">CERCA</div>
            </div>

            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="long" id="long">
            <input type="hidden" name="algoName" id="algoName" value="{{ $algoName }}">
            <input type="hidden" name="algoKey" id="algoKey" value="{{ $algoKey }}">
        </section>
    
        <section class="container sponsored">
            <h2 class="sponsored__title">Esclusive</h2>
            <div class="row">
                @foreach ($placesSponsored as $placeSponsored)
                <div class="sponsor-card col-3 mr-4 mb-4">
                    <img class="card__img" src="{{asset('storage/' . $placeSponsored->place_img)}}" alt="{{$placeSponsored->title}}">
                    <div class="img__wrapper"></div>
                    <div class="card__info">
                        <h5 class="card__price">€{{$placeSponsored->price}}</h5>
                        <h5 class="card__address mb-2">{{$placeSponsored->address}}</h5>
                        <div class="info__footer d-flex justify-content-between align-items-top">
                            <h5 class="card__city">{{$placeSponsored->city}}</h5>
                            <div class="card__amenities d-flex">
                                <h5><i class="fas fa-couch"></i>{{$placeSponsored->num_rooms}}</h5>
                                <h5><i class="fas fa-bed"></i>{{$placeSponsored->num_beds}}</h5>
                                <h5 class="mr-1"><i class="fas fa-toilet"></i>{{$placeSponsored->num_baths}}</h5>
                            </div>
                        </div>
                    </div>  
                </div>
                @endforeach
            </div>
        </section>
    </main>


    {{-- Ricerca --}}
    {{-- <div class="search-prov mt-5">
           
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

    </div> --}}
        
    <section class="search d-flex">
        <div class="search__sidebar">
            <h5 class="sidebar__title text-center mt-3">Filtra i tuoi risultati</h5>
            <div class="search__item-box d-flex justify-content-between">
                <div class="sidebar__item d-flex flex-column align-items-center flex-wrap justify-content-center">
                    <label class="d-block" for="num_rooms"><i class="fas fa-couch pr-2"></i>Stanze</label>
                    <input class="text-center" type="number" name="num_rooms" id="num_rooms" value="{{old('num_rooms',1)}}">
                </div>

                <div class="sidebar__item d-flex flex-column align-items-center flex-wrap justify-content-center">
                    <label class="d-block" for="num_beds"><i class="fas fa-bed pr-2"></i>Posti Letto</label>
                    <input class="text-center" type="number" name="num_beds" id="num_beds" value="{{old('num_beds',1)}}">
                </div>
            </div>
           
            <div class="amenities container mt-5 d-flex flex-column align-items-center">
                <h5 class="amenities__title text-center">Seleziona i servizi aggiuntivi</h5>
                <div class="amenties__list">
                    @foreach ($amenities as $amenity)
                    <div class="form-check d-flex">
                        <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-{{$loop->iteration}}" value="{{$amenity->id}}">
                        <label class="form-check-label" for="amenity-{{$loop->iteration}}">{{$amenity->name}}</label>
                    </div>
                @endforeach
                </div>
                
                <div class="search__btn btn mt-3 w-75">CERCA</div>
            </div>
            
        </div>
        <div class="search__content">
            <div class="row d-flex flex-wrap justify-content-center mt-4">
                <div id="place-container" class="container mt-3"></div>
            </div>
        </div>
    </section>






    {{-- Handlebars Template --}}
    <script id="places-template" type="text/x-handlebars-template">
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
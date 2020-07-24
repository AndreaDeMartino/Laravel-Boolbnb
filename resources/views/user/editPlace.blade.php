@extends('layouts.app')

@section('content')
<main class="wall">
    <div class="new_place">
        <h2 class="mt-4">Modifica Annuncio</h2>
    
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="new-place mt-5 col-lg-6 pl-0">
            <form action="{{route('user.place.update', $place->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
    
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input class="form-control border-fix" type="text" name="title" id="title" placeholder="Appartamento / Casa / Intero Immobile*" value="{{old('title', $place->title)}}">
                </div>
    
                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea class="form-control border-fix"type="text" name="description" id="description" placeholder="Descrizione*">{{old('description', $place->description)}}</textarea>
                </div>
    
                <div class="form-group">
                    <label for="form-address">Indirizzo</label>
                    <input class="form-control border-fix"type="text" name="address" id="form-address" placeholder="Indirizzo*" value="{{old('address', $place->address)}}">
                </div>
                <div class="col-lg-12 pl-0 pr-0 ">
                    <label for="city text-lg-center">Città</label>
                    <input class="form-control border-fix"type="text" name="city" id="city" placeholder="Città*" value="{{old('city', $place->city)}}">
                </div>
                <div class="col-lg-12 d-flex mt-20 pl-0 pr-0">
                    <div class="col-lg-5  pl-0 pr-0">
                        <label for="region">Regione</label>
                        <input class="form-control border-fix"type="text" name="region" id="region" placeholder="Regione*" value="{{old('region', $place->region)}}">
                    </div>
                    <div class="col-lg-5 offset-lg-2 pl-0 pr-0">
                        <label for="country">Nazione</label>
                        <input class="form-control border-fix"type="text" name="country" id="country" placeholder="Nazione*" value="{{old('country', $place->country)}}">
                    </div>
                </div>
                
    
    
                <div class="col-lg-12 d-flex pl-0 pr-0">
                    <div class="form-group col-lg-3">
                        <label for="num_rooms">Stanze</label>
                        <input class="form-control border-fix"type="num_rooms" name="num_rooms" id="num_rooms" placeholder="Stanze*"  value="{{old('num_rooms', $place->num_rooms)}}">
                    </div>
        
                    <div class="form-group col-lg-3">
                        <label for="num_beds">Posti letto</label>
                        <input class="form-control border-fix"type="num_beds" name="num_beds" id="num_beds" placeholder="Posti letto*"  value="{{old('num_beds', $place->num_beds)}}">
                    </div>
        
                    <div class="form-group col-lg-3">
                        <label for="num_baths">Bagni</label>
                        <input class="form-control border-fix"type="num_baths" name="num_baths" id="num_baths" placeholder="Bagni*"  value="{{old('num_baths', $place->num_baths)}}">
                    </div>
        
                    <div class="form-group col-lg-3">
                        <label for="square_m">m²</label>
                        <input class="form-control border-fix"type="square_m" name="square_m" id="square_m" placeholder="(m²)*"  value="{{old('square_m', $place->square_m)}}">
                    </div>
                </div>
    
                <div class="second_part">
                    <div class="services col-lg-6 offset-lg-4">
                        <h4>Seleziona servizi:</h4>
                    <div class="form-group col-lg-12">
                        @foreach ($amenities as $amenity)
                        <div class="form-check pr-4">
                            <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity->{{$loop->iteration}}" value="{{$amenity->id}}">
                            <label class="form-check-label" for="amenity-{{$loop->iteration}}">{{$amenity->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="price"></label>
                        <input class="form-control border-fix col-lg-4 offset-lg-4"type="price" name="price" id="price" placeholder="Prezzo*" value="{{old('price', $place->price)}}">
                    </div>
        
                    <div class="form-group my-4 col-lg-6 offset-lg-3">
                        <label for="place_img">Inserisci un'immagine</label>
                        <input class="form-control-file inputfile" type="file" name="place_img" id="place_img" accept="image/*">
                    </div>
        
                    <input type="hidden" name="lat" id="lat" value="{{old('lat', $place->lat)}}">
                    <input type="hidden" name="long" id="long" value="{{old('long', $place->long)}}">
                    <input type="hidden" name="apikey" id="apikey" value="{{ $algoliaPlace[0] }}">
                    <input type="hidden" name="adminid" id="adminid" value="{{ $algoliaPlace[1] }}">
        
                    <button class="btn mt-4 mb-3 col-lg-4 offset-lg-4" type="submit">Conferma Modifiche</button>
                </div>
                
            </form>
        </div>
    </div>
</main>

    
    
    
                        {{-- Autocomplete --}}
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
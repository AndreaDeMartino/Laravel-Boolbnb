@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-4">Modifica inserzione</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="new-place mt-5">
        <form action="{{route('user.place.update', $place->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Dai un titolo alla tua inserzione</label>
                <input class="form-control" type="text" name="title" id="title" value="{{old('title', $place->title)}}">
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" type="text" name="description" id="description" placeholder="Descrizione">{{old('description', $place->description)}}</textarea>
            </div>

            <div class="form-group">
                <label for="country">Nazione</label>
                <input class="form-control" type="text" name="country" id="country" value="{{old('country', $place->country)}}">
            </div>

            <div class="form-group">
                <label for="city">Città</label>
                <input class="form-control" type="text" name="city" id="city" value="{{old('city', $place->city)}}">
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input class="form-control" type="text" name="address" id="address" value="{{old('address', $place->address)}}">
            </div>

            <div class="form-group">
                <label for="num_rooms">Numero stanze</label>
                <input class="form-control" type="num_rooms" name="num_rooms" id="num_rooms" value="{{old('num_rooms', $place->num_rooms)}}">
            </div>

            <div class="form-group">
                <label for="num_beds">Posti letto</label>
                <input class="form-control" type="num_beds" name="num_beds" id="num_beds" value="{{old('num_beds', $place->num_beds)}}">
            </div>

            <div class="form-group">
                <label for="num_baths">Bagni</label>
                <input class="form-control" type="num_baths" name="num_baths" id="num_baths" value="{{old('num_baths', $place->num_baths)}}">
            </div>

            <div class="form-group">
                <label for="square_m">Dimensioni (m²)</label>
                <input class="form-control" type="square_m" name="square_m" id="square_m" value="{{old('square_m', $place->square_m)}}">
            </div>
            
            <h4>Seleziona servizi aggiuntivi:</h4>
            <div class="form-group">
                @foreach ($amenities as $amenity)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="amenities[]" id="amenity-{{$loop->iteration}}"
                    value="{{$amenity->id}}"
                    @if($place->amenities->contains($amenity->id)) checked @endif>
                    <label class="form-check-label" for="amenity-{{$loop->iteration}}">{{$amenity->name}}</label><br>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="price">Prezzo</label>
                <input class="form-control" type="price" name="price" id="price" value="{{old('price', $place->price)}}">
            </div>

            <div class="form-group">
                <label for="place_img">Inserisci un'immagine</label>
                <input class="form-control-file" type="file" name="place_img" id="place_img" accept="image/*">
            </div>

            <button class="btn btn-success mt-4" type="submit">Conferma modifiche</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            <p>Messaggio {{ session('message') }} Inviato</p>
        </div>
    @endif

    <div class="cards d-flex flex-wrap justify-content-center mt-4">
        @foreach ($places as $place)
            <a class="card m-4" href="{{route('place.show', $place->slug)}}" style="width: 18rem;">
                @if(!empty($place->place_img))
                    <img src="{{ asset('storage/' . $place->place_img)}}" class="card-img-top" alt="logo">
                @else
                    <div class="no-image">No image</div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$place->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$place->address}} - {{$place->city}} - {{$place->country}}</h6>
                    <p class="card-text text-sm text-muted">{{$place->description}}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="pagination d-flex justify-content-end mt-5">
        {{ $places->links() }}
    </div>

@endsection
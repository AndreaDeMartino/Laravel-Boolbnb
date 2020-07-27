@extends('layouts.app')

@section('content')
<div class="place-show">
    @if($errors->any())
        <div class="alert u-alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="place-show__top">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="place-show__top__info col-lg-6 order-2 order-lg-1">
                    <h3 class="place-show__top__info__title text-center mt-3">{{$place->title}}</h3>
                    <h5 class="place-show__top__info__position text-center">{{$place->address}} - {{$place->city}}</h5>
                    <p class="place-show__top__info__description">{{$place->description}}</p>
                    <h6>Caratteristiche:</h6>
                    <ul class="place-show__top__info__list">
                        <li class="place-show__top__info__list__item">Numero stanze: {{$place->num_rooms}}</li>
                        <li class="place-show__top__info__list__item">Posti letto: {{$place->num_beds}}</li>
                        <li class="place-show__top__info__list__item">Bagni: {{$place->num_baths}}</li>
                        <li class="place-show__top__info__list__item">Dimensioni: {{$place->square_m}}m²</li>
                    </ul>
                    {{-- Servizi --}}
                    <div class="place-show__top__info__amenities d-flex align-items-center">
                        <span class="d-inline-block mr-2">Servizi inclusi</span>
                        @forelse ( $place->amenities as $amenity )
                            @if ($amenity->name === 'WiFi')
                                <i class="place-show__top__info__amenities__item fas fa-wifi"></i>
                            @elseif ($amenity->name === 'Posto Macchina')
                                <i class="place-show__top__info__amenities__item fas fa-car"></i>
                            @elseif ($amenity->name === 'Piscina')
                                <i class="place-show__top__info__amenities__item fas fa-swimmer"></i>
                            @elseif ($amenity->name === 'Portineria')
                                <i class="place-show__top__info__amenities__item fas fa-user-shield"></i>
                            @elseif ($amenity->name === 'Sauna')
                                <i class="place-show__top__info__amenities__item fas fa-hot-tub"></i>
                            @elseif ($amenity->name === 'Vista Mare')
                                <i class="place-show__top__info__amenities__item fas fa-water"></i>
                            @endif
                            {{-- <span class="badge badge-pill badge-info mr-1">{{ $amenity->name }}</span> --}}
                        @empty
                            <span class="badge badge-pill badge-info">Nessun servizio incluso</span>
                        @endforelse
                    </div>
                    <h5 class="place-show__top__price text-lg-right text-md-right text-center mt-3 h3 font-weight-bold">{{round($place->price)}}€ <small class="text-muted">a notte</small></h5>
                    <input type="hidden" name="lat" id="lat" value="{{ $place->lat }}">
                    <input type="hidden" name="long" id="long" value="{{ $place->long }}">
                </div>
    
                <div class="place-show__top__img col-lg-6 order-1 order-lg-2 text-center">
                    @if(!empty($place->place_img))
                        <img src="{{asset('storage/' . $place->place_img)}}" class="img-fluid rounded" alt="immaginecasa">
                    @else
                        <div class="no-image text-danger">No image</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="place-show__bottom">
        @auth
            @if ($place->user_id === $user->id)
                <div id="mapid" style="height: 350px"></div>
            @else
                <div class="place-show__bottom__infos">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 place-show__bottom__infos__leafmap " style="min-height: 200px">
                                <div id="mapid" style="height: 100%"></div>
                            </div> 
                            <div class="col-lg-6">
                                @include('shared.sendMessageArea')
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth

        @guest
            <div class="place-show__bottom__infos">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 place-show__bottom__infos__leafmap" style="min-height: 200px">
                            <div id="mapid" style="height: 100%"></div>
                        </div> 
                        <div class="col-lg-6">
                            @include('shared.sendMessageArea')
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </div>

    @auth
        @if ($place->user_id === $user->id)
            <div class="place-show__stats">
                <div class="container">
                    <h2 class="place-show__stats__title text-center">Area Statistiche <i class="fas fa-chart-line"></i></h2><hr>
                    <div class="row d-flex align-items-center">
                        <div class="place-show__stats__totals col-lg-3 col-md-3">
                            <h3 class="place-show__stats__totals__msg text-lg-right text-md-right text-sm-center">Totale contatti:<br>
                                <span class="place-show__stats__totals__msg__title d-flex align-items-center justify-content-end">
                                    <i class="far fa-envelope"></i>{{$totMessages}}
                                </span>
                            </h3>
                            <hr>
                            <h3 class="place-show__stats__totals__visits text-lg-right text-md-right text-sm-center">Totale visite:<br>
                                <span class="place-show__stats__totals__visits__title d-flex align-items-center justify-content-end">
                                    <i class="far fa-eye"></i>{{$totVisits}}
                                </span>
                            </h3>
                        </div>
                        <div class="place-show__stats__graph col-lg-9 col-md-9">
                            <canvas id="graph" class=""></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
</div>



<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

{{-- Json Statistiche Messaggi --}}
<script>var messagesGraph = @php echo json_encode($messagesGraph);@endphp</script>
<script>var visitsGraph = @php echo json_encode($visitsGraph);@endphp</script>
{{-- JS --}}
<script src="{{asset('js/graphs.js')}}"></script>
<script src="{{ asset('js/map.js') }}"></script>
@endsection
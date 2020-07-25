@extends('layouts.app')

@section('content')
    

    {{-- Place Cancellato --}}
    @if (session('place-deleted'))
    <div class="alert alert-danger m-0">
        <p>Appartamento {{ session('place-deleted') }} Eliminato</p>
    </div>
    @endif

    {{-- Place Visibility --}}
    @if (session('hide'))
        <div class="alert alert-success m-0">
            <p>L'appartamento <span class="text-primary">{{ session('place') }}</span> è stato reso visibile</p>
        </div>
    @endif

    {{-- Sponosor Pay --}}
    @if(session('transId'))
    <div class="alert alert-warning">
        <p>Per l'appartamento {{ session('placeBuy') }} è stato processato correttamente l'ordine {{ session('transId') }}</p>
    </div>
    @endif

    <main class="my-places">
        <h1 class="my-places__title text-center pt-4">LE MIE INSERZIONI</h1>

        <div class="my-places__cards d-flex flex-wrap align-items-center justify-content-center container">

            <h2 class="sponsored__title">Esclusive</h2>
            <div class="sponsored row d-flex flex-wrap align-items-center justify-content-center container">
                
                @foreach ($placesSponsored as $placeSponsored)
                    @if ($placeSponsored->user_id == $user->id)
                        <div class="card col-lg-3 m-2">
                            <div class="card__logo">
                                @if(!empty($placeSponsored->place_img))
                                    <img class="card__img"src="{{asset('storage/' . $placeSponsored->place_img)}}" alt="{{$placeSponsored->title}}">
                                @else
                                    <div class="no-image">No image</div>
                                @endif
                            </div>
                            
                            <div class="card__info">

                                <div class="card__top d-flex justify-content-between align-items-center">
                                    <a class="card__title white" href="{{ route('place.show', $placeSponsored->slug)}}"><i class="fas fa-bullhorn mr-1"></i>{{$placeSponsored->title}}</a>

                                <h5 class="card__visibility-badge">
                                    @if($placeSponsored->visibility)
                                    <span class="badge badge-success my-2"><i class="far fa-eye"></i></span> 
                                    @else
                                    <span class="badge badge-danger my-2"><i class="far fa-eye-slash"></i></span> 
                                    @endif
                                </h5>
                                </div>
                                

                                <h5 class="card__price">€ {{$placeSponsored->price}}</h5>

                                <div class="card__cta d-flex justify-content-center">
                                    {{-- Modifica --}}
                                    <a class="btn btn-info btn-sm modifica d-flex justify-content-center align-items-center" href="{{route('user.place.edit', $placeSponsored->slug)}}"><i class="fas fa-edit"></i></a>
                                    {{-- Elimina --}}
                                    <form class="ml-2 btn btn-info btn-sm cancella d-flex justify-content-center align-items-center" action="{{ route('user.place.destroy',$placeSponsored->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="in_cancella" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    {{-- Nascondi --}}
                                    <form class="ml-2 btn btn-info btn-sm btn-visibility d-flex justify-content-center align-items-center" action="{{route('user.place.visibility', $placeSponsored->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        @if ($placeSponsored->visibility) 
                                        <button class="in_vis" type="submit"><i class="far fa-eye"></i></button>
                                        @else
                                        <button class="in_vis" type="submit"><i class="far fa-eye-slash"></i></button>
                                        @endif
                                    </form>
                                </div>
                            </div> 
                        </div>
                    @endif
                @endforeach
                

                
            </div> 

            <h2 class="unsponsored__title mt-3">Standard</h2>
            <div class="unsponsored row d-flex flex-wrap align-items-center justify-content-center container">
                @foreach ($placesUnsponsored  as $placeUnsponsored)
                    @if ($placeUnsponsored->user_id == $user->id)
                        <div class="card col-lg-3 m-2">
                            <div class="card__logo">
                                @if(!empty($placeUnsponsored->place_img))
                                    <img class="card__img"src="{{asset('storage/' . $placeUnsponsored->place_img)}}" alt="{{$placeUnsponsored->title}}">
                                @else
                                    <div class="no-image">No image</div>
                                @endif
                            </div>
                            
                            <div class="card__info">

                                <div class="card__top d-flex justify-content-between align-items-center">
                                    <a class="card__title" href="{{ route('place.show', $placeUnsponsored->slug)}}">{{$placeUnsponsored->title}}</a>

                                <h5 class="card__visibility-badge">
                                    @if($placeUnsponsored->visibility)
                                    <span class="badge badge-success my-2"><i class="far fa-eye"></i></span> 
                                    @else
                                    <span class="badge badge-danger my-2"><i class="far fa-eye-slash"></i></span> 
                                    @endif
                                </h5>
                                </div>
                                

                                <h5 class="card__price">€ {{$placeUnsponsored->price}}</h5>

                                <div class="card__cta d-flex justify-content-center">
                                    {{-- Modifica --}}
                                    <a class="btn btn-info btn-sm modifica d-flex justify-content-center align-items-center" href="{{route('user.place.edit', $placeUnsponsored->slug)}}"><i class="fas fa-edit"></i></a>
                                    {{-- Elimina --}}
                                    <form class="ml-2 btn btn-info btn-sm cancella d-flex justify-content-center align-items-center" action="{{ route('user.place.destroy',$placeUnsponsored->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="in_cancella" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    {{-- Nascondi --}}
                                    <form class="ml-2 btn btn-info btn-sm btn-visibility d-flex justify-content-center align-items-center" action="{{route('user.place.visibility', $placeUnsponsored->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        @if ($placeUnsponsored->visibility) 
                                        <button class="in_vis" type="submit"><i class="far fa-eye"></i></button>
                                        @else
                                        <button class="in_vis" type="submit"><i class="far fa-eye-slash"></i></button>
                                        @endif
                                    </form>
                                    <a class="ml-2 btn btn-info btn-sm sponsorizza d-flex justify-content-center align-items-center" href="{{ route('user.payment',$placeUnsponsored->id) }}"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div> 
                        </div>
                    @endif
                @endforeach
                

                
            </div> 
        </div>

        <section class="banner">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center p-5">

                    <div class="bannner-search col-lg-3 text-center">
                        <div class="bannner-search__img">
                            <img class="wall" src="{{ asset('images/pay1.svg') }}" alt="search">
                        </div>
                        <div class="banner-search__text">
                            <h4>Crea un annuncio</h4>
                            <p>Pubblicizza i tuoi alloggi con il minimo sforzo: puoi creare annunci manualmente in pochi minuti o importandoli con un'integrazione.</p>
                        </div>
                    </div>

                    <div class="bannner-chat col-lg-3 text-center">
                        <div class="bannner-chat__img">
                            <img class="wall" src="{{ asset('images/pay2.svg') }}" alt="chat">
                        </div>
                        <div class="banner-chat__text">
                            <h4>Trova e seleziona inquilini di qualità</h4>
                            <p>Offri le tue proprietà a migliaia di utenti verificati da tutto il mondo.</p>
                        </div>
                    </div>

                    <div class="bannner-buy col-lg-3 text-center">
                        <div class="bannner-buy__img">
                            <img class="wall" src="{{ asset('images/pay3.svg') }}" alt="buy">
                        </div>
                        <div class="banner-buy__text">
                            <h4>Ricevi l'affitto</h4>
                            <p>Assicurati un reddito costante per tutto l'anno grazie al sistema di pagamento sicuro e alle richieste di pagamento.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </main>
@endsection
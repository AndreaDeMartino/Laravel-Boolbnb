@extends('layouts.app')

@section('content')
    <div class="inbox container-fluid py-3 flex-grow-1">
        <div class="inbox__sidebar d-md-flex">
            <ul class="inbox__navbar list-group col-md-4 col-lg-2">
                <li class="incoming list-group-item list-group-item-action">
                    <i class="fas fa-inbox mr-3"></i>
                    In arrivo
                </li>
                <li class="list-group-item list-group-item-action">
                    <i class="fas fa-star mr-3"></i>
                    Speciali
                </li>
                <li class="list-group-item list-group-item-action">
                    <i class="fab fa-telegram-plane mr-3"></i>
                    Inviati
                </li>
                <li class="list-group-item list-group-item-action">
                    <i class="fas fa-trash mr-3"></i>
                    Eliminati
                </li>
            </ul>

            <ul class="inbox__btns list-group mt-4 col-md-7 col-lg-9 mt-md-0">
                @foreach ($messages as $message)
                <li class="message-btn list-group-item list-group-item-action {{ !$loop->last ? 'mb-1' : '' }} " data-message="{{ $loop->iteration }}">
                    {{ $message->guest_name }}
                    <br>
                    {{ strlen($message->subject) > 50 ? substr($message->subject, 0, 50) . '...' : $message->subject }}
                </li>
                @endforeach
            </ul>
        </div>

        <div class="inbox__messages col-md-7 col-lg-9 mt-4 mt-md-0">
        @foreach ($messages as $message)
            <div class="message-card border p-2 rounded-lg bg-white" data-message="{{ $loop->iteration  }}">
                <p class="close-message text-right"><a class="btn m-0 p-0"><i class="fas fa-times"></i></a></p>
                <p class="text-right text-info"><small>{{ $message->created_at }}</small></p>
                <h3 class="card-title text-right text-primary mb-3">
                    Messaggio da: {{ $message->guest_name }}
                    per {{ $message->title }}
                </h3>
                <h4 class="card-subtitle text-right mb-3 text-secondary">{{ $message->mail_address }}</h4>
                <h2 class="card-subtitle mb-2 text-muted">{{ $message->subject }}</h2>
                <p class="card-subtitle mb-2 text-muted">{{ $message->message }}</p>
            </div>
        @endforeach
        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/messageFilter.js') }}"></script>
@endsection
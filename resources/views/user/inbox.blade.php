@extends('layouts.app')

@section('content')
    <div class="inbox-wall flex-grow-1">
        <div class="inbox container-fluid py-3 d-md-flex">
            <div class="inbox__sidebar col-md-4 col-lg-2">
                <ul class="inbox__navbar list-group">
                    <li class="incoming list-group-item pointer">
                        <i class="fas fa-inbox mr-3"></i>
                        In arrivo
                    </li>
                    <li class="list-group-item pointer">
                        <i class="fas fa-star mr-3"></i>
                        Speciali
                    </li>
                    <li class="list-group-item pointer">
                        <i class="fab fa-telegram-plane mr-3"></i>
                        Inviati
                    </li>
                    <li class="list-group-item pointer">
                        <i class="fas fa-trash mr-3"></i>
                        Eliminati
                    </li>
                </ul>
            </div>
    
            <div class="inbox__messages mt-4 mt-md-0 col-md-8 col-lg-10">
                <ul class="inbox__btns list-group">
                    @foreach ($messages as $message)
                    <li class="message-btn list-group-item pointer d-flex justify-content-between" data-message="{{ $loop->iteration }}">
                        <div class="py-1">
                            <h5 class="my-0">
                                <i class="fas fa-user mr-2"></i>
                                {{ $message->guest_name }}
                            </h5>
                            <p class="my-0">
                                {{ strlen($message->subject) > 50 ? substr($message->subject, 0, 50) . '...' : $message->subject }}
                            </p>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-between">
                            <i class="message-btn__opt fas fa-star pointer"></i>
                            <i class="message-btn__opt fas fa-trash pointer"></i>
                        </div>
                    </li>
                    @endforeach

                    <div class="paginate d-flex justify-content-center mt-3">
                        {{ $messages->links() }}
                    </div>
                </ul>
    
                @foreach ($messages as $message)
                <div class="message-card p-2 rounded-lg shadow-sm" data-message="{{ $loop->iteration  }}">
                    <div class="left-icons">
                        <i class="message-card__opt mr-2 fas fa-trash pointer"></i>
                        <i class="message-card__opt fas fa-star pointer"></i>
                    </div>
                    <p class="close-message message-card__opt text-right my-0"><a class="btn m-0 p-0"><i class="fas fa-times"></i></a></p>
                    <p class="text-right my-0"><small>{{ $message->created_at }}</small></p>
                    <p class="text-right my-0">
                        <small>
                            Messaggio da: {{ $message->guest_name }}
                            per {{ $message->title }}
                        </small>
                    </p>
                    <p class="text-right mt-0 mb-2">
                        <small>
                            {{ $message->mail_address }}
                        </small>
                    </p>
                    <h5 class="card-subtitle mt-0 mb-2">
                        <small>Oggetto: {{ $message->subject }}</small>
                    </h5>
                    <p class="mb-0">{{ $message->message }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('js/messageFilter.js') }}"></script>
@endsection
@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="message-cards pt-5">
        @foreach ($messages as $message)
            <div class="message-card border p-2 mb-4 border-info rounded bg-white">
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
@endsection
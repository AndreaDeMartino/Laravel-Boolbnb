@extends('layouts.app')

@section('content')
<div class="log-reg container flex-grow-1 d-flex justify-content-center align-items-center py-3">
    <div class="row flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="log-reg__card card pt-3 px-3 rounded-lg shadow-lg">
                <h4 class="log-reg__title text-left mb-3">
                    {{ __('Reset Password') }}
                </h4>

                <p class="log-reg__description text-center mb-4">
                    Inserisci il tuo indirizzo email per modificare la tua password.
                </p>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-right">{{ __('Indirizzo email *') }}</label>
                                <input id="email" type="email" class="form-control log-reg__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex flex-column">
                                <button type="submit" class="log-reg__btn btn">
                                    {{ __('Invia il link per il reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

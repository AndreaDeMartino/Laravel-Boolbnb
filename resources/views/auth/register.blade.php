@extends('layouts.app')

@section('content')
<div class="login container flex-grow-1 d-flex justify-content-center align-items-center py-3">
    <div class="row flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="login__card card pt-3 px-3 rounded-lg shadow-lg">
                <h4 class="text-left mb-3">
                    {{ __('Crea il tuo account') }}
                </h4>

                <p class="login__description text-center mb-4">
                    Trova la tua nuova casa o i tuoi futuri inquilini e beneficia della sicurezza della nostra piattaforma di affitti immobiliari.
                </p>

                <a class="social-login btn col-md-4 offset-md-4 d-flex justify-content-center align-items-center mb-2" href="#">
                    <div class="social-login__img mr-2">
                        <img class="mw-100" src="{{ url('images/facebook.png') }}" alt="facebook">
                    </div>
                    Accedi con Facebook
                </a>
                <a class="social-login btn col-md-4 offset-md-4 d-flex justify-content-center align-items-center" href="#">
                    <div class="social-login__img mr-2">
                        <img class="mw-100" src="{{ url('images/google.png') }}" alt="google">
                    </div>
                    Accedi con Google
                </a>

                <span class="or text-center mt-5 mb-1">
                    <small>oppure</small>
                </span>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="col-form-label text-md-right">{{ __('Nome *') }}</label>
                                <input id="name" type="text" class="form-control login__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="last_name" class="col-form-label text-md-right">{{ __('Cognome *') }}</label>
                                <input id="last_name" type="text" class="form-control login__input @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="birth_date" class="col-form-label text-md-right">{{ __('Data di nascita *') }}</label>
                                <input id="birth_date" type="date" class="form-control login__input @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-right">{{ __('Indirizzo email *') }}</label>
                                <input id="email" type="email" class="form-control login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password *') }}</label>
                                <input id="password" type="password" class="form-control login__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Conferma password *') }}</label>
                                <input id="password-confirm" type="password" class="form-control login__input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex flex-column">
                                <button type="submit" class="login__btn btn">
                                    {{ __('Iscriviti') }}
                                </button>

                                <span class="mt-3">
                                    Hai già un account? 
                                    <a class="btn login__link" href="{{ route('login') }}">Accedi</a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

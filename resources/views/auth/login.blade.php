@extends('layouts.app')

@section('content')
<div class="log-reg__wall flex-grow-1">
    <div class="log-reg container d-flex justify-content-center align-items-center py-3">
        <div class="row flex-grow-1 d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="log-reg__card card pt-3 px-3 rounded-lg shadow-lg">
                    <h4 class="log-reg__title text-left mb-3">
                        {{ __('Accedi al tuo account') }}
                    </h4>
    
                    <p class="log-reg__description text-center mb-4">
                        Trova la tua nuova casa o i tuoi futuri inquilini e beneficia della sicurezza della nostra piattaforma di affitti immobiliari.
                    </p>
    
                    <a class="social-log-reg btn col-md-4 offset-md-4 d-flex justify-content-center align-items-center mb-2" href="#">
                        <div class="social-log-reg__img mr-2">
                            <img class="mw-100" src="{{ url('images/facebook.png') }}" alt="facebook">
                        </div>
                        Accedi con Facebook
                    </a>
                    <a class="social-log-reg btn col-md-4 offset-md-4 d-flex justify-content-center align-items-center" href="#">
                        <div class="social-log-reg__img mr-2">
                            <img class="mw-100" src="{{ url('images/google.png') }}" alt="google">
                        </div>
                        Accedi con Google
                    </a>
    
                    <span class="or text-center mt-5 mb-1">
                        <small>oppure</small>
                    </span>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
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
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password *') }}</label>
                                    <input id="password" type="password" class="form-control log-reg__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-4">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Ricordami') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex flex-column">
                                    <button type="submit" class="log-reg__btn btn">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn log-reg__link col-md-4 offset-md-4" href="{{ route('password.request') }}">
                                            {{ __('Hai dimenticato la password?') }}
                                        </a>
                                    @endif
    
                                    <span class="mt-3 d-flex align-items-center">
                                        Non sei ancora registrato? 
                                        <a class="btn log-reg__link" href="{{ route('register') }}">Iscriviti gratuitamente</a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

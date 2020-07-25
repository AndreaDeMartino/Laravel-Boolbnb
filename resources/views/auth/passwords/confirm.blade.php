@extends('layouts.app')

@section('content')
<div class="log-reg container flex-grow-1 d-flex justify-content-center align-items-center py-3">
    <div class="row flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="log-reg__card card pt-3 px-3 rounded-lg shadow-lg">
                <h4 class="log-reg__title text-left mb-3">
                    {{ __('Conferma Password') }}
                </h4>

                <p class="log-reg__description text-center mb-4">
                    Conferma la tua password per continuare.
                </p>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex flex-column">
                                <button type="submit" class="log-reg__btn btn">
                                    {{ __('Conferma Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn log-reg__link col-md-4 offset-md-4" href="{{ route('password.request') }}">
                                        {{ __('Hai dimenticato la password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

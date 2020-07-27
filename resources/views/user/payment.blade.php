@extends('layouts.app')

@section('content')
<div class="payment">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 payment-title">
        <h2 class="payment__title text-center">Scegli la sponsorship per la tua inserzione</h2>
      </div>
      <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 payment__form-wrapper">
        <form id="payment-form" action="{{ route('user.store',$id) }}" method="post">
          @csrf
          @method("POST")
          
          {{-- Error message for empty sponsorship field --}}
          @if (session('sponsorshipError'))
          <div class="alert alert-danger">
              <p>{{ session('sponsorshipError') }}</p>
          </div>
          @endif
  
          <!-- IMPORTO INPUT -->
          <label for="amount">
            <div class="input-wrapper amount-wrapper">
              <select id="amount" name="amount">
                <option selected disabled style="display: none">Seleziona una sponsorship</option>
                @foreach($sponsors as $sponsor)
                  <option value="{{ $sponsor->id }}"> 
                    {{ $sponsor->name }} - {{ $sponsor->price }}€ / {{ $sponsor->duration }} h
                  </option>
                @endforeach
              </select>
            </div>
          </label>
  
          <!-- PAGAMENTI LISTA -->
          <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
          </div>
  
          {{-- ClientToken for js --}}
          <input id="clientToken" type="hidden" value="{{ $clientToken }}"/>
  
          <!-- SUBMIT -->
          <input id="nonce" name="payment_method_nonce" type="hidden" />
          <button class="btn button-payment" type="submit">Acquista</button>
        </form>
      </div>
    </div>

  </div>
</div>


  {{-- JS --}}
  <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
  <script src="{{ asset('js/pay.js') }}"></script>
  @endsection
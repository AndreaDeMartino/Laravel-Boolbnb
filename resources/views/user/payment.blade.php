@extends('layouts.app')

@section('content')

    <form id="payment-form" action="{{ route('user.store',$id) }}" method="post">
      @csrf
      @method("POST")

      <h2 class="text-center mt-4">Scegli la sponsorship per la tua inserzione</h2>
      
      {{-- Error message for empty sponsorship field --}}
      @if (session('sponsorshipError'))
      <div class="alert alert-danger">
          <p>{{ session('sponsorshipError') }}</p>
      </div>
      @endif

      <!-- IMPORTO INPUT -->
      <label for="amount">
        <span class="input-label">Sponsor</span>
        <div class="input-wrapper amount-wrapper">

          
          <select id="amount" name="amount" size="3">
            @foreach($sponsors as $sponsor)
            
              <option value="{{ $sponsor->id }}"> 
                {{ $sponsor->name }} {{ $sponsor->price }}€ ({{ $sponsor->duration }} h)
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
      <button class="btn btn-success" type="submit">Compra</button>
    </form>


  {{-- JS --}}
  <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
  <script src="{{ asset('js/pay.js') }}"></script>
  @endsection
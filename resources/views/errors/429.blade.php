@extends('errors::errorsLayout')

@section('title')
Access denied
@endsection

@section('code')
429
@endsection

@section('subtitle')
Accesso negato
@endsection

@section('description')
<p>La cause possono essere principalmente le seguenti:</p>
<ul>
   <li>troppe richieste di accesso;</li>
   <li>problemi con i cookies.</li>
</ul>
@endsection

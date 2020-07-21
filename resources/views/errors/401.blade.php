@extends('errors::errorsLayout')

@section('title')
Authorization required
@endsection

@section('code')
401
@endsection

@section('subtitle')
Accesso negato
@endsection

@section('description')
<p>La cause possono essere principalmente le seguenti:</p>
<ul>
   <li>un URL digitato male;</li>
   <li>credenziali di accesso non valide;</li>
   <li>requisiti di accesso falsi;</li>
   <li>errori DNS;</li>
   <li>problemi di sicurezza/firewall;</li>
   <li>problemi con i plugin.</li>
</ul>
@endsection

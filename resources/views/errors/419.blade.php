@extends('errors::errorsLayout')

@section('title')
Authorization required
@endsection

@section('code')
419
@endsection

@section('subtitle')
Accesso negato
@endsection

@section('description')
<p>La cause possono essere principalmente le seguenti:</p>
<ul>
   <li>mancanza del permesso per accedere alla pagina;</li>
   <li>problemi di sicurezza/firewall.</li>
</ul>
@endsection

@extends('errors::errorsLayout')

@section('title')
Forbidden
@endsection

@section('code')
403
@endsection

@section('subtitle')
Accesso negato
@endsection

@section('description')
<p>La cause possono essere principalmente le seguenti:</p>
<ul>
   <li>mancanza del permesso per accedere alla pagina;</li>
   <li>problemi di sicurezza/firewall;</li>
   <li>problemi con i plugin;</li>
   <li>problemi con la cache del browser.</li>
</ul>
@endsection

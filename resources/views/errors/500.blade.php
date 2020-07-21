@extends('errors::errorsLayout')

@section('title')
Authorization required
@endsection

@section('code')
500
@endsection

@section('subtitle')
Errore interno al server
@endsection

@section('description')
<p>La causa è interna al server.</p>
@endsection

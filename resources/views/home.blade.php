@extends('layouts.app')

@section('content')
    <h1>Bienvenue, {{ Auth::user()->name }}</h1>
    <p>Vous êtes connecté en tant qu'utilisateur normal.</p>
@endsection

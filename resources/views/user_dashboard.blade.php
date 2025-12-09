@extends('layouts.dashboard', ['pageTitle' => 'Home']) 
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @auth <!-- Verifica se l'utente è autenticato -->
        
    @else
        <p>Devi effettuare il login per vedere questo contenuto.</p>
        <a href="{{ route('showLoginForm') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('showRegistrationForm') }}" class="btn btn-primary">Sign in</a>
    @endauth
@endsection
@extends('layouts.app', ['pageTitle' => 'Home', 'metaTitle' => 'Welcome to FitProgress Home Page']) 
@section('content')
    <H1>WELCOME TO THE HOME PAGE</H1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @auth <!-- Verifica se l'utente è autenticato -->
        <form method="POST" action="{{ route('logoutUser') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @else
        <a href="{{ route('showLoginForm') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('showRegistrationForm') }}" class="btn btn-primary">Sign in</a>
    @endauth
@endsection
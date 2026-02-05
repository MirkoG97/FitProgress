@extends('layouts.dashboard', ['pageTitle' => 'Users'])

@section('content')
<div class="container">
    <h2>Lista Clienti</h2>

    @if(count($users) > 0)
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }} {{ $user->surname }}</h5>
                            <a href="{{ route('programsByUser', ['user_id' => $user->id]) }}" class="btn btn-primary">
                                Visualizza programmi utente
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
    <p>Non vi sono clienti</p>
    @endif
</div>
@endsection
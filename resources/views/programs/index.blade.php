@extends('layouts.dashboard', ['pageTitle' => 'programmi'])

@section('content')
<div class="container">
    <h2>I miei programmi</h2>

    @if(count($programs) > 0)
        <ul class="list-group">
            @foreach($programs as $program)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$program->name}}</h5>
                            <p class="card-text">{{ $program->description }}</p>
                            <a href="{{ route('workoutsByProgram', $program->id) }}" class="btn btn-primary">Apri programma</a>
                        </div>
                    </div>
                    
                </li>
            @endforeach
        </ul>
    
    @else
        <p>Non hai ancora programmi. Creane uno!</p>
    @endif
</div>
@endsection
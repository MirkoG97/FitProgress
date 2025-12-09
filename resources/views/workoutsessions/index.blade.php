@extends('layouts.dashboard', ['pageTitle' => 'programmi'])

@section('content')
<div class="container">
    <h2>Sessioni</h2>

    @if(!empty($sessions))
        <ul class="list-group">
            @foreach($sessions as $session)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $session->created_at}}</h5>
                            <h6>SET: {{ $session->sets}} REP: {{ $session->reps}} PESO: {{ $session->weight}} Kg</h6>
                            <p class="card-text">{{ $session->notes}}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Non hai ancora un workout associato a questo programma. Creane uno!</p>
    @endif
    <a href="{{ route('exercisesByWorkout', ['workout_id' => $workout_id]) }}" class="btn btn-primary mt-3">Torna agli esercizi</a>
</div>
@endsection
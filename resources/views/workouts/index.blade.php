@extends('layouts.dashboard', ['pageTitle' => 'programmi'])

@section('content')
<div class="container">
    <h2>Schede di allenamento per il programma</h2>

    @if(!empty($workouts))
        <ul class="list-group">
            @foreach($workouts as $workout)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $workout->name}}</h5>
                            <p class="card-text">{{ $workout->description}}</p>
                            <a href="{{ route('exercisesByWorkout', $workout->workout_id, $program_id) }}" class="btn btn-primary">Apri il workout</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Non hai ancora un workout associato a questo programma. Creane uno!</p>
    @endif
    <a href="{{ route('programsByUser') }}" class="btn btn-primary mt-3">Torna ai programmi</a>
</div>
@endsection
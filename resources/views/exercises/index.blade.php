@extends('layouts.dashboard', ['pageTitle' => 'programmi'])

@section('content')
<div class="container">
    <h2>Esercizi</h2>

    @if(count($exercises) > 0)
        <ul class="list-group">
            @foreach($exercises as $exercise)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $exercise->name}}</h5>
                            <h6>SET: {{ $exercise->sets}} REP: {{ $exercise->reps}} REST: {{ $exercise->rest}}</h6>
                            <p class="card-text">MUSCOLO PRINCIPALE:{{ $exercise->target_muscle }}</p>
                            <p class="card-text">MUSCOLO SECONDARIO:{{ $exercise->secondary_target_muscle }}</p>
                            <p class="card-text">NOTE: {{ $exercise->notes }}</p>
                            <p class="card-text">DESCRIZIONE: {{ $exercise->description }}</p>
                            <a href="{{ route('sessionsByExerciseAndWorkout', ['workout_id' => request()->route('workout_id'),'exercise_id' => $exercise->id]) }}" class="btn btn-primary">
                                Visualizza sessioni precedenti
                            </a>
                            <a href=" " class="btn btn-primary">tasto </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Non hai ancora un workout associato a questo programma. Creane uno!</p>
    @endif
    <a href="{{ route('workoutsByProgram', ['program_id' => $program_id]) }}" class="btn btn-primary mt-3">Torna ai Workout</a>
</div>
@endsection
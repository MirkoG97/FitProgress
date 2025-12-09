<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workout_exercise', function (Blueprint $table) {
            $table->id();

            $table->integer('reps')->nullable();
            $table->integer('sets')->nullable();
            $table->float('rest')->nullable();
            $table->string('notes')->nullable();
            $table->float('weight')->nullable();

            $table->unsignedBigInteger('workout_id');
            $table->foreign('workout_id')->references('id')->on('workout_plans');
            $table->unsignedBigInteger('exercise_id');
            $table->foreign('exercise_id')->references('id')->on('exercises');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_exercise');
    }
};

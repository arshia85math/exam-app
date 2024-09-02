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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('all');
            $table->integer('correctAnswers');
            $table->integer('incorrectAnswers');
            $table->json('a')->nullable();
            $table->json('b')->nullable();
            $table->json('unansweredQuestions')->nullable();
            $table->float('uns')->nullable();
            $table->float('percentage');
            $table->float('score');
            $table->string('exam_name')->nullable();
            $table->json('data')->nullable();
            $table->json('answersKey')->nullable();
            $table->text('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_models');
    }
};

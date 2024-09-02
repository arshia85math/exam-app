<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultModel extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = [
        'all',
        'correctAnswers',
        'incorrectAnswers',
        'a',
        'b',
        'unansweredQuestions',
        'uns',
        'percentage',
        'score',
        'exam_name',
        'data',
        'answersKey',
        'date'
    ];

}

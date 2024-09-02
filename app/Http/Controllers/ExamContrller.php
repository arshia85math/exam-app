<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamContrller extends Controller
{
    public function index()
    {
        if (request()->get('type') === 'single') {
            $numberOfQuestions = request()->get('numberOfQuestions');
            session(['numberOfQuestions' => $numberOfQuestions, 'studyTime' => request()->get('studyTime'), 'bookName' => request()->get('bookName')]);
            return view('exam.single');
        } 
    }
}

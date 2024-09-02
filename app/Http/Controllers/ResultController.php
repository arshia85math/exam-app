<?php

namespace App\Http\Controllers;

use App\Models\AnswersKey;
use App\Models\ResultModel;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        if (request()->get('type') === 'key') {
            $data = request()->input('result');
            AnswersKey::create(
                [
                    'exam_name' => request()->get('exam_name'),
                    'key' => $data
                ]
            );
            return redirect()->back();
        } else {
            $data = json_decode(request()->input('result'), true);
            $answerKey = json_decode(AnswersKey::find(request()->get('selected_answer_key'))->key, true);
            $correctAnswers = 0;
            $incorrectAnswers = [];
            $unansweredQuestions = explode(", ", $data['unanswered']);
            $questionsCorrect = [];
            $questionsIncorrect = [];

            // بررسی پاسخ‌های داده‌شده
            // بررسی پاسخ‌های داده‌شده
            foreach ($answerKey['answers'] as $question => $correctAnswer) {
                // چک کردن اگر سوال زده شده باشد
                if (isset($data['answers'][$question])) {
                    // چک کردن اگر پاسخ درست باشد
                    if ($data['answers'][$question] == $correctAnswer) {
                        $correctAnswers++;
                        $questionsCorrect[] = $question;
                    } else {
                        $incorrectAnswers[] = $question;
                        $questionsIncorrect[] = $question;
                    }
                } else {
                    $unansweredQuestions[] = $question; // سوالات نزده
                }
            }


            $numberOfIncorrectQuestions = count($incorrectAnswers);
            $allQuestions = count($answerKey['answers']) + count(explode(',', $answerKey['unanswered'])); // تعداد کل سوالات
            $percentage = 100 * ($correctAnswers - $numberOfIncorrectQuestions) / $allQuestions;
            $score = $percentage * 38 + 4200;
            $uns = count($unansweredQuestions) / 2;
            session([
                'result' => [
                    'all' => $allQuestions,
                    'correctAnswers' => $correctAnswers,
                    'incorrectAnswers' => $numberOfIncorrectQuestions,
                    'a' => $incorrectAnswers,
                    'b' => $questionsCorrect,
                    'unansweredQuestions' => $unansweredQuestions,
                    'uns' => $uns,
                    'percentage' => $percentage,
                    'score' => $score,
                    'exam_name' =>  session('bookName'),
                    'data' => $data,
                    'answersKey' => $answerKey,
                    'date' => Verta::formatJalaliDatetime()
                ]
            ]);
            return view(
                'workbook',
                [
                    'all' => $allQuestions,
                    'correctAnswers' => $correctAnswers,
                    'incorrectAnswers' => $numberOfIncorrectQuestions,
                    'a' => $incorrectAnswers,
                    'b' => $questionsCorrect,
                    'unansweredQuestions' => $unansweredQuestions,
                    'uns' => $uns,
                    'percentage' => $percentage,
                    'score' => $score,
                    'exam_name' => request()->get('exam_name'),
                    'data' => $data,
                    'answersKey' => $answerKey
                ]
            );
        }
    }
    public function saveResult()
    {
        $resultData = session()->get('result');
        // بررسی وجود رکورد مشابه
        $existingResult = ResultModel::where('exam_name', $resultData['exam_name'])
            ->where('all', $resultData['all'])
            ->first();

        if ($existingResult) {
            // رکورد مشابه وجود دارد، به کاربر پیغام دهید
            return back()->with('swal', [
                'title' => 'خطا!',
                'text' => 'این رکورد قبلاً ثبت شده است.',
                'icon' => 'error',
            ]);
        } else {
            // ثبت رکورد جدید
            ResultModel::create([
                'all' => $resultData['all'],
                'correctAnswers' => $resultData['correctAnswers'],
                'incorrectAnswers' => $resultData['incorrectAnswers'],
                'a' => json_encode($resultData['a']),
                'b' => json_encode($resultData['b']),
                'unansweredQuestions' => json_encode($resultData['unansweredQuestions']),
                'uns' => $resultData['uns'],
                'percentage' => $resultData['percentage'],
                'score' => $resultData['score'],
                'exam_name' => $resultData['exam_name'],
                'data' => json_encode($resultData['data']),
                'answersKey' => json_encode($resultData['answersKey']),
                'date' => $resultData['date'],
            ]);

            // ثبت موفقیت‌آمیز
            return back()->with('swal', [
                'title' => 'موفق!',
                'text' => 'رکورد با موفقیت ثبت شد.',
                'icon' => 'success',
            ]);
        }
    }
    public function createKey()
    {
        return view('exam.key');
    }
    public function delete_key()
    {
        $id = request()->get('id');
        AnswersKey::find($id)->delete();
        return redirect()->back();
    }
    public function delete_result()
    {
        $id = request()->get('id');
        ResultModel::find($id)->delete();
        return redirect()->back();
    }
    public function workbook_all()
    {
        $find = ResultModel::find(request()->get('id'));

        return view('karname', ['data' => $find]);
    }
    public function workbook_now(Request $request)
    {
        if ($request->get('date') === 'now') {
            $record = ResultModel::whereDate('created_at', Carbon::today())->get();
        } else {
            $record = ResultModel::whereDate('created_at', $request->get('date'))->get();
        }
        return view('workbook_now', ['record' => $record]);
    }
}

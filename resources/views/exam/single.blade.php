@extends('layouts.main')

@section('style')
<style>
    body {
        overflow-x: hidden;
    }

    .questions {
        display: grid;
        /* تنظیم نمایش به صورت افقی */
    }

    .question {
        text-align: center;
        margin: 20px;
        width: 250px;
    }

    .option {
        cursor: pointer;
        margin: 10px;
        padding: 3px 8px;
        background-color: aliceblue;
        border: 0.5px solid black;
        border-radius: 5px;
    }

    .selected {
        background: gray;
    }
</style>
@endsection

@section('main')
<div class="container text-center">
    <div class="row justify-content-evenly black">
        <div class="col-4" style="border: 0.7px solid black; border-radius: 8px;">
            <form id="quiz-form" method="get" action="{{ route('result') }}">
                <div id="questions" class="questions"></div>
                <input type="hidden" id="answers" name="result" value="">
                <br>
                <input type="hidden" name="selected_answer_key" id="selected_answer_key">

                <button type="submit" class="btn btn-outline-primary">ارسال پاسخ</button>
            </form>
        </div>
        <div class="col-4">
            <div class="container col-xxl-8 px-4 py-5">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">تست های {{request()->get('bookName')}}</h1>
                <p class="lead">تایم مطالعاتی : {{request()->get('studyTime') }} ساعت</p>

                <div class="col">
                    <p class="black">پاسخنامه این آزمون:</p>
                    <select class="exam-select" id="exam-select">
                        <option>پاسخنامه آزمون را انتخاب کنید</option>
                        @foreach (\App\Models\AnswersKey::all() as $data)
                        <option value="{{ $data->id }}">پاسخنامه آزمون {{ $data->exam_name }} تعداد سوالات ({{ count(json_decode($data->key, true)['answers']) }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div><br>
    <br>
    <br>
    <br>
    <br>
</div>

@endsection

@section('scripts')
<script>
    const numQuestions = "{{ request()->get('numberOfQuestions') }}";
    let answers = {};

    // ایجاد سوالات
    for (let i = 1; i <= numQuestions; i++) {
        const questionDiv = document.createElement('div');
        questionDiv.classList.add('question');
        questionDiv.innerHTML = `<strong>${i}:</strong> 
        <span class="option" data-question="${i}" data-option="1">1</span>  
        <span class="option" data-question="${i}" data-option="2">2</span> 
        <span class="option" data-question="${i}" data-option="3">3</span> 
        <span class="option" data-question="${i}" data-option="4">4</span>`;
        document.getElementById('questions').appendChild(questionDiv);
    }

    // ثبت پاسخ‌ها
    document.getElementById('questions').addEventListener('click', function(e) {
        if (e.target.classList.contains('option')) {
            const question = e.target.getAttribute('data-question');
            const option = e.target.getAttribute('data-option');

            if (answers[question] === option) {
                delete answers[question];
                e.target.classList.remove('selected');
            } else {
                const previousAnswer = answers[question];
                if (previousAnswer) {
                    const previousOption = document.querySelector(`span[data-question='${question}'][data-option='${previousAnswer}']`);
                    if (previousOption) {
                        previousOption.classList.remove('selected');
                    }
                }
                answers[question] = option;
                e.target.classList.add('selected');
            }
        }
    });

    // ارسال فرم
    document.getElementById('quiz-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // بررسی سوالات بدون پاسخ
        let unansweredQuestions = [];
        for (let i = 1; i <= numQuestions; i++) {
            if (!answers[i]) {
                unansweredQuestions.push(`${i}`);
            }
        }

        const dataToSend = {
            answers: answers,
            unanswered: unansweredQuestions.join(', ')
        };
        document.getElementById('answers').value = JSON.stringify(dataToSend);

        // ذخیره گزینه انتخابی از dropdown
        const selectedExam = document.getElementById('exam-select').value;
        document.getElementById('selected_answer_key').value = selectedExam;

        this.submit();
    });
</script>
@endsection
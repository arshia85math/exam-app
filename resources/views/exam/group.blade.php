@extends('layouts.main')

@section('style')
<style>
    body {
        overflow-x: hidden;
    }

    .subjects {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .subject {
        border: 0.7px solid black;
        border-radius: 8px;
        padding: 10px;
        width: 48%; /* دو کادر در هر ردیف */
        text-align: center;
    }

    .questions {
        display: grid;
    }

    .question {
        text-align: center;
        margin: 10px 0;
    }

    .option {
        cursor: pointer;
        margin: 5px;
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
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">تست های مختلف</h1>

    <div class="subjects">
        @foreach($subjects as $subject)
            <div class="subject" id="subject-{{ $loop->index }}">
                <h3>{{ $subject['name'] }}</h3>
                <div class="questions" data-questions="{{ $subject['questions'] }}">
                    @for($i = 1; $i <= $subject['questions']; $i++)
                        <div class="question">
                            <strong>{{ $i }}:</strong> 
                            <span class="option" data-subject="{{ $loop->index }}" data-question="{{ $i }}" data-option="1">1</span>
                            <span class="option" data-subject="{{ $loop->index }}" data-question="{{ $i }}" data-option="2">2</span>
                            <span class="option" data-subject="{{ $loop->index }}" data-question="{{ $i }}" data-option="3">3</span>
                            <span class="option" data-subject="{{ $loop->index }}" data-question="{{ $i }}" data-option="4">4</span>
                        </div>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>

    <form id="quiz-form" method="get" action="{{ route('result_group') }}">
        <input type="hidden" id="answers" name="result" value="">
        <input type="hidden" name="selected_answer_key" id="selected_answer_key">
        <button type="submit" class="btn btn-outline-primary">ارسال پاسخ</button>
    </form>

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
@endsection

@section('scripts')
<script>
    let answers = {};

    document.querySelectorAll('.option').forEach(option => {
        option.addEventListener('click', function() {
            const subjectIndex = this.getAttribute('data-subject');
            const question = this.getAttribute('data-question');
            const optionValue = this.getAttribute('data-option');

            if (!answers[subjectIndex]) {
                answers[subjectIndex] = {};
            }

            if (answers[subjectIndex][question] === optionValue) {
                delete answers[subjectIndex][question];
                this.classList.remove('selected');
            } else {
                const previousAnswer = answers[subjectIndex][question];
                if (previousAnswer) {
                    const previousOption = document.querySelector(`span[data-subject='${subjectIndex}'][data-question='${question}'][data-option='${previousAnswer}']`);
                    if (previousOption) {
                        previousOption.classList.remove('selected');
                    }
                }
                answers[subjectIndex][question] = optionValue;
                this.classList.add('selected');
            }
        });
    });

    document.getElementById('quiz-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const dataToSend = {
            answers: answers
        };
        document.getElementById('answers').value = JSON.stringify(dataToSend);

        const selectedExam = document.getElementById('exam-select').value;
        document.getElementById('selected_answer_key').value = selectedExam;

        this.submit();
    });
</script>
@endsection

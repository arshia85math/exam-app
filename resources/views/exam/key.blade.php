@extends('layouts.main')

@section('style')
<style>
    body {
        overflow-x: hidden;
    }

    .questions {
        display: grid;
    }

    .question {
        text-align: center;
        margin: 20px; 
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
        background: #007bff;
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
                <input type="hidden" name="type" value="key">
                <input type="hidden" name="exam_name" value="{{ request()->get('bookName') }}">
                <button type="submit" class="btn btn-outline-primary">ارسال پاسخ</button>
            </form>
        </div>
        <div class="col-4">
            <div class="container col-xxl-8 px-4 py-5">
                <h3>پاسخنامه های ثبت شده</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>تعداد سوالات</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\AnswersKey::all() as $d)

                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->exam_name }}</td>
                            <td>{{ count(json_decode($d->key, true)['answers']) }}</td>
                            <td> <a href="{{ route('delete_key') }}?id={{$d->id}}" class="btn btn-outline-danger btn-sm">حذف</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const numQuestions = "{{ request()->get('numQ') }}";
    let answers = {};
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
    document.getElementById('quiz-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let unansweredQuestions = [];
        for (let i = 1; i <= numQuestions; i++) {
            if (!answers[i]) {
                unansweredQuestions.push(`${i}`); // اضافه کردن سؤالات بدون پاسخ
            }
        }
        const dataToSend = {
            answers: answers,
            unanswered: unansweredQuestions.join(', ') // ذخیره در یک رشته
        };
        document.getElementById('answers').value = JSON.stringify(dataToSend);
        this.submit();
    });
</script>
@endsection
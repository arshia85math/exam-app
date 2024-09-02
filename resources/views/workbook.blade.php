@extends('layouts.main')
@section('style')
<style>
    .question-card {
        padding: 10px;
        border: 0.5px solid #ddd;
        border-radius: 5px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
    }

    .incorrect-question {
        background-color: #ffdddd;
    }

    .correct-question {
        background-color: #ddffdd;
    }

    .question-options {
        margin-top: 5px;
    }

    .question-options label {
        margin-right: 5px;
    }

    .custom-card {
        border-radius: 10px;
        width: 20px;
        /* اندازه دلخواه کارت */
        margin: 20px auto;
        /* مرکز کردن کارت */
        border: 0.5px solid #007bff;
        /* حاشیه کارت */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* سایه کارت */
        background-color: #fff;
        /* رنگ پس‌زمینه کارت */
    }

    .custom-card .card-title {
        color: #007bff;
        /* رنگ عنوان */
    }

    .table th,
    .table td {
        vertical-align: middle;
        /* وسط‌چین کردن محتویات جداول */
    }

    .option {
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 1px solid #ccc;
        text-align: center;
        line-height: 50px;
        margin: 5px;
        border-radius: 5px;
    }

    .correct {
        background-color: green;
        color: white;
    }

    .incorrect {
        background-color: red;
        color: white;
    }

    .unanswered {
        background-color: grey;
        color: white;
    }

    .d-flex {
        display: flex;
    }

    .align-items-center {
        align-items: center;
    }

    .ml-2 {
        margin-right: 15px;
    }

    .custom-card {
        border-radius: 10px;
        width: 600px;
        margin: 60px auto;
        border: 0.5px solid #007bff;
        box-shadow: 0.5px 4px 5px 5px #007bff;
        background-color: #fff;
    }

    .custom-card .card-title {
        color: #007bff;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .option {
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 1px solid #ccc;
        text-align: center;
        line-height: 50px;
        margin: 5px;
        border-radius: 5px;
    }

    .correct {
        background-color: green;
        color: white;
    }

    .incorrect {
        background-color: red;
        color: white;
    }

    .unanswered {
        background-color: grey;
        color: white;
    }

    .d-flex {
        display: flex;
    }

    .align-items-center {
        align-items: center;
    }

    .ml-2 {
        margin-right: 15px;
    }

    .summary-table {
        margin-top: 30px;
    }

    .question-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 5px;
        text-align: center;
    }

    .incorrect-question {
        background-color: rgba(255, 0, 0, 0.2);
    }

    .question-options {
        margin-top: 10px;
    }

    body {
        overflow-x: hidden;
    }
</style>
@endsection

@section('main')

<div class="container">
    <div class="card custom-card">
        <div class="card-body " style="text-align: center;">
            <div class="d-flex justify-content-between">
                <h5 class="card-title black" style="font-size: 15px; color:cadetblue;">تایم مطالعات: {{ session('studyTime') }}</h5>
                <h5 class="card-title bold" style="font-size: 17px;">{{ session('bookName') }}</h5>
            </div>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>تعداد درست</th>
                        <th>تعداد نادرست</th>
                        <th>تعداد نزده </th>
                        <th>تعداد کل </th>
                        <th>مقایسه با هم تراز</th>
                        <th>درصد</th>
                        <th>چند از 10</th>
                        <th>تراز</th>
                        <th>دهک</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $correctAnswers }}</td>
                        <td>{{ $incorrectAnswers }}</td>
                        <td>{{ floor($uns) }}</td>
                        <td>{{ $all-1 }}</td>
                        <td>
                            @if($score >= 3800 && $score <= 4000)
                                <img src="/img/-3.png">
                                @elseif($score >= 4001 && $score <= 4500)
                                    <img src="/img/-2.png">
                                    @elseif($score >= 4501 && $score <= 5000)
                                        <img src="/img/-1.png">
                                        @elseif($score >= 5001 && $score <= 5500)
                                            <img src="/img/0.png">
                                            @elseif($score >= 5500 && $score <= 6000)
                                                <img src="/img/2.png">
                                                @elseif($score >= 6001 && $score <= 6500)
                                                    <img src="/img/3.png">
                                                    @elseif($score > 6500)
                                                    <img src="/img/4.png">
                                                    @endif
                        </td>
                        <td>{{ ceil($percentage) }}%</td>
                        <td>
                            {{ ceil($percentage/10) }}
                        </td>
                        <td>{{ ceil($score) }}</td>
                        <td>{{ calculateDecile($score) }}</td>
                        <td>
                            @if ($score <= 4900)
                                <p style="color:red;">خوب نیست</p>
                                @elseif($score >= 6000)
                                <p style="color:green;">عالی</p>
                                @elseif ($score >= 4900 && $score <= 6000)
                                    <p style="color:blue;">متوسط </p>
                                    @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex align-items-center">
                <p class="bold" style="font-size: 15px;">تاریخ : {{ verta()->formatJalaliDatetime() }} ( {{ verta()->formatWord('dS  F') }} )</p>
                <a href="{{ route('save_result') }}">
                    <button class="btn btn-outline-success ml-2">ثبت</button>
                </a>
            </div>
            <br>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" id="QTrue" class="btn btn-outline-warning">سوالات درست</button>
                <button type="button" id="QFalse" class="btn btn-outline-primary">سوالات نادرست</button>
                <button type="button" id="QWhite" class="btn btn-outline-success">سوالات نزده</button>
            </div>
            <!-- نمایش پاسخنامه کلیدی پایین صفحه -->

        </div>
    </div>
</div>
<center>
    <div class="container">
        <h1>نمودار درصد کتاب‌ها</h1>
        <canvas id="myChart"></canvas>

    </div>
</center>
<center>
    <div class="container">
        <div class="summary-table mt-5">
            <div class="row" style="text-align: center;">
                <h1>برگه پاسخنامه </h1>
                @foreach ($answersKey['answers'] as $index => $correctAnswer)
                <div class="col-md-2 question-card {{ in_array($index, $a) ? 'incorrect-question' : (in_array($index, $b) ? 'correct-question' : '') }}">
                    <p>سوال {{ $index + 1 }}</p>
                    <p>
                        پاسخ شما:
                        @if (in_array($index, $a))
                        <strong>گزینه‌ای که شما زدید: {{ $data['answers'][$index] }}</strong>
                        @elseif (!isset($data['answers'][$index]))
                        <strong style="color: blue;">شما هیچ گزینه‌ای نزدید</strong>
                        @else
                        <strong style="color: green;">درست بود</strong>
                        @endif
                    </p>
                    <p>
                        پاسخ درست:
                        @if (!isset($data['answers'][$index]))
                        <strong style="color: blue;">شما هیچ گزینه‌ای نزدید</strong>
                        @else
                        <strong>{{ $correctAnswer }}</strong>
                        @endif
                    </p>
                    <div class="question-options">
                        @foreach ([1, 2, 3, 4] as $option)
                        <label>
                            <input type="radio" name="question-{{ $index }}" value="{{ $option }}"
                                @if (isset($data['answers'][$index]) && $data['answers'][$index]==$option) checked @endif disabled>
                            {{ $option }}
                        </label>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

</center>
</div>

@endsection

<!-- نمایش SweetAlert2 پیام‌ها -->


@section('scripts')
@if (session('swal'))
<script>
    Swal.fire({
        title: "{{ session('swal.title') }}",
        text: "{{ session('swal.text') }}",
        icon: "{{ session('swal.icon') }}",
        confirmButtonText: 'باشه'
    });
</script>
@endif
<script>
    const QTrue = document.getElementById('QTrue');
    const QFalse = document.getElementById('QFalse');
    const QWhite = document.getElementById('QWhite');
    QWhite.addEventListener('click', function() {
        Swal.fire({
            title: 'سوالات نزده',
            html: `
 <div class="unanswered-questions">
        <h4>سوالات نزده</h4>
        @foreach (explode(',', $data["unanswered"]) as $index)
        @if($index == null)
        0
        @else
            <p>سوال {{ $index + 1 }}: شما هیچ گزینه‌ای نزدید</p>

        @endif
        @endforeach
    </div>
            `,
            focusConfirm: true,
            showCancelButton: false,
            confirmButtonText: 'باشه',

        });
    });
    QTrue.addEventListener('click', function() {
        Swal.fire({
            title: 'سوالات نزده',
            html: `
   <div class="correct-answers">
        <h4>سوالات درست</h4>
        @foreach ($b as $index)
            <p>سوال {{ $index + 1 }}: درست بود</p>
        @endforeach
    </div>
            `,
            focusConfirm: true,
            showCancelButton: false,
            confirmButtonText: 'باشه',

        });
    });
    QFalse.addEventListener('click', function() {
        Swal.fire({
            title: 'سوالات نزده',
            html: `
 
    <div class="incorrect-answers">
        <h4>سوالات نادرست</h4>
        @foreach ($a as $index)
            <p>سوال {{ $index + 1 }}: نادرست (گزینه شما: {{ $data['answers'][$index] }}) گزینه درست: {{ $answersKey['answers'][$index] }}</p>
        @endforeach
    </div>
            `,
            focusConfirm: true,
            showCancelButton: false,
            confirmButtonText: 'باشه',

        });
    });
</script>
<script>
  
</script>
@endsection
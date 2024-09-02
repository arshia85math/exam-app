@extends('layouts.main')
@section('style')
<style>
     
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
            margin: 10px 0;
        }
    
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
        width: 800px;
        margin: 100px auto;
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
@if (request()->get('date') === 'now')

@if (\App\Models\ResultModel::whereDate('created_at', \Carbon\Carbon::today())->exists())
<div class="container">
    <div class="card custom-card">
        <div class="card-body " style="text-align: center;">
            <div class="d-flex justify-content-between">
                <h5 class="card-title black" style="font-size: 15px; color:cadetblue;">
                    <p class="bold" style="font-size: 15px;">تاریخ :{{ verta()->formatWord('dS / F / Y') }}</p>
                </h5>
                <h5 class="card-title bold" style="font-size: 18px;">گزارش کار روزانه</h5>
            </div>
            <table class="table table-bordered table-primary">
                <thead>
                    <tr>
                        <th>نام درس</th>
                        <th>درصد</th>
                        <th>مقایسه با هم تراز</th>
                        <th>درست</th>
                        <th>نادرست</th>
                        <th>نزده</th>
                        <th>تراز</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $allQ = [];
                    $allQT = [];
                    $allQF = [];
                    $allQW = [];
                    @endphp
                    @foreach ($record as $data)
                    <tr>
                        <td>{{ $data->exam_name }}</td>
                        <td>{{ ceil($data->percentage) }}%</td>
                        <td>
                            @php
                            $score = $data->score;
                            @endphp
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
                        <td>{{ $data->correctAnswers }}</td>
                       
                        <td>{{ $data->incorrectAnswers }}</td>
                        <td>{{ floor($data->uns) }} از {{ $data->all - 1 }}</td>
                        <td>{{ ceil($data->score) }}</td>
                        <td>
                            <a href="{{ route('delete_result') }}?id={{ $data->id }}">حذف</a>
                        </td>
                        @php
                        // ذخیره‌سازی مقادیر در آرایه
                        $results[] = [
                        'all' => $data->all,
                        'correctAnswers' => $data->correctAnswers,
                        'incorrectAnswers' => $data->incorrectAnswers,
                        'uns' => $data->uns,
                        ];
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="table-responsive">
                <table class="table table-dark  table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>تراز کل</th>
                            <th>میانگین درصد</th>
                            <th>چند از ده با نمره منفی</th>
                            <th>کل</th>
                            <th>درست</th>
                            <th>نادرست</th>
                            <th>نزده</th>
                            <th>رتبه شما</th>
                            <th>رتبه کشوری در آزمون آزمایشی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $percentage = $record->pluck('percentage');
                        $score = $record->pluck('score');
                        $average = 6000;
                        $count = 10000;
                        $deviation = 1000;
                        $scores = generateScores($average, $count, $deviation);
                        $userScore = $data->score;
                        $userRank = calculateRank($scores, $userScore);
                        $minRank = max(1, $userRank - 10);
                        $maxRank = $userRank + 10;

                        @endphp
                        <tr>
                            <td>{{ ceil($score->avg()) }}</td>
                            <td>{{ ceil($percentage->avg()) }}</td>
                            <td>{{ number_format($percentage->avg()/10, 1) }}</td>
                       
                            <td>{{ sumDataExam($results,'all') }}</td>
                            <td>{{ sumDataExam($results,'correctAnswers') }}</td>
                            <td>{{ sumDataExam($results,'incorrectAnswers') }}</td>
                            <td>{{ floor(sumDataExam($results,'uns'))-1}}</td>
                            <td>{{ $userRank }} از {{ $count }}</td>
                            <td>{{ "رتبه احتمالی شما بین " . $minRank . " تا " . $maxRank . " است.\n"}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<center>
<div class="container">
    <!-- Overall Results Chart -->
    <div class="row bold">
        <div class="bold" style="width: 950px; font-family: bold;">
                <canvas style="font-family: bold;" id="overallResultsChart"></canvas>
        </div>
<br>

    </div>
</center>
</div>
<br>
<br>
<br>
@else
<center>
    <h1 class="black"> هیچ فعالیتی نداشتی امروز بهتره شروع کنی:)))) </h1>
</center>
@endif
@else
@if (\App\Models\ResultModel::whereDate('created_at', request()->get('date')))
<div class="container">
    <div class="card custom-card">
        <div class="card-body " style="text-align: center;">
            <div class="d-flex justify-content-between">
                <h5 class="card-title black" style="font-size: 15px; color:cadetblue;">
                    <p class="bold" style="font-size: 15px;">تاریخ :{{ verta()->formatWord('dS / F / Y') }}</p>
                </h5>
            </div>
            <table class="table table-bordered table-primary">
                <thead>
                    <tr>
                        <th>نام درس</th>
                        <th>درصد</th>
                        <th>درست</th>
                        <th>نادرست</th>
                        <th>نزده</th>
                        <th>تراز</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($record as $datas)
                    <tr>
                        <td>{{ $datas->exam_name }}</td>
                        <td>{{ ceil($datas->percentage) }}%</td>
                        <td>{{ $datas->correctAnswers }}</td>
                        <td>{{ $datas->incorrectAnswers }}</td>
                        <td>{{ ceil($datas->uns) }} از {{ $datas->all - 1 }}</td>
                        <td>{{ ceil($datas->score) }}</td>
                        @php
                        // ذخیره‌سازی مقادیر در آرایه
                        $resultss[] = [
                        'all' => $datas->all,
                        'correctAnswers' => $datas->correctAnswers,
                        'incorrectAnswers' => $datas->incorrectAnswers,
                        'uns' => $datas->uns,
                        ];
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="table-responsive">
                <table class="table table-dark  table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>تراز کل</th>
                            <th>میانگین درصد</th>
                            <th>چند از ده با نمره منفی</th>
                            <th>کل</th>
                            <th>درست</th>
                            <th>نادرست</th>
                            <th>نزده</th>
                            <th>رتبه شما</th>
                            <th>رتبه کشوری در آزمون آزمایشی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $percentages = $record->pluck('percentage');
                        $scores = $record->pluck('score');
                        $averages = 6000;
                        $counts = 10000;
                        $deviations = 1000;
                        $scoress = generateScores($averages, $counts, $deviations);
                        $userScores = $data->score;
                        $userRanks = calculateRank($scoress, $userScores);
                        $minRanks = max(1, $userRanks - 10);
                        $maxRanks = $userRanks + 10;

                        @endphp
                        <tr>
                            <td>{{ ceil($scores->avg()) }}</td>
                            <td>{{ ceil($percentages->avg()) }}</td>
                            <td>{{ number_format($percentages->avg()/10, 1) }}</td>
                            <td>{{ sumDataExam($resultss,'all') }}</td>
                            <td>{{ sumDataExam($resultss,'correctAnswers') }}</td>
                            <td>{{ sumDataExam($resultss,'incorrectAnswers') }}</td>
                            <td>{{ sumDataExam($resultss,'uns')+1 }}</td>
                            <td>{{ $userRanks }} از {{ $counts }}</td>
                            <td>{{ "رتبه احتمالی شما بین " . $minRanks . " تا " . $maxRanks . " است.\n"}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endif
@endif

@endsection


@section('scripts')
<script>
    // Overall results chart
    const overallCtx = document.getElementById('overallResultsChart').getContext('2d');
    new Chart(overallCtx, {
        type: 'line',
        data: {
            labels: @json($record->pluck('exam_name')),
            datasets: [{
                label: 'نمودار درصدی آزمون ها',
                data: @json($record->pluck('percentage')->map(fn($percent) => ceil($percent))),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        responsive: true,
        maintainAspectRatio: false,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
            legend: {
                labels: {
                    font: {
                        family: 'bold',
                        size: 16,      
                        lineHeight: 1.2, 
                    },
                },
            },
            }
        }
    });
</script>
@endsection
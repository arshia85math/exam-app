<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/gh/fontsource/iran-sans@latest/font-files/iran-sans.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Iran Sans', sans-serif;
            direction: rtl; /* Ensure the text direction is set for Persian */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 10px;
            padding: 20px;
        }

        .header,
        .report-section {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 20px 0;
            padding: 10px;
            text-align: center;
        }

        .header {
            background-color: #f2f2f2;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .key {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .key-section {
            width: 48%;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .answer-key {
            font-size: 10px;
            line-height: 1.5;
            margin-bottom: 5px;
        }

        .summary-box, .report-summary {
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 15px;
            text-align: right;
            background-color: #fafafa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>سیستم آزمون آنلاین ارشیا محمدی</h2>
            <p>نام: {{ $userInfo['name'] }} | گروه: {{ $userInfo['group'] }} | آزمون: {{ $userInfo['exam_date'] }} | تاریخ دریافت: {{ $userInfo['issue_date'] }}</p>
            <p>میانگین تراز: {{ $userInfo['average_score'] }} | میانگین درصد: {{ $userInfo['average_percentage'] }} | چند از ده: {{ number_format($userInfo['average_percentage'] / 10, 1) }}</p>
        </div>

        <div class="report-section">
            <h3>وضعیت کلی</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>وضعیت کلی</th>
                        <th>تعداد درست</th>
                        <th>نادرست</th>
                        <th>نزده</th>
                        <th>درصد</th>
                        <th>تراز</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>---</td>
                        <td>{{ sumDataExam($record->toArray(), 'correctAnswers') }}</td>
                        <td>{{ sumDataExam($record->toArray(), 'incorrectAnswers') }}</td>
                        <td>{{ sumDataExam($record->toArray(), 'uns') }}</td>
                        <td>{{ ceil($record->avg('percentage')) }}%</td>
                        <td>{{ ceil($record->avg('score')) }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="summary-box">
                رتبه و تراز شما میان ({{ $userInfo['participants_count'] }}) محاسبه شده است و رتبه شما برابر : {{ $userInfo['rank'] }} است
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>درس</th>
                    <th>درصد</th>
                    <th>چند از ده</th>
                    <th>تفاوت چند از ده شما با میانگین تراز</th>
                    <th>تراز</th>
                    <th>رتبه</th>
                    <th>تعداد درست</th>
                    <th>نادرست</th>
                    <th>نزده</th>
                </tr>
            </thead>
            <tbody>
                @foreach($record as $datas)
                <tr>
                    <td>{{ $datas['exam_name'] }}</td>
                    <td>{{ $datas['percentage'] }}%</td>
                    <td>{{ number_format($datas['percentage'] / 10, 1) }}</td>
                    <td>---</td>
                    <td>{{ $datas['score'] }}</td>
                    <td>---</td>
                    <td>{{ $datas['correctAnswers'] }}</td>
                    <td>{{ $datas['incorrectAnswers'] }}</td>
                    <td>{{ $datas['uns'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary-box">
            وضعیت پاسخگویی: خوب یا بد یا ... و تعداد کل درست ها: {{ sumDataExam($record->toArray(), 'correctAnswers') }}
        </div>

        <div class="key">
            <div class="key-section">
                <h3>پاسخنامه</h3>
                @foreach($record as $i => $data)
                <div class="answer-key">
                    سوال {{ $i + 1 }}:
                    <span class="{{ $data['correctAnswers'] > 0 ? 'correct' : ($data['incorrectAnswers'] > 0 ? 'incorrect' : 'unanswered') }}">
                        {{ $data['correctAnswers'] > 0 ? 'T' : ($data['incorrectAnswers'] > 0 ? 'F' : 'W') }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>

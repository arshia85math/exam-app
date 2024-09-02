@extends('layouts.main')
@section('style')
<style>
    #myInput {
        margin-bottom: 20px;
    }
</style>
@endsection



@section('main')
<div class="container mt-5">
    <h2>جدول آمار</h2>
    <input class="form-control" id="myInput" type="text" placeholder="جستجو...">
    <br>
    @php
    $options = ['primary', 'warning', 'success'];
    @endphp
    <center>
        <button id="work" style="width: 250px; border-radius: 10px;" class="btn btn-outline-primary">
            دریافت کارنامه آزمون ها</button>
    </center>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>شماره</th>
                <th>نام</th>
                <th>تعداد درست</th>
                <th>تعداد نادرست</th>
                <th>تعداد نزده</th>
                <th>تعداد کل</th>
                <th>درصد</th>
                <th>تراز</th>
                <th>وضعیت</th>
                <th>مقایسه با هم تراز</th>
                <th>چند از ده</th>
                <th>دهک</th>
                <th>تاریخ</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if (request()->get('type') === 'all')
            @foreach (\App\Models\ResultModel::all() as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->exam_name }}</td>
                <td>{{ $data->correctAnswers }}</td>
                <td>{{ $data->incorrectAnswers }}</td>
                <td>{{ ceil( $data->uns) }}</td>
                <td>{{ ceil( $data->all)-1 }}</td>
                <td>{{ ceil($data->percentage) }}</td>
                <td>{{ ceil($data->score) }}</td>
                <td>
                    @php
                    $score = $data->score;
                    @endphp
                    @if ($score <= 4900)
                        <p style="color:red;">
                        خوب نیست
                        </p>
                        @elseif($score >= 6000)
                        <p style="color:green;">
                            عالی
                        </p>
                        @elseif ($score >= 4900 && $score <= 6000)
                            <p style="color:blue;">
                            متوسط
                            </p>
                            @endif
                </td>
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
                <td>{{ ceil($data->percentage/10) }}</td>
                <td>{{ calculateDecile($score) }}</td>

                <td>{{ $data->date }}</td>
            </tr>

            @endforeach
            @elseif (request()->get('type') === 'single')
            <tr>
                @php
                $data = \App\Models\ResultModel::find(request()->get('id'));
                @endphp
                <td>{{ $data->id }}</td>
                <td>{{ $data->exam_name }}</td>
                <td>{{ $data->correctAnswers }}</td>
                <td>{{ $data->incorrectAnswers }}</td>
                <td>{{ ceil( $data->uns) }}</td>
                <td>{{ ceil( $data->all)-1 }}</td>
                <td>{{ ceil($data->percentage) }}</td>
                <td>{{ ceil($data->score) }}</td>
                <td>
                    @php
                    $score = $data->score;
                    @endphp
                    @if ($score <= 4900)
                        <p style="color:red;">
                        خوب نیست
                        </p>
                        @elseif($score >= 6000)
                        <p style="color:green;">
                            عالی
                        </p>
                        @elseif ($score >= 4900 && $score <= 6000)
                            <p style="color:blue;">
                            متوسط
                            </p>
                            @endif
                </td>
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
                <td>{{ ceil($data->percentage/10) }}</td>
                <td>{{ calculateDecile($score) }}</td>

                <td>{{ $data->date }}</td>
            </tr>
            @endif
        </tbody>
    </table>
    </div>
    @endsection



    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script>
        const work = document.getElementById('work');
        work.addEventListener('click', function() {
            Swal.fire({
                title: "دریافت کارنامه آزمون",
                html: " @foreach (\App\Models\ResultModel::all() as $data) @php $randomIndex = array_rand($options); @endphp <a href='{{ route('workbook_now') }}?date={{  $data->created_at }}'><button type='button' class='btn btn-outline-{{$options[$randomIndex]}}  black m-3'  style='border-radius: 10px;'>{{ verta($data->created_at)->format('%B %d، %Y (l)') }} - {{ $data->exam_name }}</button></a> @endforeach",
                buttons: false,
                showCloseButton: true, // برای نمایش دکمه بستن 
            });
        });
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        
    </script>

    @endsection
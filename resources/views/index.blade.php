@extends('layouts.main')

@section('main')
<div class="container text-center">
    <div class="row row-cols-1 g-2 g-lg-3">
        <div class="col">
            <button class="btn btn-success " id="CreateExam">ساخت آزمون تک درس</button>
        </div>
        <div class="col justify-content-center">
            <button id="CreateKey" class="btn btn-dark "><a>ایجاد کلید آزمون</a></button>
        </div>
        <div class="col justify-content-center">
            <button id="workbook" class="btn btn-outline-success "><a>کارنامه ها</a></button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const CreateExam = document.getElementById('CreateExam');
    const CreateKey = document.getElementById('CreateKey');
    const workbook = document.getElementById('workbook');
    workbook.addEventListener('click', function() {
        Swal.fire({
            title: "دریافت کارنامه آزمون",
            input: "select",
            inputOptions: {
                کارنامه: {
                    @foreach(\App\Models\ResultModel::all() as $data)
                    "{{ $data->id }}" : "{{ $data->exam_name }}" + "- تاریخ :" + "{{ verta($data->created_at)->format('Y / F / d') }}" ,
                    @endforeach
                }
            },
            html: "<a class='black btn btn-outline-primary' href='{{ route('workbook_all') }}?id=0&type=all'>مشاهده همه</a> <a class='black btn btn-outline-warning' href='{{ route('workbook_now') }}?date=now'>کارنامه و گزارش کار امروز</a>",
            inputPlaceholder: "انتخاب کارنامه",
            showCancelButton: true,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    window.location.href = "{{ route('workbook_all')}}?id="+ value + '&type=single';
                });
            }
        });
    });
    CreateExam.addEventListener('click', function() {
        Swal.fire({
            title: 'اطلاعات آزمون',
            html: `
                <input id="numberOfQuestions" class="swal2-input" placeholder="تعداد سوالات آزمون">
                <input id="bookName" class="swal2-input" placeholder="نام کتاب">
                <input id="studyTime" class="swal2-input" placeholder="تایم مطالعاتی">
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'ارسال',
            cancelButtonText: 'لغو',
            preConfirm: () => {
                const numberOfQuestions = document.getElementById('numberOfQuestions').value;
                const bookName = document.getElementById('bookName').value;
                const studyTime = document.getElementById('studyTime').value;

                if (!numberOfQuestions || !bookName || !studyTime) {
                    Swal.showValidationMessage(`لطفاً همه فیلدها را پر کنید!`);
                }
                return {
                    numberOfQuestions,
                    bookName,
                    studyTime
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // انتقال به صفحه جدید و نمایش اطلاعات ورودی
                const data = result.value;
                window.location.href = `{{route('exam')}}?numberOfQuestions=${data.numberOfQuestions}&bookName=${data.bookName}&studyTime=${data.studyTime}&type=single`;
            }
        });
    });
    CreateKey.addEventListener('click', function() {
        Swal.fire({
            title: 'اطلاعات پاسخنامه',
            html: `
                <input id="numQ" class="swal2-input" placeholder="تعداد سوالات پاسخنامه">
                <input id="bookName" class="swal2-input" placeholder="نام آزمون">
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'ارسال',
            cancelButtonText: 'لغو',
            preConfirm: () => {
                const numberOfQuestions = document.getElementById('numQ').value;
                const bookName = document.getElementById('bookName').value;

                if (!numberOfQuestions || !bookName) {
                    Swal.showValidationMessage(`لطفاً همه فیلدها را پر کنید!`);
                }
                return {
                    numberOfQuestions,
                    bookName,
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // انتقال به صفحه جدید و نمایش اطلاعات ورودی
                const data = result.value;
                window.location.href = `{{route('create_key')}}?numQ=${data.numberOfQuestions}&bookName=${data.bookName}`;
            }
        });
    });
</script>
@endsection
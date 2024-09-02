<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/icon.jpg" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>سیستم آزمون دهی ارشیا محمدی</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('style')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <main>
        <br><br>
        <center>
            <div class="container py-4">
                <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                    <d class="container-fluid py-5">
                        <h3 class="black">سلام به سیستم آزمون دهی ارشیا محمدی خوش آمدید</h3>
                </div>
            </div>
        </center>
        <div class="row align-items-md-stretch">
            @yield('main')
        </div>

        </div>
    </main>

    @yield('scripts')
</body>

</html>
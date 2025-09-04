<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description"
        content="Aplikasi gratis dan sederhana untuk kelola utang piutang. Cocok untuk pencatatan utang piutang pribadi, bisnis, dan keuangan kecil. Kelola keuangan jadi mudah!">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">

    @include('home-page.partials.header')

    <main>
        @yield('content')
    </main>

    @include('home-page.partials.footer')

</body>

</html>

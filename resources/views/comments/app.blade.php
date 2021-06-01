<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Форум - Вопросы</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/dashboard/theme.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="main-content">
            @yield('content')
        </div>
        <script src="{{ asset('js/dashboard/app.js') }}"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Forum - Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard/theme.css') }}" rel="stylesheet">
</head>
<body class="d-flex align-items-center bg-auth">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">
            <h1 class="display-4 text-center mb-3">Авторизация</h1>
            @if(session('message'))
                <h5>{{ session('message') }}</h5>
            @endif
            <form action="{{ route('auth.sign-in') }}" method="POST" accept-charset="UTF-8">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="loginInput">Логин</label>
                    <input type="text" name="login" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" id="loginInput" placeholder="Ведите логин" maxlength="50">
                </div>

                <div class="form-group">
                    <label class="form-label" for="passwordInput">Пароль</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" id="passwordInput" name="password" placeholder="Введите пароль" maxlength="25" required>
                        <span class="input-group-text"><i class="fe fe-eye"></i></span>
                    </div>
                </div>

                <button class="btn btn-lg w-100 btn-primary mb-3">Войти</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

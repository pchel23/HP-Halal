<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/user-forms.css')}}">
</head>
<body>
    <button class="back-btn">НАЗАД</button>
    <div class="forms-layout">
        @yield('content')
    </div>
</body>
</html>
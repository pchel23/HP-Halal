<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/shell.css')}}">
    <link rel="stylesheet" href="{{asset('css/products.css')}}">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-item active">Список категорий</div>
        <div class="sidebar-item">Список товаров</div>
        <div class="sidebar-item">Поступившие заказы</div>
        <div class="sidebar-item">Точки продажи</div>
        <div class="sidebar-item">Статистика</div>
        <div class="sidebar-item">Отчетность</div>
        <div class="sidebar-item">Отзывы</div>
        <div class="sidebar-item">Сотрудники</div>
        <form method="post" action="{{route('logout')}}">
            @csrf
        <button type="submit" class="sidebar-item">Выйти</button>
        </form>
        <div class="sidebar-item-role">АДМИНИСТРАТОР</div>
    </aside>
    <main class="main-content">
        @yield('content')
    </main>
</body>
</html>
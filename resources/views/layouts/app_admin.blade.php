<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/shell.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
    <aside class="sidebar">
        <a href="{{ route('admin.categories') }}"
           class="sidebar-item {{ request()->routeIs('admin.categories', 'form_category', 'admin.category.*') ? 'active' : '' }}">
            Список категорий
        </a>

        <a href="{{ route('admin.addons') }}"
           class="sidebar-item {{ request()->routeIs('admin.addons', 'form_addon', 'admin.addon.*') ? 'active' : '' }}">
            Список дополнений
        </a>
        <a href="#" class="sidebar-item">Список товаров</a>
        <a href="#" class="sidebar-item">Поступившие заказы</a>

        <a href="{{ route('admin.points') }}"
           class="sidebar-item {{ request()->routeIs('admin.points', 'form_point', 'admin.point.*') ? 'active' : '' }}">
            Точки продажи
        </a>

        <a href="#" class="sidebar-item">Статистика</a>
        <a href="#" class="sidebar-item">Отчетность</a>
        <a href="#" class="sidebar-item">Отзывы</a>
        <a href="{{ route('admin.employee') }}"
           class="sidebar-item {{ request()->routeIs('admin.employee', 'form_employee', 'admin.employee.*') ? 'active' : '' }}">
            Сотрудники
        </a>

        <form method="post" action="{{ route('logout') }}">
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

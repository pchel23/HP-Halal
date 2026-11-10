<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    <header>
        <div class="header-img">
            <div class="header-inf">

            </div>
        </div>
    </header>
    @guest <a href="{{route('authorization')}}"> @endguest 
    @auth <a href="{{route('profile')}}"> @endauth
        <div class="profil-icon"></div></a>
    <div class="banner">
        <div class="top-controls">
            <input type="text" class="search-input" placeholder="Напишите название...">
        </div>
    </div>

    <div class="categories">
        <span class="arrow">&larr;</span>
        <button class="category-btn">Все</button>
        <button class="category-btn">название категории</button>
        <button class="category-btn">название категории</button>
        <button class="category-btn">название категории</button>
        <span class="arrow">&rarr;</span>
    </div>

    <h2 class="page-title">Название текущей категории</h2>
    <div class="grid-container">
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
        <div class="product-card">
            <div class="product-img"></div>
            <div class="product-controls">
                <div class="price-value">Цена руб+</div>
            </div>
        </div>
    </div>

    <div class="pagination">
        <div class="page-btn active">1</div>
        <div class="page-btn">2</div>
        <div class="page-btn">3</div>
    </div>

    <footer>
        <h3>+7 923 876-21-65</h3>
        <h3>+7 923 584-21-67</h3>
    </footer>
</body>
</html>

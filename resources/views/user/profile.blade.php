<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    <div class="btn-back">Назад</div>
    <header>
        <div class="header-img">
            <div class="header-inf"></div>
        </div>
        <div class="circle"></div>
    </header>

    <h2 class="profile-title">Номер вашего заказа:</h2>

    <div class="order-profcontainer">
        <!-- Вся карточка активного заказа -->
        <div class="order-back">
            <!-- Верхняя часть: Линия и круги -->
            <div class="upper">
                <div class="hrs"></div>
                <div class="circle1"><p>в обработке</p></div>
                <div class="circle2"><p>на кухне</p></div>
                <div class="circle3"><p>готов к выдаче</p></div>
                <div class="circle4"><p>выдан</p></div>
            </div>

            <!-- Нижняя часть: Информация внутри той же карточки -->
            <div class="downer">
                <p>Способ оплаты: Цена</p>
                <div class="blocks">
                    <div class="imgprof-placeholder"></div>
                    <div class="imgprof-placeholder"></div>
                    <div class="imgprof-placeholder"></div>
                    <div class="imgprof-placeholder"></div>
                </div>
            </div>
        </div> <!-- Конец order-back -->

        <button class="cart-order">Корзина</button>
    </div>

    <h2 class="profile-title">Ваши предыдущие заказы:</h2>

    <div class="list-profcontainer">
        <div class="list-back">
            <div class="list-item">
                <div class="item-info">
                    <strong>Номер заказа:</strong>
                    <p>Дата заказа:</p>
                    <strong>Итого:</strong>
                    <button class="revwies-order">Оставить отзыв</button>
                </div>
                <div class="item-controls">
                    <span class="arrow">&larr;</span>
                    <div class="img-placeholder"></div>
                    <div class="img-placeholder"></div>
                    <div class="img-placeholder"></div>
                    <span class="arrow">&rarr;</span>
                </div>
            </div>
        </div>
        <div class="list-back">
            <div class="list-item">
                <div class="item-info">
                    <strong>Номер заказа:</strong>
                    <p>Дата заказа:</p>
                    <strong>Итого:</strong>
                    <button class="revwies-order">Оставить отзыв</button>
                </div>
                <div class="item-controls">
                    <span class="arrow">&larr;</span>
                    <div class="img-placeholder"></div>
                    <div class="img-placeholder"></div>
                    <div class="img-placeholder"></div>
                    <span class="arrow">&rarr;</span>
                </div>
            </div>
        </div>
        <div class="list-back">
            <div class="list-item">
                <div class="item-info">
                    <strong>Номер заказа:</strong>
                    <p>Дата заказа:</p>
                    <strong>Итого:</strong>
                    <button class="revwies-order">Оставить отзыв</button>
                </div>
                <div class="item-controls">
                    <span class="arrow">&larr;</span>
                    <div class="img-placeholder"></div>
                    <div class="img-placeholder"></div>
                    <div class="img-placeholder"></div>
                    <span class="arrow">&rarr;</span>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="cart-order">Выйти</button>
    </form>

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

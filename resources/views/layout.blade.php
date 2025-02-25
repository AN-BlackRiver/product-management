<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары и Заказы</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Навигация с вкладками -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="{{ route('products.index') }}" class="nav-link {{strpos(request()->url(), 'products') ? "active" : ""}}" id="products-tab" type="button" role="tab" aria-controls="products" aria-selected="true">Товары</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('orders.index') }}" class="nav-link {{strpos(request()->url(), 'orders') ? "active" : ""}}" id="orders-tab" type="button" role="tab" aria-controls="orders" aria-selected="false">Заказы</a>
        </li>
    </ul>

    <!-- Содержимое вкладок -->
    <div class="tab-content mb-5" id="myTabContent">

        @yield('content')

    </div>
</div>

<!-- Подключение Bootstrap JS и Popper.js (если нужно) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

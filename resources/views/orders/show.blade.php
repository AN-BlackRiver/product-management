@extends('layout')

@section('content')
    <h2 class="mt-3">Заказ № {{$order->id}}</h2>

    <div class="mb-3">
        <label for="productName" class="form-label">Статус</label>
        <input disabled value="{{$order->status}}" type="text" class="form-control" id="productName">
    </div>

    <!-- Поле для названия товара -->
    <div class="mb-3">
        <label for="productName" class="form-label">Товар</label>
        <input disabled value="{{$order->product->title}}" type="text" class="form-control" id="productName" name="count">
    </div>

    <div class="mb-3">
        <label for="productName" class="form-label">Количество</label>
        <input disabled value="{{$order->count}}" type="text" class="form-control" id="productName">
    </div>

    <div class="mb-3">
        <label for="productName" class="form-label">ФИО покупателя</label>
        <input disabled value="{{$order->customer_name}}" type="text" class="form-control" id="productName" name="customer_name">
    </div>

    <div class="mb-3">
        <label for="productDescription" class="form-label">Комментарий</label>
        <textarea disabled class="form-control" id="productDescription" name="description"
                  rows="2">{{$order->description}}</textarea>
    </div>

    <div class="mb-3">
        <label for="productName" class="form-label">Сумма заказа</label>
        <input disabled value="{{$order->total_price}}" type="text" class="form-control" id="productName" name="customer_name">
    </div>

    <!-- Кнопка отправки формы -->
    <div class="d-flex gap-2">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>

        @if($order->status == "Новый")
        <form method="POST" action="{{ route('orders.complete', $order->id) }}">
            @csrf
            <button type="submit" class="btn btn-success">Завершить</button>
        </form>
        @endif

        <a href="{{ route('orders.complete', $order->id) }}" class="btn btn-warning">Редактировать</a>

        <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection

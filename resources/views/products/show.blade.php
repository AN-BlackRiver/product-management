@extends('layout')

@section('content')
    <h2 class="mt-3">Товар {{$product->title}}</h2>

    @csrf
    <!-- Поле для названия товара -->
    <div class="mb-3">
        <label for="productName" class="form-label">Название товара</label>
        <input value="{{$product->title}}" type="text" class="form-control" id="productName" name="title" disabled>
    </div>

    <!-- Поле для описания товара -->
    <div class="mb-3">
        <label for="productDescription" class="form-label">Описание товара</label>
        <textarea disabled class="form-control" id="productDescription" name="description"
                  rows="2">{{$product->description}}</textarea>
    </div>

    <!-- Выбор категории -->
    <div class="mb-3">
        <label for="productCategory" class="form-label">Категория</label>
        <input value="{{$product->category->title}}" type="text" class="form-control" disabled>
    </div>

    <!-- Поле для цены -->
    <div class="mb-3">
        <label for="productPrice" class="form-label">Цена</label>
        <input value="{{$product->price}}" type="number" class="form-control" id="productPrice" name="price" step="0.01"
               min="0" disabled>
    </div>

    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>

        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
    <!-- Кнопка отправки формы -->


@endsection

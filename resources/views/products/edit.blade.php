@extends('layout')

@section('content')
    <h2 class="mt-3">Редактирование товара {{$product->title}}</h2>
    <form method="POST" id="productForm" class="mt-4" action="{{ route('products.update', $product->id) }}">

        @csrf
        @method('PATCH')
        <!-- Поле для названия товара -->
        <div class="mb-3">
            <label for="productName" class="form-label">Название товара</label>
            <input value="{{old('title') ? old('title') : $product->title}}" type="text" class="form-control" id="productName" name="title">
            @error('title')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Поле для описания товара -->
        <div class="mb-3">
            <label for="productDescription" class="form-label">Описание товара</label>
            <textarea
                class="form-control"
                id="productDescription"
                name="description"
                rows="2">{{old('description') ? old('description') : $product->description }}</textarea>
        </div>

        <!-- Выбор категории -->
        <div class="mb-3">
            <label for="productCategory" class="form-label">Категория</label>
            <select class="form-select" id="productCategory" name="category_id">
                <option value="" disabled selected>Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': ''}}>{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Поле для цены -->
        <div class="mb-3">
            <label for="productPrice" class="form-label">Цена</label>
            <input value="{{old('price') ? old('price') : $product->price}}" type="number" class="form-control" id="productPrice" name="price" step="0.01" min="0">
            @error('price')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Кнопка отправки формы -->
        <div class="mb-5">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('products.show', $product->id) }}" type="submit" class="btn btn-secondary">Назад</a>
        </div>

    </form>
@endsection

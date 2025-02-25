@extends('layout')

@section('content')
    <h2 class="mt-3">Добавление нового товара</h2>
    <form method="POST" id="productForm" class="mt-4" action="{{ route('products.store') }}">

        @csrf
        <!-- Поле для названия товара -->
        <div class="mb-3">
            <label for="productName" class="form-label">Название товара</label>
            <input value="{{old('title')}}" type="text" class="form-control" id="productName" name="title">
            @error('title')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Поле для описания товара -->
        <div class="mb-3">
            <label for="productDescription" class="form-label">Описание товара</label>
            <textarea class="form-control" id="productDescription" name="description" rows="2">{{old('description')}}</textarea>
        </div>

        <!-- Выбор категории -->
        <div class="mb-3">
            <label for="productCategory" class="form-label">Категория</label>
            <select class="form-select" id="productCategory" name="category_id">
                <option value="" disabled selected>Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id')? 'selected': ''}}>{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Поле для цены -->
        <div class="mb-3">
            <label for="productPrice" class="form-label">Цена</label>
            <input value="{{old('price')}}" type="number" class="form-control" id="productPrice" name="price" step="0.01" min="0">
            @error('price')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Кнопка отправки формы -->
        <div class="mb-5">
            <button type="submit" class="btn btn-primary">Добавить товар</button>
            <a href="{{ route('products.index') }}" type="submit" class="btn btn-secondary">Назад</a>
        </div>

    </form>
@endsection

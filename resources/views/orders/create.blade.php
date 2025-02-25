@extends('layout')

@section('content')
    <h2 class="mt-3">Добавление нового заказа</h2>
    <form method="POST" id="productForm" class="mt-4" action="{{ route('orders.store') }}">

        @csrf
        <!-- Поле для названия товара -->
        <div class="mb-3">
            <label for="product" class="form-label">Товар</label>
            <select class="form-select" id="product" name="product_id">
                <option value="" disabled selected>Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{$product->id}}" {{$product->id == old('product_id')? 'selected': ''}}>{{$product->title}}</option>
                @endforeach
            </select>
            @error('product_id')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productName" class="form-label">Количество</label>
            <input value="{{old('count') ? old('count') : 1}}" type="number" min="1" class="form-control" id="productName" name="count">
            @error('count')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productName" class="form-label">ФИО покупателя</label>
            <input value="{{old('customer_name')}}" type="text" class="form-control" id="productName" name="customer_name">
            @error('customer_name')
            <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productDescription" class="form-label">Комментарий</label>
            <textarea class="form-control" id="productDescription" name="description" rows="2">{{old('description')}}</textarea>
        </div>

        <!-- Кнопка отправки формы -->
        <div class="mb-5">
            <button type="submit" class="btn btn-primary">Создать заказ</button>
            <a href="{{ route('orders.index') }}" type="submit" class="btn btn-secondary">Назад</a>
        </div>

    </form>
@endsection

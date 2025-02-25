@extends('layout')

@section('content')
    <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
        <h2 class="mt-3">Список товаров</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @forelse($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category->title}}</td>
                    <td>{{$product->price}}</td>
                    <td class="text-center"><a href="{{ route('products.show', $product->id) }}">Просмотр</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">У вас пока нет товаров</td>
                </tr>
            @endforelse

            </tbody>
        </table>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить товар</a>
    </div>
@endsection

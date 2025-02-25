@extends('layout')

@section('content')
    <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <h2 class="mt-3">Список заказов</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">№ заказа</th>
                <th scope="col">Дата создания</th>
                <th scope="col">ФИО покупателя</th>
                <th scope="col">Статус</th>
                <th scope="col">Комментарий</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->description}}</td>
                    <td class="text-center"><a href="{{ route('orders.show', $order->id) }}">Просмотр</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">У вас пока нет заказов</td>
                </tr>
            @endforelse

            </tbody>
        </table>

        <a href="{{ route('orders.create') }}" class="btn btn-primary">Cоздать заказ</a>
    </div>
@endsection

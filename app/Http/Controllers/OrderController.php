<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all()->sortByDesc('created_at');
        return view('orders.index', compact('orders'));
    }



    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $product_price = Product::query()->where('id', $data['product_id'])->value('price');

        $total_price = $product_price * $data['count'];

        $data['total_price'] = $total_price;

        //по сути надо выносить отдельно

        Order::query()->create($data);

        return redirect()->route('orders.index');
    }


    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }


    public function edit(Order $order)
    {
        $products = Product::all();

        return view('orders.edit', compact('order', 'products'));
    }


    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();

        $product_price = Product::query()->where('id', $data['product_id'])->value('price');

        $total_price = $product_price * $data['count'];

        $data['total_price'] = $total_price;

        $order = $order->update($data);

        return redirect()->route('orders.show', compact('order'));
    }

    public function complete(Order $order)
    {
        $order->update(['status' => true]);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}

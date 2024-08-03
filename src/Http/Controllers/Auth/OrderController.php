<?php

namespace Zoker\Shop\Http\Controllers\Auth;

use Illuminate\View\View;
use Zoker\Shop\Http\Controllers\Controller;
use Zoker\Shop\Models\Order;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = auth()->user()->orders()->with(['products', 'products.product'])->get();

        return view('pages.auth.orders.index', compact('orders'));
    }

    public function show($orderHash): View
    {
        $order = Order::byHashOrFail($orderHash);
        $order->load(['products', 'products.product']);

        abort_if($order->user_id !== auth()->id(), 403);

        return view('pages.auth.orders.show', compact('order'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'service'])->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('orders.create', compact('customers', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|numeric|min:0.1',
            'order_date' => 'required|date',
            'finish_date' => 'nullable|date|after_or_equal:order_date',
        ]);

        $service = Service::find($validated['service_id']);
        $validated['total_price'] = $service->price * $validated['quantity'];
        $validated['status'] = 'pending';

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        $services = Service::all();
        return view('orders.edit', compact('order', 'customers', 'services'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|numeric|min:0.1',
            'status' => 'required|in:pending,process,done,taken',
            'order_date' => 'required|date',
            'finish_date' => 'nullable|date|after_or_equal:order_date',
        ]);

        $service = Service::find($validated['service_id']);
        $validated['total_price'] = $service->price * $validated['quantity'];

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diupdate!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}
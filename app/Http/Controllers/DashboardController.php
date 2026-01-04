<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalServices = Service::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();

        return view('dashboard', compact('totalCustomers', 'totalServices', 'totalOrders', 'pendingOrders'));
    }
}
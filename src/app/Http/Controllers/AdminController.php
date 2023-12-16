<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.home.index');
    }
    public function index()
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('order_total');
        $customerCount = Customer::count();
        return view('admin.home.index', compact('productCount', 'orderCount', 'totalRevenue', 'customerCount'));
    }

    public function postloginAdmin(Request $request)
    {
    }

    public function showDashboard()
    {
    }
}

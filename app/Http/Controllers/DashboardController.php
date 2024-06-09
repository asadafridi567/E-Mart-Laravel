<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('price');
        $totalRevenueThisMonth = Order::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $totalProducts = Product::count();
        $totalUsers = User::count();

        return view('dashboard', [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalRevenueThisMonth' => $totalRevenueThisMonth,
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
        ]);
    }
}

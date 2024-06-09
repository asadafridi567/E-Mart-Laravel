<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->select('orders.*', 'products.name as product_name')
        ->get();

        return view('adminorders', compact('orders'));
    }
}

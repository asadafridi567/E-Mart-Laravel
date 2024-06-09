<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\ShoppingCart;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view("landingpage","/landingpage");

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::get('/adminlogout', function () {
    Session::forget('user');
    return redirect('adminlogin');
});


Route::post("/login",[UserController::class,'login']);
Route::post('/register', [UserController::class,'register']);
Route::get("/landingpage",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);
Route::post("cart",[ProductController::class,'addToCart']);
Route::get("cart",[ProductController::class,'cartList']); 
Route::get('/shopping-cart', ShoppingCart::class)->name('shopping.cart');
Route::get("removecart/{id}",[ProductController::class,'removeCart']); 
//Route::get("checkout",[ProductController::class,'orderNow']); 
Route::post("checkout",[ProductController::class,'placeOrder']); 
Route::get("orders",[ProductController::class,'myOrders']); 

Route::get('/cart/checkout', [ProductController::class, 'orderNow'])->name('cart.checkout');
Route::get('/buynow/checkout', [ProductController::class, 'buyNow'])->name('buynow.checkout');

Route::get("/shirts",[ProductController::class,'shirts']);
Route::get("/shoes",[ProductController::class,'shoes']);
Route::get("/watches",[ProductController::class,'watches']);
Route::get("/jackets",[ProductController::class,'jackets']);
Route::get("/glasses",[ProductController::class,'glasses']);
Route::get("/jeans",[ProductController::class,'jeans']);


// Admin Dasboard Routes
Route::get('/adminlogin', function () {
    return view('adminlogin');
});
Route::post('/adminlogin', [UserController::class, 'adminlogin']);
Route::get('/edituser', function () {
    return view('edituser');
})->name('edituser');

// Add Product Route
Route::get('/addproduct', function () {
    return view('addproduct');
})->name('addProduct');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/adminproducts', [ProductController::class, 'all'])->name('adminproducts.index');
Route::get('/adminproducts/{id}/edit', [ProductController::class, 'edit'])->name('adminproducts.edit');
Route::put('/adminproducts/{id}', [ProductController::class, 'update'])->name('adminproducts.update');
Route::delete('adminproducts/{id}', [ProductController::class,'destroy'])->name('adminproducts.destroy');
Route::post('adminproducts/add', [ProductController::class,'store'])->name('adminproducts.store');

Route::get('/adminusers', [UserController::class, 'index'])->name('adminusers.index');
Route::get('/adminusers/{user}/edit', [UserController::class, 'edit'])->name('adminusers.edit');
Route::put('/adminusers/{user}', [UserController::class, 'update'])->name('adminusers.update');
Route::delete('/adminusers/{user}', [UserController::class, 'destroy'])->name('adminusers.destroy');


Route::get('/adminorders', [OrdersController::class, 'index'])->name('adminorders.index');



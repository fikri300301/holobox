<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\CategoryPaketController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/kategory-paket/{id}', [CategoryPaketController::class, 'index'])->name('Category.paket');
Route::get('/paket-detail/{id}', [CategoryPaketController::class, 'detail'])->name('paket.detail');


// Route untuk dashboard - dapat diakses oleh semua pengguna yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//rencana route admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add-categories', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/pakets', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/add-pakets', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/pakets', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::patch('/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
    Route::get('/riwayat-order-admin', [OrderController::class, 'all'])->name('all.order');
});

//ini contoh route user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/riwayat-order', [OrderController::class, 'index'])->name('riwayat-order');
    Route::get('/order/{id}', [OrderController::class, 'getOrder'])->name('get.order');
    Route::post('/order/{id}', [OrderController::class, 'store'])->name('post.order');
    Route::get('/product/{id}', [DetailOrderController::class, 'show'])->name('order.detail');
    Route::get('/product-paid/{id}', [DetailOrderController::class, 'show_paid'])->name('orderPaid.detail');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name("checkout-process");
    Route::get('/checkout/{transaction}', [CheckoutController::class, 'checkout'])->name("checkout");
    Route::get('/checkout/success/{transaction}', [CheckoutController::class, 'success'])->name("checkout-success");
});
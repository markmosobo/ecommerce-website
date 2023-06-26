<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterSellerController;
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

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('single_product/{id}', [PagesController::class, 'singleProduct']);
Route::get('single_category/{id}', [PagesController::class, 'singleCategory']);
Route::post('create-seller',[RegisterSellerController::class,'createSeller'])->name('create-seller');
Route::get('register-seller',[PagesController::class,'registerSeller']);
Route::get('checkout',[PagesController::class,'checkout']);

Route::get('cart', [App\Http\Controllers\CartController::class, 'cart']);
Route::get('add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::patch('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::delete('remove-from-cart', [App\Http\Controllers\CartController::class, 'remove'])->name('remove.cart');

Route::post('order',[App\Http\Controllers\CheckoutController::class,'storeOrder'])->name('store.order');
Route::get('cancel-payment', [App\Http\Controllers\PaymentController::class,'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [App\Http\Controllers\PaymentController::class,'paymentSuccess'])->name('success.payment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin')->middleware('role:admin');
Route::get('/seller_dashboard', [App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('seller')->middleware('role:seller');
Route::get('/buyer_dashboard', [App\Http\Controllers\Buyer\DashboardController::class, 'index'])->name('buyer')->middleware('role:buyer');

Route::get('user-datatable', [App\Http\Controllers\UserController::class, 'index']);
Route::post('store-user', [App\Http\Controllers\UserController::class, 'store']);
Route::post('edit-user', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('delete-user', [App\Http\Controllers\UserController::class, 'destroy']);

Route::get('product-datatable', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('store-product', [App\Http\Controllers\ProductController::class, 'store']);
Route::post('edit-product', [App\Http\Controllers\ProductController::class, 'edit']);
Route::delete('delete-product', [App\Http\Controllers\ProductController::class, 'destroy']);

Route::get('sellerproduct-datatable', [App\Http\Controllers\SellerProductController::class, 'index']);

Route::get('category-datatable', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('store-category', [App\Http\Controllers\CategoryController::class, 'store']);
Route::post('edit-category', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('delete-category', [App\Http\Controllers\CategoryController::class, 'destroy']);

Route::get('about-datatable', [App\Http\Controllers\AboutController::class, 'index']);
Route::post('store-about', [App\Http\Controllers\AboutController::class, 'store']);
Route::post('edit-about', [App\Http\Controllers\AboutController::class, 'edit']);
Route::post('delete-about', [App\Http\Controllers\AboutController::class, 'destroy']);

Route::get('contact-datatable', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('store-contact', [App\Http\Controllers\ContactController::class, 'store']);
Route::post('edit-contact', [App\Http\Controllers\ContactController::class, 'edit']);
Route::post('delete-contact', [App\Http\Controllers\ContactController::class, 'destroy']);

Route::get('profile',[App\Http\Controllers\ProfileController::class,'getProfile']);
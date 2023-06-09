<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AddCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\CartPage;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Category;
use App\Http\Livewire\Shop;
use App\Http\Livewire\User\User;
use App\Http\Livewire\Admin\Admin;
use App\Http\Livewire\Admin\AdminCategory;
use App\Http\Livewire\Admin\AdminProduct;
use App\Http\Livewire\Admin\EditCategory;
use App\Http\Livewire\Details;
use App\Http\Livewire\Shopwishlist;
use App\Http\Livewire\Admin\AddProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\HomeSlider;
use App\Http\Livewire\Admin\AddSlider;
use App\Http\Livewire\Admin\EditSlider;
use App\Http\Livewire\Admin\Coupons;
use App\Http\Livewire\Admin\EditCoupon;
use App\Http\Livewire\Admin\AddCoupon;
use App\Http\Livewire\Admin\OrderDetails;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Thanks;
use App\Http\Livewire\User\UserOrderDetails;
use App\Http\Livewire\User\UserOrders;
use App\Http\Livewire\User\UserReview;

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

Route::get('/', Home::class);
Route::get('/shop', Shop::class)->name('shop');
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/product/{slug}', Details::class)->name('details');
Route::get('/wishlist', Shopwishlist::class)->name('wishlist');
Route::get('/category/{slug}', Category::class)->name('category');
Route::get('/thanks', Thanks::class)->name('thanks');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/deshboard', User::class)->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', UserOrders::class)->name('user.orders');
    Route::get('/users/orders/show/{order_id}', UserOrderDetails::class)->name('user.orders.show');
    Route::get('/user/reviews/{order_item_id}', UserReview::class)->name('user.review');
});

Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::get('/admin/deshboard', Admin::class)->name('admin.dashboard');
    Route::get('/category', AdminCategory::class)->name('admin.category');
    Route::get('/addcategory', AddCategory::class)->name('admin.category.add');
    Route::get('/editcategory/{category_id}', EditCategory::class)->name('admin.category.edit');
    Route::get('/product', AdminProduct::class)->name('admin.product');
    Route::get('/addproduct', AddProduct::class)->name('admin.product.add');
    Route::get('/editproduct/{product_id}', EditProduct::class)->name('admin.product.edit');
    Route::get('/homesliders', HomeSlider::class)->name('admin.homesliders');
    Route::get('/AddSlider', AddSlider::class)->name('admin.add.slider');
    Route::get('/editslider/{slider_id}', EditSlider::class)->name('admin.add.slider.edit');
    Route::get('/coupons', Coupons::class)->name('admin.coupons');
    Route::get('/addcoupon', AddCoupon::class)->name('admin.add.coupon');
    Route::get('/editcoupon/{coupon_id}', EditCoupon::class)->name('admin.edit.coupon');
    Route::get('/admin/order', Orders::class)->name('admin.order');
    Route::get('/admin/order/edit/{order_id}', OrderDetails::class)->name('admin.order.details');
});

require __DIR__ . '/auth.php';

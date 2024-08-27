<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/logout', [App\Http\Controllers\Auth\loginController::class, 'userLogout'])->name('user.logout');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::post('/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('profile.update');
        Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
        Route::get('/dashboard', [App\Http\Controllers\Dashboardcantroller::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'banners'], function () {
            Route::get('index', 'App\Http\Controllers\BannerController@index')->name('data.index');
            Route::get('/add', [App\Http\Controllers\BannerController::class, 'add'])->name('Banners.add');
            Route::post('/store', [App\Http\Controllers\BannerController::class, 'store'])->name('Banners.store');
            Route::get('/Banners/edit/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->name('Banners.edit');
            Route::post('/update/{id}', [App\Http\Controllers\BannerController::class, 'update'])->name('Banners.update');
        });
        Route::get('/Banners/Delete/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('Banners.Delete');
    });
    Route::group(['prefix' => 'Category'], function () {
        Route::get('/index', 'App\Http\Controllers\CategoryController@index')->name('Category.index');
        Route::get('/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('Category.add');
        Route::post('/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('Category.store');
        Route::get('/Category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('Category.edit');
        Route::post('/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('Category.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\CategoryController::class, 'Delete'])->name('Category.Delete');
    });
    Route::group(['prefix' => 'Subcategory'], function () {
        Route::get('/index', 'App\Http\Controllers\SubcategoryController@index')->name('Subcategory.index');
        Route::get('/add', [App\Http\Controllers\SubcategoryController::class, 'add'])->name('Subcategory.add');
        Route::post('/store', [App\Http\Controllers\SubcategoryController::class, 'store'])->name('Subcategory.store');
        Route::get('/edit/{id}', [App\Http\Controllers\SubcategoryController::class, 'edit'])->name('Subcategory.edit');
        Route::post('/update/{id}', [App\Http\Controllers\SubcategoryController::class, 'update'])->name('Subcategory.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\SubcategoryController::class, 'Delete'])->name('Subcategory.Delete');
    });
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/index', 'App\Http\Controllers\BrandController@index')->name('Brand.index');
        Route::get('/add', [App\Http\Controllers\BrandController::class, 'add'])->name('Brand.add');
        Route::post('/store', [App\Http\Controllers\BrandController::class, 'store'])->name('Brand.store');
        Route::get('/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit'])->name('Brand.edit');
        Route::post('/update/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('Brand.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\BrandController::class, 'Delete'])->name('Brand.Delete');
    });
    Route::group(['prefix' => 'Color'], function () {
        Route::get('/index', 'App\Http\Controllers\ColorController@index')->name('Color.index');
        Route::get('/add', [App\Http\Controllers\ColorController::class, 'add'])->name('Color.add');
        Route::post('/store', [App\Http\Controllers\ColorController::class, 'store'])->name('Color.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ColorController::class, 'edit'])->name('Color.edit');
        Route::post('/update/{id}', [App\Http\Controllers\ColorController::class, 'update'])->name('Color.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\ColorController::class, 'Delete'])->name('Color.Delete');
    });
    Route::group(['prefix' => 'Size'], function () {
        Route::get('/index', 'App\Http\Controllers\SizeController@index')->name('Size.index');
        Route::get('/add', [App\Http\Controllers\SizeController::class, 'add'])->name('Size.add');
        Route::post('/store', [App\Http\Controllers\SizeController::class, 'store'])->name('Size.store');
        Route::get('/edit/{id}', [App\Http\Controllers\SizeController::class, 'edit'])->name('Size.edit');
        Route::post('/update/{id}', [App\Http\Controllers\SizeController::class, 'update'])->name('Size.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\SizeController::class, 'Delete'])->name('Size.Delete');
    });
    Route::group(['prefix' => 'Country'], function () {
        Route::get('/index', 'App\Http\Controllers\CountryController@index')->name('Country.index');
        Route::get('/add', [App\Http\Controllers\CountryController::class, 'add'])->name('Country.add');
        Route::post('/store', [App\Http\Controllers\CountryController::class, 'store'])->name('Country.store');
        Route::get('/edit/{id}', [App\Http\Controllers\CountryController::class, 'edit'])->name('Country.edit');
        Route::post('/update/{id}', [App\Http\Controllers\CountryController::class, 'update'])->name('Country.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\CountryController::class, 'Delete'])->name('Country.Delete');
    });
    Route::group(['prefix' => 'State'], function () {
        Route::get('/index', 'App\Http\Controllers\StateController@index')->name('State.index');
        Route::get('/add', [App\Http\Controllers\StateController::class, 'add'])->name('State.add');
        Route::post('/store', [App\Http\Controllers\StateController::class, 'store'])->name('State.store');
        Route::get('/edit/{id}', [App\Http\Controllers\StateController::class, 'edit'])->name('State.edit');
        Route::post('/update/{id}', [App\Http\Controllers\StateController::class, 'update'])->name('State.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\StateController::class, 'Delete'])->name('State.Delete');
    });
    Route::group(['prefix' => 'cupan'], function () {
        Route::get('/index', 'App\Http\Controllers\CouponController@index')->name('cupan.index');
        Route::get('/add', [App\Http\Controllers\CouponController::class, 'add'])->name('cupan.add');
        Route::post('/store', [App\Http\Controllers\CouponController::class, 'store'])->name('cupans.store');
        Route::get('/edit/{id}', [App\Http\Controllers\CouponController::class, 'edit'])->name('cupan.edit');
        Route::post('/update/{id}', [App\Http\Controllers\CouponController::class, 'update'])->name('cupan.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\CouponController::class, 'Delete'])->name('cupan.Delete');
    });
    Route::group(['prefix' => 'City'], function () {
        Route::get('/index', 'App\Http\Controllers\CityController@index')->name('City.index');
        Route::get('/add', [App\Http\Controllers\CityController::class, 'add'])->name('City.add');
        Route::post('/store', [App\Http\Controllers\CityController::class, 'store'])->name('City.store');
        Route::get('/edit/{id}', [App\Http\Controllers\CityController::class, 'edit'])->name('City.edit');
        Route::post('/update/{id}', [App\Http\Controllers\CityController::class, 'update'])->name('City.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\CityController::class, 'Delete'])->name('City.Delete');
    });
    Route::group(['prefix' => 'Setting'], function () {
        Route::get('/index', 'App\Http\Controllers\SettingController@index')->name('Setting.index');
        Route::get('/edit/{id}', [App\Http\Controllers\SettingController::class, 'edit'])->name('Setting.edit');
        Route::post('/update/{id}', [App\Http\Controllers\SettingController::class, 'update'])->name('Setting.update');
    });
    Route::group(['prefix' => 'Page'], function () {
        Route::get('/index', 'App\Http\Controllers\PageController@index')->name('Page.index');
        Route::get('/add', [App\Http\Controllers\PageController::class, 'add'])->name('Page.add');
        Route::post('/store', [App\Http\Controllers\PageController::class, 'store'])->name('Page.store');
        Route::get('/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('Page.edit');
        Route::post('/update/{id}', [App\Http\Controllers\PageController::class, 'update'])->name('Page.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\PageController::class, 'Delete'])->name('Page.Delete');
    });
    Route::group(['prefix' => 'Products'], function () {
        Route::post('/ajax/subcategory', [App\Http\Controllers\ProducatsController::class, 'subcategory'])->name('ajax.subcategory');
        Route::get('/index', [App\Http\Controllers\ProducatsController::class, 'index'])->name('Products.index');
        Route::get('/add', [App\Http\Controllers\ProducatsController::class, 'add'])->name('Products.add');
        Route::post('/store', [App\Http\Controllers\ProducatsController::class, 'store'])->name('Products.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ProducatsController::class, 'edit'])->name('Products.edit');
        Route::post('/update/{id}', [App\Http\Controllers\ProducatsController::class, 'update'])->name('Products.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\ProducatsController::class, 'Delete'])->name('Products.Delete');
        Route::get('/gallerydelete', [App\Http\Controllers\ProducatsController::class, 'gallerydelete'])->name('delete.gallery');
        Route::get('/reovedelete', [App\Http\Controllers\ProducatsController::class, 'reovedelete'])->name('delete.reove');
        Route::get('/submitbtn', [App\Http\Controllers\ProducatsController::class, 'submitbtn'])->name('gallery.submit');
        Route::get('/color/{id}', [App\Http\Controllers\ProducatsController::class, 'color'])->name('product.color');
        Route::post('/gallerycolor/{id}', [App\Http\Controllers\ProducatsController::class, 'coloruptate'])->name('product.gallerycolor');
    });
    Route::group(['prefix' => 'bannerposition'], function () {
        Route::get('/index', 'App\Http\Controllers\BannerpositionController@index')->name('Bannerposition.index');
        Route::get('/add', [App\Http\Controllers\BannerpositionController::class, 'add'])->name('Bannerposition.add');
        Route::post('/store', [App\Http\Controllers\BannerpositionController::class, 'store'])->name('Bannerposition.store');
        Route::get('/edit/{id}', [App\Http\Controllers\BannerpositionController::class, 'edit'])->name('Bannerposition.edit');
        Route::post('/update/{id}', [App\Http\Controllers\BannerpositionController::class, 'update'])->name('Bannerposition.update');
        Route::get('/Delete/{id}', [App\Http\Controllers\BannerpositionController::class, 'Delete'])->name('Bannerposition.Delete');
    });
});

Route::group(['prefix' => 'frontend'], function () {
    Route::middleware('blockips')->group(function () {
        Route::get('/index', [App\Http\Controllers\frontend\IndexController::class, 'index'])->name('frontend.index');
        Route::get('/shop-grid-left/{id}', [App\Http\Controllers\frontend\IndexController::class, 'shop'])->name('frontend.shop-grid-left');
        Route::get('/single/{id}', [App\Http\Controllers\frontend\IndexController::class, 'single'])->name('frontend.single');
        Route::get('/color/sizedata', [App\Http\Controllers\frontend\IndexController::class, 'getSizeData'])->name('color.sizedata');
        Route::post('/colour', [App\Http\Controllers\frontend\IndexController::class, 'addToCart'])->name('ajax.sizeimg');
        Route::get('/category/{id}', [App\Http\Controllers\frontend\IndexController::class, 'category'])->name('category.open');
        Route::get('/cart', [App\Http\Controllers\frontend\IndexController::class, 'ajaxcart'])->name('cartlodin');
        Route::get('/login/', [App\Http\Controllers\frontend\IndexController::class, 'login'])->name('frontend.login');
        Route::get('/register', [App\Http\Controllers\frontend\IndexController::class, 'register'])->name('frontend.register');
        Route::post('/loginpage', 'App\Http\Controllers\frontend\IndexController@loginpage')->name('loginpage');
        Route::get('/cart', [App\Http\Controllers\frontend\IndexController::class, 'cartlist'])->name('ajax.cart');
        Route::get('/addtocart', 'App\Http\Controllers\frontend\IndexController@addtocart')->name('ajax.addtocart');
        Route::get('/cartList', 'App\Http\Controllers\frontend\IndexController@cartList')->name('frontend.cart');
        Route::post('/cartupdate', 'App\Http\Controllers\frontend\IndexController@cartupdate')->name('cart.update');
        Route::post('/applyCoupon', [App\Http\Controllers\frontend\IndexController::class, 'coupan'])->name('apply.coupon');
        Route::get('/cartlist', [App\Http\Controllers\frontend\IndexController::class, 'cartlist'])->name('chekout');
        Route::get('/chekout', [App\Http\Controllers\frontend\IndexController::class, 'chekout'])->name('frontend.chekout');
        Route::get('/addchek', [App\Http\Controllers\frontend\IndexController::class, 'addchek'])->name('addcart');
        Route::get('/removeImage', [App\Http\Controllers\frontend\IndexController::class, 'removeImage'])->name('delete.removed');
        Route::get('/about', [App\Http\Controllers\frontend\IndexController::class, 'about'])->name('frontend.about');
        Route::get('/contact', [App\Http\Controllers\frontend\IndexController::class, 'contact'])->name('frontend.contact');
        Route::get('/faq', [App\Http\Controllers\frontend\IndexController::class, 'faq'])->name('frontend.faq');
        Route::get('/wishlist', [App\Http\Controllers\frontend\IndexController::class, 'wishlist'])->name('frontend.wishlist');
    });
});
<?php

use App\Http\Controllers\user\DashboardUserController as UserDashboardController;
use App\Http\Controllers\user\UserProdukController as ProdukUserController;
use App\Http\Controllers\user\CheckoutController as CheckoutUserController;

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UsersController;
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
    return redirect()->route('userDashboard');
});

Route::get('/dashboard', [UserDashboardController::class, 'main'])->name('userDashboard');
Route::get('/myprofile', [AlamatController::class, 'akun'])->name('myAccount');
Route::get('/tambahAlamat', [AlamatController::class, 'main'])->name('tambahAlamat');
Route::post('/getKabupaten', [AlamatController::class, 'getKabupaten'])->name('GetKabupaten');
Route::post('/store', [AlamatController::class, 'store'])->name('simpanAlamat');
Route::get('/editAlamat/{id}', [AlamatController::class, 'edit'])->name('alamatEdit');
Route::post('/updateAlamat/{id}', [AlamatController::class, 'update'])->name('alamatUpdate');
Route::get('/product', [ProdukUserController::class, 'main'])->name('userProduk');
Route::get('/produks/{id}', [ProdukUserController::class, 'index'])->name('ProductUser');
Route::post('/addToCart/{id}', [ProdukUserController::class, 'addToCart'])->name('addCart');
Route::post('/removeToCart', [ProdukUserController::class, 'removeToCart'])->name('removeCart');
Route::post('/checkout', [CheckoutUserController::class, 'index'])->name('userCheckout');
Route::post('/checkoutProses', [CheckoutUserController::class, 'proses'])->name('userCheckoutProses');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/create', [AuthController::class, 'create'])->name('createRegis');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::group(['middleware' => ['checkLoginUser:Admin']], function() {
        Route::group(['middleware'=> ['checkLogin']], function() {
            Route::get('/dashboard', [DashboardController::class, 'main'])->name('dashboard');

            Route::group(['prefix' => 'users'], function() {
                Route::get('/', [UsersController::class, 'index'])->name('users');
                Route::get('/delete/{id}', [UsersController::class, 'destroy'])->name('usersDelete');
            });

            Route::group(['prefix' => 'data_produk'], function() {
                Route::group(['prefix' => 'kategori_produk'], function() {
                    Route::get('/', [KategoriProdukController::class, 'index'])->name('kategoriProduk');
                    Route::get('/create', [KategoriProdukController::class, 'create'])->name('kategoriProdukCreate');
                    Route::post('/store', [KategoriProdukController::class, 'store'])->name('kategoriProdukStore');
                    Route::get('/delete/{id}', [KategoriProdukController::class, 'destroy'])->name('kategoriProdukDelete');
                });

                Route::group(['prefix' => 'produk'], function() {
                    Route::get('/', [ProdukController::class, 'index'])->name('Produk');
                    Route::get('/create', [ProdukController::class, 'create'])->name('ProdukCreate');
                    Route::post('/store', [ProdukController::class, 'store'])->name('ProdukStore');
                    Route::get('/show/{id}', [ProdukController::class, 'show'])->name('ProdukShow');
                    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('ProdukEdit');
                    Route::post('/update/{id}', [ProdukController::class, 'update'])->name('ProdukUpdate');
                    Route::get('/delete/{id}', [ProdukController::class, 'destroy'])->name('ProdukDelete');
                });

            });
        });
    });
});


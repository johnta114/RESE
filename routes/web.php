<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DitailController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminUserDitailController;
use App\Http\Controllers\AdminShopController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerShopController;
use App\Http\Controllers\OwnerShopReservationController;
use App\Http\Controllers\OwnerShopRegisterController;
use App\Http\Controllers\OwnerShopDitailController;
use App\Http\Controllers\UserMailController;



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
// HomeController
Route::get('/', [HomeController::class ,'home'] );
Route::get('/search', [HomeController::class ,'search'] );
Route::post('/like', [HomeController::class ,'like'] )->middleware(['auth','verified']);
Route::post('/unlike', [HomeController::class ,'unlike'] )->middleware(['auth','verified']);

// ThanksController
Route::get('/thanks', [thanksController::class ,'thanks'] )->middleware(['verified'])->name('thanks');

// DitailController
Route::get('/ditail/{shop_id}', [DitailController::class ,'ditail'] );

// DoneController
Route::post('/done', [DoneController::class ,'done'] )->middleware(['auth','verified']);

// MypageController
Route::post('/mypage',[MypageController::class,'mypage'])->middleware(['auth','verified']);
Route::post('/mypage/unlike', [MypageController::class ,'unlike'])->middleware(['auth','verified']);
Route::post('/delete', [MypageController::class ,'reservationDelete'] )->middleware(['auth','verified']);

// ReservationController
Route::post('/reservation', [ReservationController::class ,'reservation'] );
Route::post('/reservation/update', [ReservationController::class ,'update'] );

// AdminController
Route::post('/admin', [AdminController::class ,'admin'] )->middleware(['can:isAdmin']);
// AdminUserController
Route::post('/admin/users', [AdminUserController::class ,'users'] )->middleware(['can:isAdmin']);
Route::post('/admin/users/search', [AdminUserController::class ,'search'] )->middleware(['can:isAdmin']);
// AdminUserDitailController
Route::post('/admin/user/ditail', [AdminUserDitailController::class ,'ditail'] )->middleware(['auth','can:isAdmin']);
Route::post('/admin/user/update', [AdminUserDitailController::class ,'update'] )->middleware(['auth','can:isAdmin']);
Route::post('/admin/user/delete', [AdminUserDitailController::class ,'delete'] )->middleware(['auth','can:isAdmin']);
// AdminShopController
Route::post('/admin/shops', [AdminShopController::class ,'shops'] )->middleware(['auth','can:isAdmin']);
Route::post('/admin/shops/search', [AdminShopController::class ,'search'] )->middleware(['auth','can:isAdmin']);

// OwnerController
Route::post('/owner', [OwnerController::class ,'owner'] )->middleware(['auth','can:isOwner']);
// OwnerShopController
Route::post('/owner/shops', [OwnerShopController::class ,'shops'] )->middleware(['auth','can:isOwner']);
Route::post('/owner/shops/search', [OwnerShopController::class ,'search'] )->middleware(['auth','can:isOwner']);
// OwnerShopReservationController
Route::post('/owner/shop/reservation', [OwnerShopReservationController::class ,'reservation'] )->middleware(['auth','can:isOwner']);
Route::post('/owner/shop/visit', [OwnerShopReservationController::class ,'visit'] )->middleware(['auth','can:isOwner']);
// OwnerShopRegisterController
Route::post('/owner/shop/register', [OwnerShopRegisterController::class ,'create'] )->middleware(['auth','can:isOwner']);
Route::post('/owner/shop/store', [OwnerShopRegisterController::class ,'store'] )->middleware(['auth','can:isOwner']);
// OwnerShopDitailController
Route::post('/owner/shop/ditail', [OwnerShopDitailController::class ,'ditail'] )->middleware(['auth','can:isOwner']);
Route::post('/owner/shop/update', [OwnerShopDitailController::class ,'update'] )->middleware(['auth','can:isOwner']);
Route::post('/owner/shop/delete', [OwnerShopDitailController::class ,'delete'] )->middleware(['auth','can:isOwner']);
// UserMailController
Route::post('/mail', [UserMailController::class ,'mail'] )->middleware(['auth','can:isAdmin']);
Route::post('/mail/send', [UserMailController::class ,'send'] )->middleware(['auth','can:isAdmin']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['isOwner'])->name('dashboard');


require __DIR__.'/auth.php';

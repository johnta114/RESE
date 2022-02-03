<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DitailController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ReservationController;

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
Route::post('/like', [HomeController::class ,'like'] );
Route::post('/unlike', [HomeController::class ,'unlike'] );

// ThanksController
Route::get('/thanks', [thanksController::class ,'thanks'] )->middleware(['verified'])->name('thanks');

// DitailController
Route::get('/ditail', [DitailController::class ,'ditail'] );

// DoneController
Route::post('/done', [DoneController::class ,'done'] )->middleware(['auth']);

// MypageController
Route::post('/mypage',[MypageController::class,'mypage'])->middleware(['auth']);
Route::post('/mypage/unlike', [MypageController::class ,'unlike']);
Route::post('/delete', [MypageController::class ,'reservationDelete'] );

// ReservationController
Route::post('/reservation', [ReservationController::class ,'reservation'] );
Route::post('/reservation/update', [ReservationController::class ,'update'] );


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::controller(MainController::class)->middleware('auth')->group(function(){
    Route::get('/', 'home');
    Route::get('/system', 'system');
    Route::post('/system/save', 'system_save');
});

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegister');
    Route::get('/logout', 'logout');
});

Route::controller(UserController::class)->prefix('user')->middleware('auth')->group(function(){
    Route::get('/all', 'all');
    Route::get('/new', 'new');
    Route::post('/new', 'newUser');
    Route::post('/change-password', 'change_password');
    Route::post('/update', 'update');
    Route::post('/remove', 'remove');
}); 


Route::controller(CustomerController::class)->prefix('/customer')->middleware('auth')->group(function(){
    Route::get('/new' , 'new');
    Route::get('/all' , 'all');
    Route::get('/detail/{id}', 'detail');
    Route::post('/save', 'save');
    Route::post('/update', 'update');
});

Route::controller(AdvertController::class)->prefix('advert')->middleware('auth')->group(function(){
    Route::get('/new', 'new');
    Route::get('/all', 'all');
    Route::get('/detail/{id}', 'detail');
    Route::get('/edit/{id}', 'edit');
    Route::get('/sold', 'sold');
    Route::get('/on-sale', 'on_sale');
    Route::post('/save', 'save');
    Route::post('/update', 'update');
    Route::post('/change-status', 'change_status');
    Route::post('/add-note', 'add_note');
    Route::post('/sell', 'sell');
    Route::post('/add-expense', 'add_expense');
    Route::post('/delete', 'delete');
    Route::post('/delete/photo', 'delete_photo');
});

Route::controller(ReportController::class)->prefix('report')->middleware('auth')->group(function(){
    Route::get('/revenue', 'revenue');
    Route::get('/expense', 'expense');
    Route::post('/get-user-report', 'get_user_report');
    Route::post('/get-user-expense-report', 'get_user_expense_report');
    Route::post('/get-car-expense-report', 'get_car_expense_report');
});

Route::controller(DocController::class)->prefix('docs')->middleware('auth')->group(function(){
    Route::get('how-to-use', 'htu');
    Route::get('support', 'support');
});

Route::controller(UploadController::class)->prefix('upload')->middleware('auth')->group(function(){
    Route::post('/profile', 'profile');
    Route::post('/photos', 'photos');
    Route::post('/get-photos', 'get_photos');
});
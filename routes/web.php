<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/',[FrontendController::class,'index']);

Route::get('registrasi',[FrontendController::class,'registrasi']);
Route::post('post-registrasi',[FrontendController::class,'post_registrasi']);

Route::get('login',[FrontendController::class,'login'])->name('login');
Route::post('post-login',[FrontendController::class,'post_login']);

Route::post('logout',[FrontendController::class,'post_logout']);
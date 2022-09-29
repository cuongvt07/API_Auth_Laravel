<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ()
 {
    Route::get('/register',[RegisterController::class,'register'])->name('register');
    Route::post('/registerAPI',[RegisterController::class,'registerAPI'])->name('registerAPI');
    
    Route::get('/login',[RegisterController::class,'login'])->name('login');
    Route::post('/loginAPI',[RegisterController::class,'loginAPI'])->name('loginAPI');
});
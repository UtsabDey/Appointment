<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Models\Appointment;

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

Route::group(['middleware' => ['session']], function () {

});
// Doctor Controller
Route::get('/', [UserController::class,'index']);
Route::get('/doctor', [UserController::class,'show']);
Route::post('doctor/update', [UserController::class, 'update']);
Route::post('doctor/add/submit', [UserController::class, 'create']);
Route::get('doctor/delete/{id}', [UserController::class, 'destroy']);

// Appointment Controller
Route::get('/appointment', [HomeController::class,'appointment']);
Route::post('/appointment/add', [HomeController::class,'store']);
Route::post('/getdoctor', [HomeController::class,'getdoctor']);
Route::get('appointment/delete/{id}', [HomeController::class, 'destroy']);

// Clear Memory 
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return '<h1>Cache, Config, View cleared & optimized!</h1>';
});
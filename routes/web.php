<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/state', [App\Http\Controllers\MTStateController::class, 'stateGetAPI'])->name('stateapi');

Route::get('/city/{id}', [App\Http\Controllers\MTCityController::class, 'cityGetAPI'])->name('cityapi');

Route::get('/district/{id}', [App\Http\Controllers\MTDistrictController::class, 'districtGetAPI'])->name('districtapi');

Route::get('/sub-district/{id}', [App\Http\Controllers\MTSubDistrictController::class, 'subDistrictGetAPI'])->name('subdistrictapi');

// Config Attendance
Route::get('/config/att', [App\Http\Controllers\ConfigAttendanceController::class, 'index'])->name('configatt');
Route::post('/config-att-store', [App\Http\Controllers\ConfigAttendanceController::class, 'insertConfigAttendance'])->name('store.configatt');

Route::get('/config/web', [App\Http\Controllers\ConfigWebsiteController::class, 'index'])->name('configweb');
Route::post('/config/input-config-web', [App\Http\Controllers\ConfigWebsiteController::class, 'inputconfigweb'])->name('storeconfigweb');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

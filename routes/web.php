<?php

use App\Http\Controllers\EmailValidatorController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SubscriptionController;
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

Route::middleware('auth')->group(function(){
    Route::resource('subscription', SubscriptionController::class);
    Route::resource('packages', PackageController::class);
    Route::post('import-file', [EmailValidatorController::class, 'import'])->name('import.file');
    Route::get('download-report/{q}', [EmailValidatorController::class, 'download'])->name('download-report');
    Route::resource('email-validator', EmailValidatorController::class);

});


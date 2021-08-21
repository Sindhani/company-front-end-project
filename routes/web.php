<?php

use App\Http\Controllers\EmailValidatorController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SubscriptionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
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

Route::middleware('auth')->group(function () {
    Route::resource('subscription', SubscriptionController::class);
    Route::resource('packages', PackageController::class);
    Route::post('import-file', [EmailValidatorController::class, 'import'])->name('import.file');
    Route::get('download-report/{q}', [EmailValidatorController::class, 'download'])->name('download-report');
    Route::resource('email-validator', EmailValidatorController::class);

});

Route::get('registration/admin', function () {
    return view('back_end.admin.register');
})->name('admin.register');

Route::post('login/admin', function (Request $request) {
    $request->merge(['server_mac' => exec('getmac')]);
    $response = Http::get(env('API_UR', '127.0.0.1:8082/validate-user'), $request->all());
//    dd($response->body());
    if ($response->status() == 200) {
        $user = User::where(['email' => $request->email, 'password' => $request->password])->first();

        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            }
        } else {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => 1,
                'name' => $request->name
            ]);
            If (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');

            }
        }
        return redirect()->route('home');
    }

})->name('admin.login');


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
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function (Request $request) {
    $request->visitor()->visit();

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('subscription', SubscriptionController::class);
    Route::resource('user-profile', \App\Http\Controllers\UserController::class);
    Route::resource('packages', PackageController::class);
    Route::post('import-file', [EmailValidatorController::class, 'import'])->name('import.file');
    Route::get('download-report/{q}', [EmailValidatorController::class, 'download'])->name('download-report');
    Route::resource('email-validator', EmailValidatorController::class);

});

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    dd($user);

    // $user->token
});

Route::get('registration/admin', function () {
    return view('back_end.admin.register');
})->name('admin.register');

Route::post('login/admin', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'password' => 'required',
        'purchase_code' => 'required',
        'invoice_number' => 'required'
    ]);


    $request->merge(['server_mac' => exec('getmac')]);
    $response = Http::get(env('API_UR', '127.0.0.1:8000/validate-user'), $request->all());

    if ($response->status() == 404) {
        return back()->with(['error' => 'Record Not found! Enter valid credentials']);
    }

    if ($response->status() == 200) {
        $user = User::where('email' , $request->email)->first();
        if (!$user) {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => 1,
                'name' => $request->name,
                'token' => $response->body()
            ]);
            If (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');

            }
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->with('error', 'Your password is incorrect! Enter a valid password');
        }




        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            }
        }

        return redirect()->route('home');
    }
    dd($response->body());

})->name('admin.login');


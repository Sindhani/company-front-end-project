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

Route::view('client-registration', 'back_end.admin.register')->name('admin.register')->middleware('check-client');
Route::post('client-login', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'password' => 'required',
        'purchase_code' => 'required',
        'invoice_number' => 'required'
    ]);
    $request->merge(['server_mac' => exec('getmac')]);
    $url = "https://email-validator.habdsk.org/email/public/validate-user";
//    $url = "192.168.88.69:8082/email-validator-project/public/api/validate-user";
    $response = sendRequest($request, $url);
    if($response['responseCode'] == 404){
        return back()->with(['error' => 'Record Not found! Enter valid credentials']);
    }

//    if ($response->status() == 404) {
//        return back()->with(['error' => 'Record Not found! Enter valid credentials']);
//    }
    if ($response['responseCode'] == 200) {
        $user = User::where('email' , $request->email)->first();
        if (!$user) {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => 1,
                'name' => $request->name,
                'token' => $response['response']['api_token'],
                'purchase_code' => $request->purchase_code,
                'invoice_number' => $request->invoice_number
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
//    if ($response->status() == 200) {
//        $user = User::where('email' , $request->email)->first();
//        if (!$user) {
//            User::create([
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//                'is_admin' => 1,
//                'name' => $request->name,
//                'token' => $response->body(),
//                'purchase_code' => $request->purchase_code,
//                'invoice_number' => $request->invoice_number
//            ]);
//            If (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//                return redirect()->route('home');
//
//            }
//        }
//
//        if(!Hash::check($request->password, $user->password)){
//            return back()->with('error', 'Your password is incorrect! Enter a valid password');
//        }
//
//
//
//
//        if ($user) {
//            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//                return redirect()->route('home');
//            }
//        }
//
//        return redirect()->route('home');
//    }


})->name('admin.login');
/**
 * @param Request $request
 * @param $url
 * @return mixed
 */
function sendRequest(Request $request, $url)
{

    $ch = curl_init();
    $data = http_build_query($request->all());
    $getUrl = $url . "?" . $data;

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);    // we want headers
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
    $response = curl_exec($ch);
    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ['response' => json_decode($response,true), 'responseCode' => $responseCode];

}


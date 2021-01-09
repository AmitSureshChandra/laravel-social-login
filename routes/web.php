<?php

use App\Models\User;
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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login/{_driver}', function ($driver) {
    return Socialite::driver($driver)->redirect();
});

Route::get('/login/{_driver}/callback', function ($driver) {
    $social_user = Socialite::driver($driver)->user();

    $user = User::firstOrCreate(
        [
            'provider_id' => $social_user->getId()
        ],
        [
            "email" => $social_user->getEmail(),
            "profile_photo" => $social_user->getAvatar(),
            "provider_id" => $social_user->getId(),
            "name" => $social_user->getName(),
        ]
    );

    auth()->login($user, true);

    return redirect('/dashboard');
});

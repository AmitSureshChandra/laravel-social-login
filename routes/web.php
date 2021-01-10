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

    $products = \App\Models\Product::all();

    return view('dashboard', compact('products'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/categories/add', 'CategoryController@create');
    Route::post('/categories/{category}/delete', 'CategoryController@destroy');
    Route::post('/categories', 'CategoryController@store');
    Route::post('/categories/{category}', 'CategoryController@update');
    Route::get('/categories/{category}/edit', 'CategoryController@edit');
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/products/add', 'ProductController@create');
    Route::post('/products/{product}/delete', 'ProductController@destroy');
    Route::post('/products', 'ProductController@store');
    Route::post('/products/{product}', 'ProductController@update');
    Route::get('/products/{product}/edit', 'ProductController@edit');
});


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

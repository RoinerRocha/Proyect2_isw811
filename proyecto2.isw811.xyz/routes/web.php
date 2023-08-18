<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\LinkedInController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/twitter', 'App\Http\Controllers\TwitterController@connect_Twitter')->name('media_twitter');
Route::get('/callback', 'App\Http\Controllers\TwitterController@twitter_cbk')->name('media_cbk');
Route::get('/LoginTwitter', 'App\Http\Controllers\TwitterController@index')->name('LoginTwitter');

Route::get('/PostTweet', 'App\Http\Controllers\TwitterController@PostTweet')->name('PostTweet');
Route::post('/Post', 'App\Http\Controllers\TwitterController@twitter_post')->name('media_twitter_post');


Route::get('/linkedin', 'App\Http\Controllers\LinkedInController@LoginLI')->name('LinkedInLoginView');
Route::get('/linkedin/login', 'App\Http\Controllers\LinkedInController@provider')->name('LinkedInLogin');
Route::get('/linkedin/callback', 'App\Http\Controllers\LinkedInController@ProviderCallback')->name('LinkedI_cbk');

Route::get('/post', 'App\Http\Controllers\LinkedInController@postview')->name('LinkedIn');
Route::post('/linkedin/post', 'App\Http\Controllers\LinkedInController@PostLinkedin')->name('LinkedInPost');

Route::middleware(['2fa'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');
});
  
Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');

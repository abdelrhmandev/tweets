<?php

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

#Tweets 
Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('tweets.index');
Route::get('/tweets/create', [App\Http\Controllers\TweetController::class, 'create'])->name('tweets.create');
Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store'])->name('tweets.store');
Route::delete('/delete/tweet/{id}', [App\Http\Controllers\TweetController::class, 'destroy'])->name('tweets.destroy');

#Follow and UnFollow 
Route::delete('/unfollow/user/{following_user_id}', [App\Http\Controllers\FollowController::class, 'destroy'])->name('follows.destroy');
Route::post('/follow/user/{following_user_id}', [App\Http\Controllers\FollowController::class, 'store'])->name('follows.store');

#List Users Route "To select user to follow
Route::get('/list/users/{id}', [App\Http\Controllers\TweetController::class, 'list_users'])->name('users.list');


#Profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');



Route::post('/profiles/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
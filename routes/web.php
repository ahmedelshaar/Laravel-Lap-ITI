<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function (){
    return view('welcome');
});

// index - show user - create - store - edit - update - delete
//Route::get('/users', [UserController::class, 'index'])->name('users.index');
//Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//Route::post('/users', [UserController::class, 'store'])->name('users.store');
//Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
//Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::resource('users', UserController::class);




//Route::group([ 'prefix' => 'user'], function (){
//    Route::get('{user}', function ($user){
//        return "Hello $user";
//    })
//        ->where('user', '[A-Za-z]+');
//
//        Route::get('{user}/post/{id}', function ($user, $id){
//            return $user . " id = $id";
//        })
//            ->name('posts')
//            ->where('user', '[A-Za-z]+');
//})->name();
//
//Route::get('/login', function (){
//
//})->name('login');
//Route::get('/there', function (){
//    return 'redirect';
//})->name('login');
//
//Route::redirect('/here', '/there');
//
//
//Route::get('/search/{search}', function ($search){
//    return $search;
//})->where('search', '.*');;

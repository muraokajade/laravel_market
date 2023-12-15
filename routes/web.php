<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
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


Route::get('/dashboard', function () {
    return redirect()->route('items.index');
});
Route::get('/', function () {
    return redirect()->route('login');
});



Route::resource('items', ItemController::class);
Route::get('items/{item}/confirm', [ItemController::class,'confirm'])->name('items.confirm');
Route::post('items/{item}/finish', [ItemController::class,'finish'])->name('items.finish');
Route::get('items/detail/{id}', [ItemController::class, 'detail'])->name('items.detail');
Route::get('items/{item}/edit_image', [ItemController::class, 'editImage'])->name('items.edit_image');
Route::patch('items/{item}/update_image', [ItemController::class, 'updateImage'])->name('items.update_image');

Route::get('likes', [LikeController::class, 'index'])->name('likes.index');
Route::patch('likes/{item}/toggle_like', [LikeController::class, 'toggleLike'])->name('likes.toggle_like');
Route::get('users/{user}/exhibitions', [UserController::class, 'usersExhibitions'])->name('users.exhibitions');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::get('profile/edit_image', [UserController::class, 'editImage'])->name('profile.edit_image');
Route::patch('profile/update/{user}', [UserController::class, 'update'])->name('profile.update');
Route::patch('profile/update_image/{user}', [UserController::class, 'updateImage'])->name('profile.update_image');

require __DIR__ . '/auth.php';

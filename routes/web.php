<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// //127.0.0.1:8000/item ==> barang/item
// Route::get('/item', function () {
//     return "<h1> Item </h1>";
// });

// //127.0.0.1:8000/item/1 ==> barang/item 1
// Route::get('/item/{id}', function ($id) {
//     return "<h1> Item $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/item/{id}/{nama}', function ($id, $nama) {
//     return "<h1> $nama Barang $id</h1>";
// })->where (['id'=>'0-9]+', 'nama'=>'[A-Za-z]+']);

// Route::get('item',[ItemController::class,'index']);
// Route::get('item/{id}',[ItemController::class,'detail'])->where('id','[0-9]+');

Route::resource('item',ItemController::class)->middleware('isLogin');

Route::get('/',[HalamanController::class,'index']);
Route::get('/contact',[HalamanController::class,'contact']);
Route::get('/about',[HalamanController::class,'about']);

Route::get('/sesi',[SessionController::class, 'index'])->middleware('isGuest');
Route::post('/sesi/login',[SessionController::class, 'login'])->middleware('isGuest');
Route::get('/sesi/logout',[SessionController::class, 'logout']);

Route::get('/sesi/register',[SessionController::class, 'register'])->middleware('isGuest');
Route::post('/sesi/create',[SessionController::class, 'create'])->middleware('isGuest');
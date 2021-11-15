<?php

use App\Http\Controllers\PostController;
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

Route::get('job', [PostController::class, 'job'])->name("job");
Route::get('event', [PostController::class, 'event'])->name("event");
Route::get('event/another', [PostController::class, 'eventAnother'])->name("event.another");
Route::get('notification', [PostController::class, 'notification'])->name("notification");

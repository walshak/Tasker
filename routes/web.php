<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return redirect()->route('home');
});

Auth::routes();

Route::resource('task', TaskController::class);

Route::get('/home', [TaskController::class, 'index'])->name('home');
Route::get('/task/{task}/complete',[TaskController::class,'mark_complete'])->name('task.complete');

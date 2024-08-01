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
    return redirect('/home');
});

Route::group([ 'middleware' => ['auth'] ], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/update/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
    Route::get('/tasks/edit/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
    Route::get('/tasks/show/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
    Route::delete('/tasks/destroy/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');

});



Auth::routes();


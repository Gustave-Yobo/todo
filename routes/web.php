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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('tasks/create', [TaskController::class, 'store'])->name('tasks.store');

    Route::get('tasks/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::delete('tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

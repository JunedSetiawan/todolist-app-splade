<?php

use App\Http\Controllers\TodoController;
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

Route::middleware(['splade'])->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('home');
    Route::get('create', [TodoController::class, 'create'])->name('list.create');
    Route::post('store', [TodoController::class, 'store'])->name('list.store');
    Route::get('edit/{id}', [TodoController::class, 'edit'])->name('list.edit');
    Route::put('update', [TodoController::class, 'update'])->name('list.update');
    Route::delete('delete', [TodoController::class, 'delete'])->name('list.delete');

    Route::post('search', [TodoController::class, 'search'])->name('list.search');
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});

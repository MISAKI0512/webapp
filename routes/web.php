<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthorController;


Route::get('/',[AuthorController::class,'index'])->middleware('auth');
Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::get('/auth',[AuthorController::class,'check']);
Route::post('/auth',[AuthorController::class,'checkUser']);

Route::post('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::post('/todo/delete', [TodoController::class, 'delete'])->name('todo.delete');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



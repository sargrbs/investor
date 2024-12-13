<?php
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

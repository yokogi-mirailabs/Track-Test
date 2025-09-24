<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('recipes')->name('recipes.')->group(function () {
    Route::get('/', [RecipeController::class, 'index'])->name('index');
    Route::get('/{id}', [RecipeController::class, 'show'])->name('show');
    Route::post('/', [RecipeController::class, 'store'])->name('store');
    Route::put('/{id}', [RecipeController::class, 'update'])->name('update');
    Route::delete('/{id}', [RecipeController::class, 'destroy'])->name('destroy');
});

Route::fallback(function () {
    return response()->json(['message' => 'Page Not Found'], 404);
});

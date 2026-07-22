<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas compartidas por Admin y Coordinador
    Route::middleware('role:admin,coordinador')->group(function () {
        Route::resource('categorias', CategoriaController::class)->except(['destroy']);
        Route::resource('subcategorias', SubcategoriaController::class)->except(['destroy']);
        Route::resource('productos', ProductoController::class)->except(['destroy']);
        Route::resource('usuarios', UserController::class)->except(['destroy']);
    });

    // Rutas exclusivas de eliminación para Admin
    Route::middleware('role:admin')->group(function () {
        Route::delete('categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
        Route::delete('subcategorias/{subcategoria}', [SubcategoriaController::class, 'destroy'])->name('subcategorias.destroy');
        Route::delete('productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
        Route::delete('usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    });
});

require __DIR__.'/auth.php';

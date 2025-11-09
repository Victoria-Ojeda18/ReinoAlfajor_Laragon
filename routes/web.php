<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\FabricaController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/pedidos', [AuthController::class, 'showPedidos'])->name('pedidos');
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::post('/carrito/add', [CarritoController::class, 'add'])->name('carrito.add');
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::delete('/carrito/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
    Route::put('/carrito/{id}', [CarritoController::class, 'update'])->name('carrito.update');
    Route::post('/pedidos/{id}/pagar', [PedidoController::class, 'pagar'])->name('pedidos.pagar');
});

Route::get('/fabrica', [FabricaController::class, 'index'])->name('fabrica');
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/pedidos', [AdminController::class, 'index'])->name('pedidos.index');
    Route::post('/pedidos/{id}/status', [AdminController::class, 'updateStatus'])->name('pedidos.status');
});

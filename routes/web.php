<?php

use App\Http\Controllers\AddOnController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortofolioUserController;
use App\Http\Controllers\ProdukUserController;

use Illuminate\Support\Facades\Route;

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
Route::get('/portofoliouser', [PortofolioUserController::class, 'index'])->name('portofoliouser');

Route::get('/produkuser', [ProdukUserController::class, 'index'])->name('produkuser');
Route::get('/produkuser/{produk}', [ProdukUserController::class, 'show'])->name('produkuser.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // CRUD Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/kategori/search', [KategoriController::class, 'search'])->name('kategori.search');
    // CRUD Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::patch('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');
    // CRUD AddOn
    Route::get('/addon', [AddOnController::class, 'index'])->name('addon.index');
    Route::post('/addon', [AddOnController::class, 'store'])->name('addon.store');
    Route::patch('/addon/{id}', [AddOnController::class, 'update'])->name('addon.update');
    Route::delete('/addon/{id}', [AddOnController::class, 'destroy'])->name('addon.destroy');
    Route::get('/addon/search', [AddOnController::class, 'search'])->name('addon.search');
    // CRUD Portofolio
    Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
    Route::post('/portofolio', [PortofolioController::class, 'store'])->name('portofolio.store');
    Route::put('/portofolio/{id}', [PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');
    Route::get('/portofolio/search', [PortofolioController::class, 'search'])->name('portofolio.search');
});

require __DIR__.'/auth.php';

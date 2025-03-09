<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\VisitanteController;



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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'check.access'])->group(function () {
    Route::get('/operadores/create', [OperadorController::class, 'create'])->name('operadores.create');
    Route::post('/operadores', [OperadorController::class, 'store'])->name('operadores.store');
});


Route::get('/visitantes/cadastrar', [VisitanteController::class, 'create'])->name('visitantes.create');
Route::post('/visitantes', [VisitanteController::class, 'store'])->name('visitantes.store');
Route::get('/visitantes', [VisitanteController::class, 'index'])->name('visitantes.index');
Route::resource('visitantes', VisitanteController::class);




require __DIR__.'/auth.php';

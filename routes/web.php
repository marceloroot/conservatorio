<?php

use App\Http\Controllers\InscricaoController;
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
    return view('welcome');
})->name('welcome');

Route::get('/dashboard',[InscricaoController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


Route::post('/store', [InscricaoController::class, 'store'])->middleware(['auth'])->name('store');
Route::get('/atualiza',[InscricaoController::class,'atualiza'])->middleware(['auth'])->name('atualiza');

Route::put('/put',[InscricaoController::class,'put'])->middleware(['auth'])->name('put');
Route::get('/guia', [InscricaoController::class, 'guia'])->middleware(['auth'])->name('guia');
Route::get('/pdf', [InscricaoController::class, 'pdf'])->middleware(['auth'])->name('pdf');

Route::get('/lista', [InscricaoController::class, 'lista'])->middleware(['auth'])->name('lista');



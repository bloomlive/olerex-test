<?php

use App\Http\Controllers\ShiftController;
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

Route::get('/', [ShiftController::class, 'index'])->name('table');
Route::get('/delete/{shift}', [ShiftController::class, 'delete'])->name('table.delete');
Route::get('/edit/{shift}', [ShiftController::class, 'show'])->name('table.edit');
Route::post('/edit/{shift}', [ShiftController::class, 'update'])->name('table.update');
Route::post('/', [ShiftController::class, 'create'])->name('table.post');

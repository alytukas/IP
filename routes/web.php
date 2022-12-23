<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [ExpensesController::class, 'index'])->name('countExpenses');

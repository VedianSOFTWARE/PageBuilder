<?php

use Illuminate\Support\Facades\Route;
use VedianSOFT\CMS\Controllers\PageController;
use VedianSOFT\CMS\Controllers\RowController;
use VedianSOFT\CMS\Controllers\ColumnController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('page', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('pages/create', [PageController::class, 'create']);
Route::get('add/row', [RowController::class, 'create']);
Route::get('add/column', [ColumnController::class, 'create']);

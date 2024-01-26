<?php

use Illuminate\Support\Facades\Route;
use VedianSOFT\CMS\Controllers\PageController;

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

Route::middleware('web')
    ->prefix('cms')
    ->group(function () {
        Route::get('/page/create', [PageController::class, 'create']);
    });

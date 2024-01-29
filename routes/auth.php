<?php

use Illuminate\Support\Facades\Route;
use VedianSoft\VedianCms\Controllers\PageController;
use VedianSoft\VedianCms\Controllers\RowController;
use VedianSoft\VedianCms\Controllers\ColumnController;
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

$authMiddleware = config('vedian.guard')
    ? config('vedian.guard')
    : 'auth';

$authSessionMiddleware = config('vedian.auth_session', false)
    ? config('vedian.auth_session')
    : null;

Route::group([
    'middleware' => array_values(array_filter(['web', $authMiddleware, $authSessionMiddleware])),
    'prefix' => config('vedian.prefix.cms_dashboard'),
], function () {
    Route::prefix('page')->group(function () {
        Route::get('create', [PageController::class, 'create']);
        Route::get('add/row', [RowController::class, 'create']);
        Route::get('add/column', [ColumnController::class, 'create']);
    });
});
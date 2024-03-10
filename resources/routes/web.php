<?php

use Vedian\PageBuilder\Controllers\PageController;
use Vedian\PageBuilder\Builders\RouteBuilder;

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


// Route::group([
//     'middleware' => array_values(array_filter(['web', $authMiddleware, $authSessionMiddleware])),
//     'prefix' => config('vedian.prefix'),
// ], function () {

//     Route::prefix('page')->group(function () {
//         Route::get('create', [PageController::class, 'create']);
//     });
// });
// RouteBuilder::group('dashboard', function () {
//     RouteBuilder::resource('page', PageController::class);
// });

RouteBuilder::dashboard(function () {
    RouteBuilder::resource('page', PageController::class);
});

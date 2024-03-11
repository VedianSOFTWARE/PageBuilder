<?php

use Vedian\PageBuilder\Controllers\PageController;
use Vedian\PageBuilder\Builders\RouteSupport;

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

RouteSupport::dashboard(function () {
    RouteSupport::resource('page', PageController::class);
});

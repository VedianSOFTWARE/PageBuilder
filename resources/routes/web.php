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

RouteBuilder::dashboard(function () {
    RouteBuilder::resource('page', PageController::class);
});

<?php

namespace Vedian\PageBuilder\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Vedian\PageBuilder\Builders\PageBuilder;

/**
 * Class ColumnController
 * @package Vedian\PageBuilder\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

<?php

namespace Vedian\PageBuilder\Contracts;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Interface BuilderContract
 * 
 * This interface provides methods to retrieve the models used by the Vedian CMS page builder.
 * 
 * @method static view(string $string)
 * @method add($model)
 * 
 * @package Vedian\PageBuilder\Contracts
 */
interface BuilderContract
{
    public static function view($view, $data = [], $mergeData = []): View|Factory;

    public function add(array $data = []);

    // public function make(array $data = []);

    public function save();
}
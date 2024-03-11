<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Vedian\PageBuilder\Contracts\BuilderContract;
use Vedian\PageBuilder\Contracts\ModelContract;
use Vedian\PageBuilder\Models\Row;

/**
 * 
 * @method static user()
 * @method static page()
 * @method static row()
 * @method static column()
 * @method static view(string $string)
 * 
 * @package Vedian\PageBuilder\Builders
 */
abstract class Builder extends Controller implements BuilderContract
{

    /**
     * Create a new builder instance.
     *
     * @param ModelContract $model The model to use.
     * @param BuilderContract|null $builder The builder to use.
     * @param array $data The data to use.
     * @param array $items The items to use.
     */
    public function __construct(
        protected ModelContract $model,
        protected BuilderContract|null $builder = null,
        public array $data = []
    ) {
    }
}

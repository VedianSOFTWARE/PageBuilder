<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Routing\Controller;
use Vedian\PageBuilder\Contracts\BuilderContract;
use Vedian\PageBuilder\Contracts\ModelContract;

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
        protected BuilderContract|null $builder = null
    ) {
    }
}

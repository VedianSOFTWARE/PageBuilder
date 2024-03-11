<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Routing\Controller;
use Vedian\PageBuilder\Contracts\IBuilder;
use Vedian\PageBuilder\Contracts\IModel;

abstract class Builder
{
    /**
     * Create a new builder instance.
     *
     * @param IModel $model The model to use.
     * @param IBuilder|null $builder The builder to use.
     * @param array $data The data to use.
     * @param array $items The items to use.
     */
    public function __construct(
        protected IModel $model,
        protected IBuilder|null $builder = null
    ) {
    }
}

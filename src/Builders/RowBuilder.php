<?php

namespace Vedian\PageBuilder\Builders;

use Vedian\PageBuilder\Contracts\Builders\IRowBuilder;
use Vedian\PageBuilder\Contracts\IBuilder;
use Vedian\PageBuilder\Contracts\IModel;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 * 
 * @package Vedian\PageBuilder\Builders
 */
class RowBuilder extends Builder implements IRowBuilder
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
        parent::__construct($model, $builder);
    }
}

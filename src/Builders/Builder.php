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

    public $entities;
    public $page;

    /**
     * Create a new builder instance.
     *
     * @param ModelContract $model The model to use.
     * @param BuilderContract|null $builder The builder to use.
     * @param array $data The data to use.
     * @param array $items The items to use.
     */
    public function __construct(
        public ModelContract $modelContract,
        public BuilderContract|null $builder = null,
        public array $data = []
    ) {
    }

    public function add($data = [])
    {
        $this->entities[] = $this->create($data);

        return $this;
    }

    public function model()
    {
        return $this->page;
    }

    public function row($data = [])
    {
        $this->rows[] = $this->model()->rows()->save(new Row($data));

        return $this;
    }

    public function create($data)
    {
        return $this->modelContract->create(
            $data
        );
    }

    // /**
    //  * The fully qualified class name of the user model.
    //  *
    //  * @var string
    //  */
    // public static $userModel = 'App\\Models\\User';

    // /**
    //  * The fully qualified class name of the page model.
    //  *
    //  * @var string
    //  */
    // public static $pageModel = 'Vedian\\PageBuilder\\Models\\Page';

    // /**
    //  * The fully qualified class name of the row model.
    //  *
    //  * @var string
    //  */
    // public static $rowModel = 'Vedian\\PageBuilder\\Models\\Row';

    // /**
    //  * The fully qualified class name of the column model.
    //  *
    //  * @var string
    //  */
    // public static $columnModel = 'Vedian\\PageBuilder\\Models\\Column';

    // /**
    //  * Get the user model.
    //  *
    //  * @return string The fully qualified class name of the user model.
    //  */
    // public static function user()
    // {
    //     return static::$userModel;
    // }

    // /**
    //  * Get the page model.
    //  *
    //  * @return string The fully qualified class name of the page model.
    //  */
    // public static function page()
    // {
    //     return static::$pageModel;
    // }

    // /**
    //  * Get the row model.
    //  *
    //  * @return string The fully qualified class name of the row model.
    //  */
    // public static function row()
    // {
    //     return static::$rowModel;
    // }

    // /**
    //  * Get the column model.
    //  *
    //  * @return string The fully qualified class name of the column model.
    //  */
    // public static function column()
    // {
    //     return static::$columnModel;
    // }

    /**
     * Get the view for the page builder.
     *
     * @param string $view The view to retrieve.
     * @return string The view for the page builder.
     */
    public static function view($view, $data = [], $mergeData = []): View|Factory
    {
        return view("pagebuilder::{$view}", $data, $mergeData);
    }
}

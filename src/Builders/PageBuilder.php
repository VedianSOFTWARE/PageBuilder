<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Contracts\PageContract;
use VedianSOFT\CMS\Enumerations\Status;
use VedianSOFT\CMS\Enumerations\Visibility;

/**
 * Class PageBuilder
 * 
 * This class represents a builder for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the BuilderContract interface.
 */
class PageBuilder extends Builder
{
    /**
     * Create a new PageBuilder instance.
     *
     * @param PageContract $model The page model instance.
     */
    public function __construct(
        PageContract $model
    ) {
        $this($model);
    }

    // Site meta
    /**
     * The title of the page.
     *
     * @var string
     */
    protected string $title;

    /**
     * The slug of the page.
     *
     * @var string
     */
    protected string $slug;

    // Short description
    /**
     * The excerpt of the page.
     *
     * @var string
     */
    protected string $excerpt;

    // Page status
    /**
     * The visibility of the page.
     *
     * @var Visibility
     */
    protected Visibility $visibility;

    /**
     * The status of the page.
     *
     * @var Status
     */
    protected Status $status;

    // Visibility period
    /**
     * The start date and time when the page is visible.
     *
     * @var \DateTime|null
     */
    protected ?\DateTime $visible_from;

    /**
     * The end date and time when the page is visible.
     *
     * @var \DateTime|null
     */
    protected ?\DateTime $visible_till;
}

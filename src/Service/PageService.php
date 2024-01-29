<?php

namespace VedianSoft\VedianCms\Service;

use VedianSoft\VedianCms\Contracts\PageContract;
use VedianSoft\VedianCms\Enumerations\Status;
use VedianSoft\VedianCms\Enumerations\Visibility;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class PageService extends CmsService
{
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

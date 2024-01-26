<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Enumerations\Status;
use VedianSOFT\CMS\Enumerations\Visibility;

class PageBuilder extends Builder
{
    // Site meta
    protected string $title;
    protected string $slug;

    // Short description
    protected string $excerpt;

    // Page status
    protected Visibility $visibility;
    protected Status $status;

    // Visibility period
    protected ?\DateTime $visible_from;
    protected ?\DateTime $visible_till;

}

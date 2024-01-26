<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Contracts\BuilderContract;
use VedianSOFT\CMS\Contracts\ModelContract;
use VedianSOFT\CMS\Contracts\PageContract;
use VedianSOFT\CMS\Contracts\RowContract;
use VedianSOFT\CMS\Enumerations\Status;
use VedianSOFT\CMS\Enumerations\Visibility;

class RowBuilder extends Builder
{

    public function __construct(
        RowContract $model
    ) {
        $this($model);
    }

    
}

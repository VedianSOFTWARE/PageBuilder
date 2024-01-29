<?php

namespace VedianSoft\VedianCms\Builders;

use VedianSoft\VedianCms\Contracts\RowContract;

class RowBuilder extends Builder
{
    public function __construct(RowContract $model)
    { 
        $this($model); 
    }
}

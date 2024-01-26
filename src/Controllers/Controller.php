<?php

namespace VedianSOFT\CMS\Controllers; 

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use VedianSOFT\CMS\Builders\Builder;
use VedianSOFT\CMS\Builders\PageBuilder;
use VedianSOFT\CMS\Contracts\BuilderContract;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

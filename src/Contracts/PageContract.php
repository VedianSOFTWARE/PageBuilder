<?php

namespace VedianSOFT\CMS\Contracts;

use VedianSOFT\CMS\Collections\EntryCollection;

interface PageContract
{
    public function setPanel(int $panel): PageContract;
}
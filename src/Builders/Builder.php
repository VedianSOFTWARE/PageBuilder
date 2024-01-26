<?php

namespace VedianSOFT\CMS\Builders;

use Illuminate\Support\Collection;
use VedianSOFT\CMS\Contracts\BuilderContract;

class Builder implements BuilderContract
{
    public Collection $body;

    public function getBody(): Collection
    {
        return $this->body;
    }
}

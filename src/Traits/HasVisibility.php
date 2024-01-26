<?php

namespace VedianSOFT\CMS\Traits;

use VedianSOFT\CMS\Enumerations\Visibility;

trait HasVisibility
{
    protected $visibility;

    public function setVisibility(Visibility $visibility)
    {
        $this->visibility = $visibility->value;
    }

    public function getVisibility(): Visibility
    {
        return Visibility::tryFrom($this->visibility);
    }

    public function isPublic(): bool
    {
        return $this->visibility === Visibility::PUBLIC;
    }

    public function isPrivate(): bool
    {
        return $this->visibility === Visibility::PRIVATE;
    }
}

<?php

namespace VedianSOFT\CMS\Traits;

trait HasAuthor
{
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($row) {
            $row->created_by = auth()->id();
        });

        self::created(function ($row) {
            $row->published_at = now();
            $row->save();
        });
    }
}

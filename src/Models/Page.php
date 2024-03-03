<?php

namespace Vedian\Cms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vedian\Cms\Enum\Status;
use Vedian\Cms\Enum\Visibility;
use Vedian\Cms\Traits\HasCreator;

class Page extends Model
{
    use HasFactory, HasCreator;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'visibility',
        'activates',
        'expires'
    ];

    protected $casts = [
        'status' => Status::class,
        'visibility' => Visibility::class,
        'activates' => 'datetime',
        'expires' => 'datetime'
    ];
}

<?php

namespace Vedian\PageBuilder\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vedian\PageBuilder\Enum\Status;
use Vedian\PageBuilder\Enum\Visibility;
use Vedian\PageBuilder\Functions\HasCreator;

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

<?php

namespace Vedian\PageBuilder\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vedian\PageBuilder\Contracts\ModelContract;
use Vedian\PageBuilder\Support\States\Status;
use Vedian\PageBuilder\Support\States\Visibility;
use Vedian\PageBuilder\Support\Traits\HasCreator;

class Page extends Model implements ModelContract
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

    public function rows()
    {
        return $this->hasMany(Row::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

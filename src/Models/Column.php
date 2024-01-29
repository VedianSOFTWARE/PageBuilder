<?php

namespace VedianSoft\VedianCms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VedianSoft\VedianCms\Contracts\ColumnContract;

/**
 * Represents a column in the CMS.
 */
class Column extends Model implements ColumnContract
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'style',
        'order'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'style' => 'json',
    ];

    /**
     * Define the relationship with the "Row" model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rows()
    {
        return $this->belongsToMany(Row::class, 'row_columns')
            ->withPivot('order')
            ->orderBy('order');
    }
}

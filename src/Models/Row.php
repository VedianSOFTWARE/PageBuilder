<?php

namespace VedianSoft\VedianCms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use VedianSoft\VedianCms\Traits\HasAuthor;
use VedianSoft\VedianCms\Traits\HasStatus;
use VedianSoft\VedianCms\Traits\HasVisibility;
use VedianSoft\VedianCms\Traits\IsVisibleBetween;

/**
 * Class Row
 *
 * This class represents a row in the CMS system.
 * It extends the Eloquent Model class and implements the BuilderContract interface.
 * It also uses several traits for additional functionality.
 *
 * @package VedianSoft\VedianCms\Models
 */
class Row extends BuilderModel
{
    use HasAuthor, HasVisibility, HasStatus, IsVisibleBetween, SoftDeletes;

    // Define the fillable columns
    protected $fillable = [
        'title',
        'slug',
        'description',
        'template',
    ];

    /**
     * Define the many-to-many relationship with the Page model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_rows')
            ->withPivot('order')
            ->orderBy('order');
    }

    /**
     * Define the many-to-many relationship with the Column model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function columns()
    {
        return $this->belongsToMany(Column::class, 'row_columns')
            ->withPivot('order')
            ->orderBy('order');
    }
}

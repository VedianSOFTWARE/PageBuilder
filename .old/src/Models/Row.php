<?php

namespace VedianSoftware\Cms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use VedianSoftware\Cms\Traits\HasAuthor;
use VedianSoftware\Cms\Traits\HasStatus;
use VedianSoftware\Cms\Traits\HasVisibility;
use VedianSoftware\Cms\Traits\IsVisibleBetween;

/**
 * Class Row
 *
 * This class represents a row in the CMS system.
 * It extends the Eloquent Model class and implements the ServiceContract interface.
 * It also uses several traits for additional functionality.
 *
 * @package VedianSoftware\Cms\Models
 */
class Row extends ServiceModel
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

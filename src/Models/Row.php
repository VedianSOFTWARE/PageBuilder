<?php

namespace VedianSOFT\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VedianSOFT\CMS\Contracts\RowContract;
use VedianSOFT\CMS\Traits\HasAuthor;
use VedianSOFT\CMS\Traits\HasStatus;
use VedianSOFT\CMS\Traits\HasVisibility;
use VedianSOFT\CMS\Traits\IsVisibleBetween;

/**
 * Class Row
 *
 * This class represents a row in the CMS system.
 * It extends the Eloquent Model class and implements the RowContract interface.
 * It also uses several traits for additional functionality.
 *
 * @package VedianSOFT\CMS\Models
 */
class Row extends Model implements RowContract
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

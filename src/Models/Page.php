<?php 

namespace VedianSoft\VedianCms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use VedianSoft\VedianCms\Traits\HasAuthor;
use VedianSoft\VedianCms\Traits\HasStatus;
use VedianSoft\VedianCms\Traits\HasVisibility;
use VedianSoft\VedianCms\Traits\IsVisibleBetween;

/**
 * Class Page
 *
 * This class represents a page in the VedianSOFT CMS.
 * It extends the Eloquent Model class and implements the PageContract interface.
 * It also uses several traits for additional functionality.
 *
 * @package VedianSoft\VedianCms\Models
 */
class Page extends BuilderModel
{
    use HasAuthor, HasVisibility, HasStatus, IsVisibleBetween, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt'
    ];

    // Define any relationships or additional methods here

    /**
     * Get the rows associated with the page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rows()
    {
        return $this->belongsToMany(Row::class, 'page_rows');
    }
}

<?php 

namespace VedianSOFT\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VedianSOFT\CMS\Contracts\PageContract;
use VedianSOFT\CMS\Traits\HasAuthor;
use VedianSOFT\CMS\Traits\HasStatus;
use VedianSOFT\CMS\Traits\HasVisibility;
use VedianSOFT\CMS\Traits\IsVisibleBetween;

/**
 * Class Page
 *
 * This class represents a page in the VedianSOFT CMS.
 * It extends the Eloquent Model class and implements the PageContract interface.
 * It also uses several traits for additional functionality.
 *
 * @package VedianSOFT\CMS\Models
 */
class Page extends Model implements PageContract
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

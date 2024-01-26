<?php 

namespace VedianSOFT\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use VedianSOFT\CMS\Contracts\PageContract;
use VedianSOFT\CMS\Traits\HasAuthor;
use VedianSOFT\CMS\Traits\HasVisibility;

class Page extends Model implements PageContract
{
    use HasAuthor, HasVisibility;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'visibility',
        'status',
        'visible_from',
        'visible_till',
    ];
    
    // Define any relationships or additional methods here
    
    public function rows()
    {
        return $this->belongsToMany(Row::class, 'page_entries');
    }
    
}
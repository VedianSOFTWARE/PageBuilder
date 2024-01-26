<?php 

namespace VedianSOFTWARE\VedianSOFTWARE\VedianCMS\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
    ];
    
    // Define any relationships or additional methods here
    
    public function rows()
    {
        return $this->belongsToMany(Entry::class, 'page_entries');
    }
    
}
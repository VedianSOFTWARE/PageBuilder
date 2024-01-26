<?php

namespace VedianSOFT\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use VedianSOFT\CMS\Contracts\RowContract;
use VedianSOFT\CMS\Traits\HasAuthor;

class Row extends Model implements RowContract
{
    use HasAuthor;

    // Define the fillable columns
    protected $fillable = [
        'title',
        'slug',
        'description',
        'template',
        'visible_from',
        'visible_till',
        // Add more fillable columns here based on 2024_01_26_022322_create_rows_table migration
    ];

    // Define the many-to-many relationship with the Page model
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_rows');
    }

    // Define the has-one relationship with the Block model
    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}

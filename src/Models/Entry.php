<?php

namespace VedianCMS\Models;



class Entry extends Model
{
    // Define the fillable columns
    protected $fillable = [
        // Add your fillable columns here
    ];

    // Define the many-to-many relationship with the Page model
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_entries');
    }
}

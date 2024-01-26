<?php

namespace VedianCMS\Models;

use Illuminate\Database\Eloquent\Model;

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

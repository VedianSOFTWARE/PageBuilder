<?php

namespace VedianSOFT\CMS\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    // Define the fillable columns
    protected $fillable = [
        // Add your fillable columns here
    ];

    // Define the relationship with the "Row" model
    public function row()
    {
        return $this->belongsTo(Row::class);
    }    
}

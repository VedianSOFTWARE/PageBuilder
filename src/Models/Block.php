<?php

namespace VedianSOFT\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use VedianSOFT\CMS\Contracts\BlockContract;

class Block extends Model implements BlockContract
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

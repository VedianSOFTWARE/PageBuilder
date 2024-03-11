<?php

namespace Vedian\PageBuilder\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vedian\PageBuilder\Contracts\ModelContract;

class Column extends Model implements ModelContract
{
    use HasFactory;

    protected $table = 'page_columns';

    protected $fillable = [
        'row_id',
    ];

    protected $casts = [];

    public function row()
    {
        return $this->belongsTo(Row::class);
    }
}

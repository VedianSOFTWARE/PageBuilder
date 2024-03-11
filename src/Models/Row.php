<?php

namespace Vedian\PageBuilder\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vedian\PageBuilder\Contracts\Models\IRow;

class Row extends Model implements IRow
{
    use HasFactory;

    protected $table = 'page_rows';

    protected $fillable = [
        'page_id',
    ];

    protected $casts = [];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function columns()
    {
        return $this->hasMany(Column::class);
    }
}

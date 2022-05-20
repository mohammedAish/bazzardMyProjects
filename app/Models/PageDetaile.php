<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetaile extends Model
{
    use HasFactory;
    protected $fillable=[
        'page_id',
        'store_id',
        'desc_ar',
        'desc',
        'image',
        'intro_ar',
        'intro',
        'status',
    ];
    public function pages()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id')
            ->withDefault();
    }
}

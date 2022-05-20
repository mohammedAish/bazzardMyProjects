<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=[
        'key_page',
        'title',
        'title_ar',

    ];
    public function pages_detailes()
    {
        return $this->hasMany(PageDetaile::class, 'page_id', 'id');
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant_Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'variants_id','option','value',
            ];
            public function variants()
            {
                return $this->belongsTo(Variant::class, 'variants_id', 'id')
                    ->withDefault();
            }
}

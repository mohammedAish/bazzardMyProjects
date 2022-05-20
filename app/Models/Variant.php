<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
'product_id','price_variant','quantity_variant',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')
            ->withDefault();
    }
    public function variant_options()
    {
        return $this->hasMany(Variant_Option::class, 'variants_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=[
        'product_id',
        'order_id',
        'size',
        'color',
        'quantity',
        'price',
        'total_price',
    ];
}

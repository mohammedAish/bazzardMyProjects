<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table= 'carts';
    protected $fillable = [

     'product_id',  'user_id', 'cart_id',  'quantity','size', 'color','store_id',
    ];

    public function products()
    {
       return $this->belongsTo('App\Models\Product','product_id','id')->withDefault();

    }


    public function users()
    {
       return $this->belongsTo('App\Models\User')->withDefault();

    }
}

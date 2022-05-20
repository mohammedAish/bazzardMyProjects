<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'how_sell_products',
        'what_going_sell',
        'business_registered',
        'logo',
        'status',
        'plan',
        'user_id',
        'slug',
        'setting',
        'company_id'

    ];

    protected $casts=[
        'setting'=>'json',
    ];
    public function user()
    {
        return $this->hasMany(user::class)->withDefault();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }
}

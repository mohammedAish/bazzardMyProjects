<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Tag;
use App\Models\Store;





class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_id',
        'slug',
        'name',
        'name_ar',
        'intro',
        'intro_ar',
        'desc',
        'desc_ar',
        'image',
        'price',
        'qty',
        'stock',
        'viewed',
        'status',
        'store_id',
        'num_off_seles',
        'saleprice',
    ];
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
            'id',
            'id',
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->withDefault();
    }
    public function carts()
    {
      return $this->hasMany('App\Models\Cart','product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function images(){
        return $this->hasMany(ProductImages::class,'product_id','id');
    }

    public function steNameAttribute($value){
        $this->attributes['name']=Str::title($value);
    }
    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_id', 'id');
    }
}

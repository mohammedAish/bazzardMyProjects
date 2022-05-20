<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable=[
        'customer_id',
        'total',
        'status',
        'store_id',
        'user_id',
    ];

    public function getCreatedAtAttribute($date)
    {
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    public function customers()
    {
        return $this->hasOne(Customer::class ,'id','customer_id');
    }

}

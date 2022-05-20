<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsEcommerce extends Model
{
    use HasFactory;
    public $fillable=[
        'name',
        'email',
        'Subject',
        'msg',
        ];
}

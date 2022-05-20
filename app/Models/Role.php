<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\User;

class Role extends Model
{
    use HasFactory;
     protected $table= 'roles';
    protected $fillable =[
        'name','abilities',
    ];
    protected $casts=[
        'abilities'=>'json',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

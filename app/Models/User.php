<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Store;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'full_name',
        'email',
        'password',
        'address',
        'birthday',
        'avatar',
        'country',
        'phone_number',
        'status',
        'store_id',
        'type',
        'merchant_id',
        'abilities',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'abilities'=>'json',
    ];


public function run()
{
    User::factory()
            ->count(1)
            ->hasPosts(1)
            ->create();
}
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function carts()
    {
      return $this->hasMany(Cart::class,'user_id');
    }


    public function hasAbility($ability)
    {
        $abilitiess = Auth::user()->abilities;


        if($abilitiess !=  NULL){
            $abilitiesss = User::select('abilities')->where('id',Auth::user()->id)->get();
            foreach ($abilitiesss as $abilitie) {
                if(is_array($abilitie->abilities) && (in_array($ability, $abilitie->abilities))) {
                    return true;
                }
               /*  else if(is_array($abilitie->abilities) && (strcmp($ability, $abilitie->abilities==0))) {
                    return true;
                } */
            return false;
            }
    }
    else{
    foreach ($this->roles as $role) {
        if(is_array($role->abilities) && (in_array($ability, $role->abilities))) {
        return true;
        }
       /*  else if(is_array($role->abilities) && strcmp($role->abilities,$ability==0)){
            return true ;
        } */
    }
    return false; }


}
}

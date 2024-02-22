<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $fillable = ['name','email','password','confirm_password'];

    public function roles(){
        return $this->hasOne(Role::class,'id','role');
    }
}

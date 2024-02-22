<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Auth;
use Illuminate\Notifications\Notifiable;

class User extends Auth
{
    use HasFactory,Notifiable,Authenticatable;
    protected $fillable = ['name','email','password','confirm_password'];

    public function roles(){
        return $this->hasOne(Role::class,'id','role');
    }
}

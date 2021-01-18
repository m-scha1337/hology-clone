<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;
    protected $fillable=[
        'email', 'password', 'uname', 'email_verified_at', "verified"
    ];
    protected $hidden=[
        'password', 'remember_token'
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    public function verifyHost(){
        return $this->hasOne(VerifyUsers::class, 'user_id', 'id');
    }
    public function events(){
        return $this->belongsTo(Events::class);
    }
}

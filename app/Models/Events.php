<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable=[
        'eventname','invitegreet', 'eventdesc', 'locationHuman', 'date', 'invite-code', 'public', 'status', 'bgcolour',
    ];
//    protected $dates=[
//        'expires'
//    ];
//    public function calculateExpiry(){
//        $this->attributes['expires']=Carbon::now()->addMonth();
//    }
//    public function getExpiresAttribute($value){
//        $this->expires=Carbon::now()->addMonths(4);
//    }
//    public function __construct(){
//        $this->expires=Carbon::now()->addMonths(4);
//    }
    public function users(){
        return $this->hasMany(Users::class);
    }
}

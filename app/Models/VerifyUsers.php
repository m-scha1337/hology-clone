<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyUsers extends Model
{
    protected $fillable=[
        'user_id', 'token'];
    public function host(){
        return $this->belongsTo(Users::class, 'id', 'user_id');
    }
}

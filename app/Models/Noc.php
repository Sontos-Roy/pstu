<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noc extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

}
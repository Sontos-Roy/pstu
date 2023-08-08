<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }

    function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    function department(){
        return $this->belongsTo(Department::class);
    }
}

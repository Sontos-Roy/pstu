<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVission extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }
    function department(){
        return $this->belongsTo(Department::class);
    }
    function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}

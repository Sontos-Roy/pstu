<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    function department(){
        return $this->belongsTo(Department::class);
    }

}

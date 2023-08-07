<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    function department(){
        return $this->belongsTo(Department::class);
    }
    function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    function program(){
        return $this->belongsTo(Program::class);
    }
    function institute(){
        return $this->belongsTo(Institutes::class);
    }
}

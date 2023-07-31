<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $guarded = [];

    function department(){
        return $this->belongsTo(Department::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}

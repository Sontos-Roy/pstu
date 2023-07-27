<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    function department(){
        return $this->hasMany(Department::class, 'id');
    }
}

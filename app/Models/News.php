<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }

    function department(){
        return $this->belongsTo(Department::class, 'depertment_id');
    }

    function departments(){
        return $this->belongsToMany(Department::class, 'depertment_news');
    }
}

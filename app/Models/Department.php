<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table= "depertments";

    public function userDetails()
    {
        return $this->hasMany(UserDetail::class);
    }

    // function news(){
    //     return $this->belongsToMany(News::class, 'depertment_news');
    // }

    // function notice(){
    //     return $this->belongsToMany(Notice::class, 'department_notice');
    // }

    function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }

    function notices(){
        return $this->hasMany(Notice::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBlockType extends Model
{
    use HasFactory;

    protected $guarded = [];

    function type(){
        return $this->belongsTo(HomeBlock::class, 'type_id');
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBlockType extends Model
{
    use HasFactory;

    protected $guarded = [];

    function details(){

        return $this->hasMany(HomeBlock::class, 'type_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBlock extends Model
{
    use HasFactory;

    protected $guarded = [];

    function home_block(){

        return $this->belongsTo(HomeBlock::class, 'type_id');
    }

    function user(){
        return $this->belongsTo(User::class);
    }


}

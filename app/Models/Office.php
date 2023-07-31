<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $guarded = [];

    function officeHead(){
        return $this->belongsTo(User::class, 'head');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    function user(){
        return $this->belongsTo(User::class, 'head');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userDetails()
    {
        return $this->hasOne(UserDetail::class);
    }
    // function department(){
    //     return $this->hasOne(Department::class);
    // }

    public function awards(){

        return $this->hasMany(UserAward::class, 'user_id');

    }

    public function educations(){

        return $this->hasMany(UserEducation::class, 'user_id');

    }

    public function experiences(){

        return $this->hasMany(UserExperience::class, 'user_id');

    }

    public function memberships(){

        return $this->hasMany(UserMembership::class, 'user_id');

    }

    public function research_interests(){

        return $this->hasMany(UserResearchInterest::class, 'user_id');

    }

    public function research_supervisions(){

        return $this->hasMany(UserResearchSupervision::class, 'user_id');

    }

    public function faculties(){
        
        return $this->hasMany(Faculty::class, 'user_id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function department(){
        return $this->belongsTo(User::class);
    }



}

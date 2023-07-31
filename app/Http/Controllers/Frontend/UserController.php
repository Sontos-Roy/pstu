<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function userProfile($id){
        $this->data['user'] = User::find($id);

        return view('frontend.profiles.profile', $this->data);
    }
}

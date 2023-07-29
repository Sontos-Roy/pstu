<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Institutes;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    function instituteShow($slug){
        $this->data['institute'] = Institutes::whereSlug($slug)->first();
        return view('frontend.institutes.show', $this->data);
    }
    function instituteShowIntro($slug){
        $this->data['data'] = Institutes::whereSlug($slug)->first();
        return view('frontend.institutes.introduction', $this->data);
    }

    function directors(){
        $this->data['directors'] = Institutes::all();

        return view('frontend.institutes.deans', $this->data);
    }
}

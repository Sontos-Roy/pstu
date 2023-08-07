<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ResearchCenter;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    function ResearchCenters(){
        $this->data['centers'] = ResearchCenter::all();

        return view('frontend.research_centers.index', $this->data);
    }

    function ResearchCenterShow($slug){
        $this->data['center'] = ResearchCenter::whereSlug($slug)->first();

        return view('frontend.research_centers.show', $this->data);
    }

    function ResearchCenterDirectors(){
        $this->data['directors'] = ResearchCenter::all();

        return view('frontend.research_centers.directors', $this->data);
    }
}

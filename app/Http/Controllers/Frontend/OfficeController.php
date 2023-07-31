<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    function allOffices(){
        $this->data['offices'] = Office::all();

        return view('frontend.offices.offices', $this->data);
    }
    function OfficeShow($slug){
        $this->data['office'] = Office::whereSlug($slug)->first();

        return view('frontend.offices.office_show', $this->data);
    }

    function Officers(){
        $this->data['officers'] = Office::all();

        return view('frontend.offices.officers', $this->data);
    }
}

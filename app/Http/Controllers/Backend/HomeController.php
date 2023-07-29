<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    function getDepartments(){

        $departments = Department::where('faculty_id', request()->id)->get();
        return response()->json($departments);
        
    }
}

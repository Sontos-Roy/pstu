<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\AcademicCalendar;
use App\Models\Event;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){


    	$roles=Role::withCount('users')->get();
    	$total_exams=AcademicCalendar::where(function($row){
						    		$row->whereMonth('final_exam_start', date('m'));
						    		$row->whereMonth('final_exam_start', date('Y'));
						    	})
    							->orwhere(function($row){
						    		$row->whereMonth('first_mid_term', date('m'));
						    		$row->whereMonth('first_mid_term', date('Y'));
						    	})
						    	->orwhere(function($row){
						    		$row->whereMonth('second_mid_term', date('m'));
						    		$row->whereMonth('second_mid_term', date('Y'));
						    	})->count();
    	$total_events = Event::whereBetween('date', [Carbon::now()->startOfWeek(Carbon::FRIDAY), Carbon::now()->endOfWeek(Carbon::THURSDAY)])->count();

    	$upcomins_events = Event::where('date','>',date('Y-m-d'))->where('date','<',date('Y-m-d', strtotime("+1 month")))->take(10)->get();
    	$upcomins_birthdays = UserDetail::with('user')->whereDay('date_of_birth','>',date('d'))->whereMonth('date_of_birth', '>=',date('m'))
    							->whereMonth('date_of_birth', '<',date('m')+2)->take(10)->get();


        return view('backend.dashboard', compact('roles','total_events','total_exams','upcomins_events','upcomins_birthdays'));
    }

    function getDepartments(){

        $departments = Department::where('faculty_id', request()->id)->get();
        return response()->json($departments);
        
    }
}

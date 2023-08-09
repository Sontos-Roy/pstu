<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserResearchSupervision;
use App\Models\User;


class UserResearchSupervisionController extends Controller
{
    
    public function create(){
        $user=User::find(request('user_id'));

        $view=view('backend.teachers.add_research_supervisor', compact('user'))->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'level_of_study' => 'required',
            'supervisor' => 'required',
            'co_supervisor' => '',
            'no_of_student' => 'required',
            'area_research' => '',
            'current_completion' => '',
            'user_id' => '',
        ]);

        $data['created_by'] = \Auth::id();
        $create = UserResearchSupervision::create($data);

        return response()->json(['status'=> true, 'msg'=> 'User Research Supervision Created Successful']);

    }

    public function delete($id){

        UserResearchSupervision::find($id)->delete();
        return response()->json(['status'=>true, 'msg'=>'UserResearchSupervision Deleted Successfuly']);

    }


}

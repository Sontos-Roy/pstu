<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class AssignDepartmentController extends Controller
{
    function AssignDeptIndex(){
        $this->data['faculties'] = Department::all();
        $this->data['users'] =  User::all();
        return view('backend.assign_head.index', $this->data);
    }

    function AssignDeptEdit($id = null){
        $departments = Department::all();
        $users = User::all();
        if($id){
            $item = Department::find($id);
        }else{
            $item = null;
        }

        $html = view('backend.assign_head.edit', compact('users','departments', 'item'))->render();

        return response()->json(['status'=>true, 'html' => $html]);
    }

    function AssignDeptStore(Request $request){
        $data = $request->validate([
            'department_id' => 'required',
            'user_id' => 'required'
        ]);
        $facutly = Department::find($request->department_id);

        $facutly->user_id = $request->user_id;

        $facutly->save();

        return response()->json(['status' => true, 'msg' => 'Department Head Assign Complete']);

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Permissions\Role;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;

class AssignFacultyController extends Controller
{

    function AssignDeanIndex(){
        $this->data['faculties'] = Faculty::all();
        $this->data['users'] =  User::all();
        return view('backend.assign_dean.index', $this->data);
    }

    function AssignDeanEdit($id = null){
        $faculties = Faculty::all();
        $users = User::all();
        if($id){
            $item = Faculty::find($id);
        }else{
            $item = null;
        }

        $html = view('backend.assign_dean.edit', compact('users','faculties', 'item'))->render();

        return response()->json(['status'=>true, 'html' => $html]);
    }

    function AssignDeanStore(Request $request){
        $data = $request->validate([
            'faculty_id' => 'required',
            'user_id' => 'required'
        ]);
        $facutly = Faculty::find($request->faculty_id);

        $facutly->user_id = $request->user_id;

        $facutly->save();

        return response()->json(['status' => true, 'msg' => 'Faculty Assign Complete']);

    }
}

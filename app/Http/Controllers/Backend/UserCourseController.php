<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCourse;
use App\Models\User;


class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(){
        $user=User::find(request('user_id'));

        $view=view('backend.teachers.add_course', compact('user'))->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'title' => 'required',
            'date' => '',
            'document' => 'nullable|mimes:pdf',
            'user_id' => '',
        ]);

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = time().'_'.$document->getClientOriginalName();
            $document->storeAs('public/files/courses', $filename);
            $data['document'] = $filename;
        }


        $data['created_by'] = \Auth::id();
        $create = UserCourse::create($data);

        return response()->json(['status'=> true, 'msg'=> 'User Education Created Successful']);

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

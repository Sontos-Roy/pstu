<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProject;
use App\Models\User;

class UserProjectController extends Controller
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

        $view=view('backend.teachers.add_project', compact('user'))->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'info' => 'required',
            'link' => '',
            'date' => '',
            'pdf_file' => 'nullable|mimes:pdf',
            'user_id' => '',
        ]);

        if ($request->hasFile('pdf_file')) {
            $image = $request->file('pdf_file');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/files/projects', $filename);
            $data['pdf_file'] = $filename;
        }


        $data['created_by'] = \Auth::id();
        $create = UserProject::create($data);

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

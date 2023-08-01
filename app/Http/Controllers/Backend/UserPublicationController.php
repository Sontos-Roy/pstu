<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPublication;
use App\Models\User;

class UserPublicationController extends Controller
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

        $view=view('backend.teachers.add_publication', compact('user'))->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required',
            'project_name' => 'required',
            'source' => '',
            'from_date' => '',
            'to_date' => '',
            'collaboration' => '',
            'user_id' => '',
        ]);


        $data['created_by'] = \Auth::id();
        $create = UserPublication::create($data);

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

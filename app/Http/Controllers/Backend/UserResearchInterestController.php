<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserResearchInterest;
use App\Models\User;


class UserResearchInterestController extends Controller
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

        $view=view('backend.teachers.add_research_interest', compact('user'))->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required',
            'research' => 'required',
            'description' => '',
            'user_id' => '',
        ]);

        $data['created_by'] = \Auth::id();
        $create = UserResearchInterest::create($data);

        return response()->json(['status'=> true, 'msg'=> 'User Research Interest Created Successful']);

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
        UserResearchInterest::find($id)->delete();
        return response()->json(['status'=>true, 'msg'=>'UserResearchInterest Deleted Successfuly']);
    }
}

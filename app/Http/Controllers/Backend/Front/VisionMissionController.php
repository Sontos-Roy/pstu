<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\MissionVission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = MissionVission::paginate(10);
        $this->data['departments'] = Department::all();
        $this->data['faculties'] = Faculty::all();

        return view('backend.About_page.mission_vision.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'department_id' => '',
            'faculty_id' => '',
            'short' => 'required',
            'details' => 'required',
        ]);

        $data['user_id'] = Auth::id();

        MissionVission::create($data);

        return response()->json(['status'=>true, 'msg'=>'Mission and Vision Created Successfully']);
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
        $data = MissionVission::find($id);
        $departments = Department::all();
        $faculties = Faculty::all();

        $html = view('backend.About_page.mission_vision.edit', compact('data', 'departments', 'faculties'))->render();
        return response()->json(['status'=>true, 'html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'department_id' => '',
            'faculty_id' => '',
            'short' => 'required',
            'details' => 'required',
        ]);

        $data['user_id'] = Auth::id();

        $update = MissionVission::find($id);

        $update->fill($data);
        $update->save();

        return response()->json(['status'=>true, 'msg'=>'Mission and Vision Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MissionVission::find($id)->delete();
        return response()->json(['status'=>true, 'msg'=>'Mission and Vision Deleted Successfully']);
    }
}

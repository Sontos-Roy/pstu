<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AcademicCouncil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicCouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['members'] = AcademicCouncil::all();

        return view('backend.committees.planning_work.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.committees.planning_work.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => 'required',
        ]);

        $data['user_id'] = Auth::id();

        AcademicCouncil::create($data);

        return response()->json(['status' => true, 'msg' => 'Academic Council Member Created Successfully', 'url' => route('admin.academic_council.index')]);
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
        $this->data['item'] = AcademicCouncil::find($id);

        return view('backend.committees.planning_work.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => 'required',
        ]);

        $data['user_id'] = Auth::id();
        AcademicCouncil::find($id)->update($data);

        return response()->json(['status' => true, 'msg' => 'Academic Council Member Updated Successfully', 'url' => route('admin.academic_council.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AcademicCouncil::find($id)->delete();

        return response()->json(['status' => true, 'msg' => 'Planning Work Member Deleted Successfully']);

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['admissions'] = Admission::all();

        return view('backend.admissions.index', $this->data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['departments'] = Department::all();

        return view('backend.admissions.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'title' => 'required',
            'department_id' => 'nullable',
            'details' => '',
            'contact' => '',
        ]);

        $data['slug'] = Str::slug($request->input('title'));
        $data['user_id'] = Auth::id();
        Admission::create($data);

        return response()->json(['status' => true, 'msg' => 'Admission Created Successfully', 'url' => route('admin.admissions.index')]);
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
        $this->data['admission'] = Admission::find($id);
        $this->data['departments'] = Department::all();
        return view('backend.admissions.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->validate([
            'title' => 'required',
            'department_id' => 'nullable',
            'details' => '',
            'contact' => '',
        ]);

        $data['slug'] = Str::slug($request->input('title'));
        $data['user_id'] = Auth::id();
        $update = Admission::find($id);
        $update->fill($data);
        $update->save();


        return response()->json(['status' => true, 'msg' => 'Admission Updated Successfully', 'url' => route('admin.admissions.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admission::find($id)->delete();

        return response()->json(['status' => true, 'msg' => 'Admission Deleted Successfully']);
    }
}

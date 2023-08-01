<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query= Department::orderBy("id", "DESC");
                if(auth()->user()->hasRole('faculty')){
                    $query->where('faculty_id', auth()->user()->faculty_id);
                }
        $this->data['departments'] =$query->get();
        
        return view("backend.depertments.departments", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['faculties'] = getFaculty();
        $this->data['users'] =  User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->get();

        return view('backend.depertments.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'faculty_id' => 'required',
            'short' => 'required',
            'brief' => 'required',
            'image' => 'image'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/departments', $filename);
            $data['image'] = $filename;
        }
        $data['slug'] = Str::slug($request->input('name'));

        Department::create($data);

        return response()->json(['status' => true, 'msg' => 'Department Created Successfully', 'url' => route('admin.department.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Department::find($id);
        return view('backend.depertments.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['faculties'] = getFaculty();
        $this->data['users'] =  User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->get();
        $this->data['item'] = Department::find($id);
        return view('backend.depertments.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'faculty_id' => 'required',
            'short' => 'required',
            'brief' => 'required',
            'image' => 'image'
        ]);
        $deparment = Department::find($id);
        if($request->hasFile('image')){
            if($deparment->image){
                deleteImage("departments", $deparment->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/departments', $filename);
            $data['image'] = $filename;
        }
        $data['slug'] = Str::slug($request->input('name'));
        $deparment->fill($data);

        $deparment->save();
        return response()->json(['status' => true, 'msg' => 'Department updated Successfully', 'url' => route('admin.department.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::find($id)->delete();

        return response()->json(['status' => true, 'msg' => 'Department Deleted Successfully', 'url' => route('admin.department.index')]);
    }
}

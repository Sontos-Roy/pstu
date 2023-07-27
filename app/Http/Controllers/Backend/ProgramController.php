<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['programs'] = Program::orderBy('id', 'DESC')->get();

        return view('backend.programs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['departments'] =  Department::all();

        return view('backend.programs.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'department_id' => 'required',
            'short' => 'required',
            'details' => 'required',
            'image' => 'image'
        ]);
        $data['user_id'] = Auth::id();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/programs', $filename);
            $data['image'] = $filename;
        }

        $data['slug'] = Str::slug($request->input('title'));

        Program::create($data);

        return response()->json(['status' => true, 'msg' => 'Program Created Successfully', 'url' => route('admin.programs.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Program::find($id);

        return view("backend.programs.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['item'] = Program::find($id);
        $this->data['departments'] =  Department::all();

        return view("backend.programs.edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'department_id' => 'required',
            'short' => 'required',
            'details' => 'required',
            'image' => 'image'
        ]);
        $data['user_id'] = Auth::id();

        $update = Program::find($id);
        if($request->hasFile('image')){
            if($update->image){
                deleteImage('faculties', $update->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/programs', $filename);
            $data['image'] = $filename;
        }

        $data['slug'] = Str::slug($request->input('title'));


        $update->fill($data);

        $update->save();


        return response()->json(['status' => true, 'msg' => 'Program Updated Successfully', 'url' => route('admin.programs.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Program::find($id);

        if($delete->image){
            deleteImage("programs", $delete->image);
        }
        $delete->delete();

        return response()->json(['status' => true, 'msg' => "Program Deleted Successfully"]);
    }
}

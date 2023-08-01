<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $query= Research::orderBy("id", "DESC");
                if(auth()->user()->hasRole('faculty')){
                    $query->whereIn('faculty_id', auth()->user()->faculties()->pluck('id'));
                }
        $this->data['researchs'] =$query->get();

        return view('backend.researchs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['departments'] = Department::all();
        $this->data['faculties'] = getFaculty();

        return view('backend.researchs.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'short' => '',
            'message' => '',
            'department_id' => '',
            'faculty_id' => '',
            'file' => 'mimes:pdf|max:2048',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('title'));
        $create = Research::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/researchs', $filename);
            $create->file = $filename;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/researchs', $filename);
            $create->image = $filename;
        }

        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Research Created Successful', 'url'=> route('admin.researchs.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['research'] = Research::find($id);

        return view("backend.researchs.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['research'] = Research::find($id);
        $this->data['departments'] = Department::all();
        $this->data['faculties'] = getFaculty();

        return view('backend.researchs.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'short' => '',
            'message' => '',
            'depertment_id' => '',
            'faculty_id' => '',
            'file' => 'mimes:pdf|max:2048',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('title'));
        $create = Research::find($id);


        if ($request->hasFile('file')) {
            if($create->file){
                deleteFile('researchs', $create->file);
            }
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/researchs', $filename);
            $data['file'] = $filename;
        }
        if ($request->hasFile('image')) {
            if($create->image){
                deleteImage('researchs', $create->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/researchs', $filename);
            $data['image'] = $filename;
        }
        $create->fill($data);
        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Research Updated Successful', 'url'=> route('admin.researchs.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Research::find($id);

        if($delete->file){
            deleteFile('researchs', $delete->file);
        }
        if($delete->image){
            deleteImage('researchs', $delete->image);
        }

        $delete->delete();
        return response()->json(['status'=> true, 'msg'=> 'Research Deleted Successful', 'url'=> route('admin.researchs.index')]);
    }
}

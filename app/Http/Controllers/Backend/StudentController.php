<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentsPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = StudentsPages::orderBy("id", "DESC")->get();

        return view('backend.student-pages.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.student-pages.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'short' => '',
            'details' => '',
            'pdf' => 'mimes:pdf|max:2048',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('title'));
        $create = StudentsPages::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/students', $filename);
            $create->file = $filename;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/students', $filename);
            $create->image = $filename;
        }

        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Page Created Successful', 'url'=> route('admin.students-page.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = StudentsPages::find($id);

        return view("backend.student-pages.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['item'] = StudentsPages::find($id);

        return view('backend.student-pages.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'short' => '',
            'details' => '',
            'pdf' => 'mimes:pdf|max:2048',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('title'));
        $create = StudentsPages::find($id);


        if ($request->hasFile('file')) {
            if($create->file){
                deleteFile('students', $create->file);
            }
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/students', $filename);
            $data['file'] = $filename;
        }
        if ($request->hasFile('image')) {
            if($create->image){
                deleteImage('notices', $create->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/students', $filename);
            $data['image'] = $filename;
        }
        $create->fill($data);
        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Page Updated Successful', 'url'=> route('admin.students-page.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = StudentsPages::find($id);

        if($delete->file){
            deleteFile('students', $delete->file);
        }
        if($delete->image){
            deleteImage('students', $delete->image);
        }

        $delete->delete();
        return response()->json(['status'=> true, 'msg'=> 'Page Deleted Successful', 'url'=> route('admin.students-page.index')]);
    }
}

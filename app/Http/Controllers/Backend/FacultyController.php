<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['faculties'] = Faculty::orderBy('id', 'DESC')->get();

        return view('backend.faculties.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['users'] =  User::whereHas('roles', function ($query) {
            $query->where('name', 'dean');
        })->get();

        return view('backend.faculties.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'short' => 'required',
            'introduction' => 'required',
            'image' => 'required | image',
            'banner' => 'image'
        ]);
        $data['created_by'] = Auth::id();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/faculties', $filename);
            $data['image'] = $filename;
        }
        if($request->hasFile('banner')){
            $banner = $request->file('banner');
            $filename2 = time().'_'.$banner->getClientOriginalName();
            $banner->storeAs('public/images/faculties', $filename2);
            $data['banner'] = $filename2;
        }

        $data['slug'] = Str::slug($request->input('title'));

        Faculty::create($data);

        return response()->json(['status' => true, 'msg' => 'Faculty Created Successfully', 'url' => route('admin.faculties.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Faculty::find($id);

        return view("backend.faculties.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['item'] = Faculty::find($id);
        $this->data['users'] =  User::whereHas('roles', function ($query) {
            $query->where('name', 'dean');
        })->get();

        return view("backend.faculties.edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'short' => 'required',
            'introduction' => 'required',
            'image' => 'image'
        ]);
        $data['created_by'] = Auth::id();
        $update = Faculty::find($id);

        if($request->hasFile('image')){
            if($update->image){
                deleteImage('faculties', $update->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/faculties', $filename);
            $data['image'] = $filename;
        }

        if($request->hasFile('banner')){
            if($update->banner){
                deleteImage('faculties', $update->banner);
            }
                $banner = $request->file('banner');
                $filename2 = time().'_'.$banner->getClientOriginalName();
                $banner->storeAs('public/images/faculties', $filename2);
                $data['banner'] = $filename2;
        }
        $data['slug'] = Str::slug($request->input('title'));
        $update->fill($data);

        $update->save();


        return response()->json(['status' => true, 'msg' => 'Faculty Updated Successfully', 'url' => route('admin.faculties.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Faculty::find($id);

        if($delete->image){
            deleteImage("faculties", $delete->image);
        }
        $delete->delete();

        return response()->json(['status' => true, 'msg' => "Faculty Deleted Successfully"]);
    }
}

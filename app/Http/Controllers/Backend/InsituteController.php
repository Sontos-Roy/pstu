<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Institutes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InsituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['institutes'] = Institutes::orderBy('id', 'DESC')->get();
        return view("backend.institutes.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['users'] =  User::all();

        return view('backend.institutes.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'short' => 'required',
            'website' => '',
            'brief' => 'required',
            'image' => 'image'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/institutes', $filename);
            $data['image'] = $filename;
        }
        $data['slug'] = Str::slug($request->input('name'));

        Institutes::create($data);

        return response()->json(['status' => true, 'msg' => 'Institute Created Successfully', 'url' => route('admin.institutes.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Institutes::find($id);
        return view('backend.institutes.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['users'] =  User::all();
        $this->data['item'] = Institutes::find($id);
        return view('backend.institutes.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'short' => 'required',
            'website' => '',
            'brief' => 'required',
            'image' => 'image'
        ]);
        $deparment = Institutes::find($id);
        if($request->hasFile('image')){
            if($deparment->image){
                deleteImage("institutes", $deparment->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/institutes', $filename);
            $data['image'] = $filename;
        }
        $data['slug'] = Str::slug($request->input('name'));
        $deparment->fill($data);

        $deparment->save();
        return response()->json(['status' => true, 'msg' => 'Institute updated Successfully', 'url' => route('admin.institutes.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Institutes::find($id);
        if($delete->image){
            deleteImage('institutes', $delete->image);
        }

        $delete->delete();


        return response()->json(['status' => true, 'msg' => 'Institute Deleted Successfully', 'url' => route('admin.institutes.index')]);
    }
}

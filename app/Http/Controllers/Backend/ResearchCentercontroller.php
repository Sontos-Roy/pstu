<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ResearchCenter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResearchCentercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['centers'] = ResearchCenter::orderBy('id', 'DESC')->get();
        return view("backend.research_center.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['users'] =  User::all();

        return view('backend.research_center.add', $this->data);
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
            $image->storeAs('public/images/research_centers', $filename);
            $data['image'] = $filename;
        }
        $data['slug'] = Str::slug($request->input('name'));

        ResearchCenter::create($data);

        return response()->json(['status' => true, 'msg' => 'Research Center Created Successfully', 'url' => route('admin.research_center.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = ResearchCenter::find($id);
        return view('backend.research_center.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['users'] =  User::all();
        $this->data['item'] = ResearchCenter::find($id);
        return view('backend.research_center.edit', $this->data);
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
        $deparment = ResearchCenter::find($id);
        if($request->hasFile('image')){
            if($deparment->image){
                deleteImage("research_centers", $deparment->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/research_centers', $filename);
            $data['image'] = $filename;
        }
        $data['slug'] = Str::slug($request->input('name'));
        $deparment->fill($data);

        $deparment->save();
        return response()->json(['status' => true, 'msg' => 'Research Center updated Successfully', 'url' => route('admin.research_center.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ResearchCenter::find($id);
        if($delete->image){
            deleteImage('research_centers', $delete->image);
        }

        $delete->delete();


        return response()->json(['status' => true, 'msg' => 'Research Center Deleted Successfully', 'url' => route('admin.research_center.index')]);
    }
}

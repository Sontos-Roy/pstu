<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['pages'] = Pages::all();
        return view("backend.pages.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.add');
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
            'is_active' => '',
            'video_link' => '',
            'image' => 'image',
        ]);

        $data['slug'] = Str::slug($request->input('title'));
        $isChecked = $request->has('is_active');

        $data['user_id'] = Auth::id();

        if($isChecked){
            $data['is_active'] = 1;
        }else{
            $data['is_active'] = 0;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/pages', $filename);
            $data['image'] = $filename;
        }

        Pages::create($data);

        return response()->json(['status' => true, 'msg' => 'Slider Created Successfully', 'url' => route('admin.pages.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = Pages::find($id);

        return view('backend.pages.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['item'] = Pages::find($id);

        return view('backend.pages.edit', $this->data);
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
            'is_active' => '',
            'video_link' => '',
            'image' => 'image',
        ]);

        $data['slug'] = Str::slug($request->input('title'));
        $isChecked = $request->has('is_active');

        $data['user_id'] = Auth::id();
        $update = Pages::find($id);
        if($isChecked){
            $data['is_active'] = 1;
        }else{
            $data['is_active'] = 0;
        }
        if ($request->hasFile('image')) {
            if($update->image){
                deleteImage('pages', $update->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/pages', $filename);
            $data['image'] = $filename;
        }
        $update->fill($data);

        $update->save();


        return response()->json(['status' => true, 'msg' => 'Slider Updated Successfully', 'url' => route('admin.pages.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Pages::find($id);

        if($slider->image){
            deleteImage("pages", $slider->image);
        }

        $slider->delete();

        return response()->json(['status' => true, 'msg' => 'Pages Deleted Successfully']);
    }
    public function changeStatus(Request $request, $id){
        $data = Pages::find($id);

        if($data->is_active == 0){
            $data->is_active = 1;
        }else if($data->is_active == 1){
            $data->is_active = 0;
        }

        $data->save();

        return response()->json(['msg'=>"Active Status Changed"]);
    }
}

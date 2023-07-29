<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrariesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['news'] = Library::orderBy("id", "DESC")->get();

        return view('backend.libraries.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['items'] = Library::all();

        return view('backend.libraries.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'short' => 'required',
            'website' => 'required',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $create = Library::create($data);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/libraries', $filename);
            $create->image = $filename;
        }

        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Library Created Successful', 'url'=> route('admin.libraries.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['news'] = Library::find($id);

        return view("backend.libraries.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['item'] = Library::find($id);

        return view('backend.libraries.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'short' => 'required',
            'website' => 'required',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $update = Library::find($id);


        if ($request->hasFile('image')) {
            deleteImage('libraries', $update->image);
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/libraries', $filename);
            $data['image'] = $filename;
        }
        $update->fill($data);
        $update->save();

        return response()->json(['status'=> true, 'msg'=> 'Library Updated Successful', 'url'=> route('admin.libraries.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = Library::find($id);

        deleteImage('libraries', $news->delete);

        $news->delete();

        return response()->json(['status'=>true, 'msg' => 'Library Deleted Successfully']);
    }
}

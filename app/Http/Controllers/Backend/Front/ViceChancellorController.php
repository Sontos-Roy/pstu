<?php

namespace App\Http\Controllers\Backend\Front;

use App\Http\Controllers\Controller;
use App\Models\ViceChancellor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViceChancellorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['items'] = ViceChancellor::all();
        return view("backend.About_page.viceChanchellor.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'from' => 'required',
            'to' => 'required',
            'image' => 'image',
        ]);
        $data['user_id'] = Auth::id();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/vice-chancellors', $filename);
            $data['image'] = $filename;
        }
        
        ViceChancellor::create($data);
        return response()->json(['status' => true, 'msg' => 'Vice Chancellors Created Successfully']);
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
        $data = ViceChancellor::find($id);

        $html = view('backend.About_page.viceChanchellor.edit', compact('data'))->render();

        return response()->json(['status'=>true, 'html' => $html]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outline = ViceChancellor::find($id);
        $data = $request->validate([
            'name' => 'required',
            'from' => 'required',
            'to' => 'required',
            'image' => 'image',
        ]);
        $data['user_id'] = Auth::id();


        if ($request->hasFile('image')) {
            if($outline->image){
                deleteImage('vice-chancellors', $outline->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/vice-chancellors', $filename);
            $data['image'] = $filename;
        }

        $outline->fill($data);
        $outline->save();


        return response()->json(['status' => true, 'msg' => 'Vice Chancellors Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outline = ViceChancellor::find($id);
        if($outline->image){
            deleteImage('vice-chancellors', $outline->image);
        }
        $outline->delete();

        return response()->json(['status' => true, 'msg' => 'Vice Chancellors Deleted Successfully']);
    }
}

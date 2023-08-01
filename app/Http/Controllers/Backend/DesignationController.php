<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $items=Designation::all();
        return view("backend.designations.index", compact('items'));
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
            'name' => 'required'
        ]);

        Designation::create($data);

        return response()->json(['status' => true, 'msg' => 'Designation Created Successfully', 'url' => route('admin.designations.index')]);
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
    public function edit(string $id){

        $item=Designation::find($id);
        $view=view("backend.designations.edit", compact('item'))->render();
        return response()->json(['html'=>$view]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $data = $request->validate([
            'name' => 'required'
        ]);

        Designation::find($id)->update($data);

        return response()->json(['status' => true, 'msg' => 'Designation Update Successfully', 'url' => route('admin.designations.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

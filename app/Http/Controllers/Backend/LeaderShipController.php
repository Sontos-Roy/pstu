<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\LeaderShip;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['leaders'] = LeaderShip::all();

        return view('backend.leadership.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['users'] = User::all();
        return view("backend.leadership.add", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message_short' => 'required',
            'message' => 'required',
            'user_id' => ''
        ]);
        $data['slug'] = Str::slug($request->input('designation'));

        LeaderShip::create($data);

        // return redirect()->route('admin.leadership.index')->with('success', 'LeaderShip Created Successfully');
        return response()->json(['status'=> true, 'msg' => 'LeaderShip Created Successfully', 'url'=> route('admin.leadership.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['item'] = LeaderShip::find($id);

        return view('backend.leadership.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['leader'] = LeaderShip::find($id);
        $this->data['users'] = User::all();

        return view('backend.leadership.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message_short' => 'required',
            'message' => 'required',
            'user_id' => ''
        ]);

        $leader = LeaderShip::find($id);

        $data['slug'] = Str::slug($request->input('designation'));

        $leader->fill($data);
        $leader->save();
        // return redirect()->route('admin.leadership.index')->with('success', 'LeaderShip Created Successfully');
        return response()->json(['status'=> true, 'msg' => 'LeaderShip Updated Successfully', 'url'=> route('admin.leadership.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = LeaderShip::find($id);

        $delete->delete();

        return response()->json(['status'=>true, 'msg' => 'LeaderShip Deleted Successfully']);
    }
}

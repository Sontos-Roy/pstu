<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RegentBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegentBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['members'] = RegentBoard::all();

        return view('backend.committees.regent.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.committees.regent.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => 'required',
        ]);

        $data['user_id'] = Auth::id();

        RegentBoard::create($data);

        return response()->json(['status' => true, 'msg' => 'Regent Board Member Created Successfully', 'url' => route('admin.regent_board.index')]);
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
        $this->data['item'] = RegentBoard::find($id);

        return view('backend.committees.regent.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => 'required',
        ]);
        
        $data['user_id'] = Auth::id();
        RegentBoard::find($id)->update($data);

        return response()->json(['status' => true, 'msg' => 'Regent Board Member Updated Successfully', 'url' => route('admin.regent_board.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RegentBoard::find($id)->delete();

        return response()->json(['status' => true, 'msg' => 'Regent Board Member Deleted Successfully']);

    }
}
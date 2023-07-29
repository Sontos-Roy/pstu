<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['notices'] = Office::orderBy("id", "DESC")->get();

        return view('backend.offices.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['users'] = User::all();

        return view('backend.offices.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'details' => '',
            'head' => '',
            'contact' => '',
        ]);

        $data['slug'] = Str::slug($request->input('name'));
        $office = Office::create($data);

        $users = request()->input('users');
        $office->users()->sync($users);



        return response()->json(['status'=> true, 'msg'=> 'Office Created Successful', 'url'=> route('admin.offices.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['office'] = Office::find($id);

        return view("backend.offices.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['office'] = Office::find($id);
        $this->data['users'] = User::all();

        return view('backend.offices.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'details' => '',
            'head' => '',
            'contact' => '',
        ]);

        $data['slug'] = Str::slug($request->input('name'));
        $create = Office::find($id);

        $users = request()->input('users');
        $create->users()->sync($users);

        $create->fill($data);
        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Office Updated Successful', 'url'=> route('admin.offices.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Office::find($id);

        $delete->delete();
        return response()->json(['status'=> true, 'msg'=> 'Office Deleted Successful', 'url'=> route('admin.notices.index')]);
    }
}

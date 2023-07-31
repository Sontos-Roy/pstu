<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query= Notice::orderBy("id", "DESC");
                if(auth()->user()->hasRole('faculty')){
                    $query->whereIn('faculty_id', auth()->user()->faculties()->pluck('id'));
                }
        $this->data['notices'] =$query->get();


        return view('backend.notices.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query=Department::query();

        if(Auth::user()->hasRole('Dean')){

            $query->where('user_id', Auth::id());
        }
        $this->data['departments'] = $query->get();
        $this->data['faculties'] = getFaculty();

        return view('backend.notices.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'short' => '',
            'message' => '',
            'depertment_id' => '',
            'file' => 'mimes:pdf|max:2048',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('title'));
        $create = Notice::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/notices', $filename);
            $create->file = $filename;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/notices', $filename);
            $create->image = $filename;
        }

        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Notice Created Successful', 'url'=> route('admin.notices.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['notice'] = Notice::find($id);

        return view("backend.notices.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['notice'] = Notice::find($id);
        $this->data['departments'] = Department::all();
        $this->data['faculties'] = getFaculty();

        return view('backend.notices.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'short' => '',
            'message' => '',
            'depertment_id' => '',
            'file' => 'mimes:pdf|max:2048',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('title'));
        $create = Notice::find($id);


        if ($request->hasFile('file')) {
            if($create->file){
                deleteFile('notices', $create->file);
            }
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/files/notices', $filename);
            $data['file'] = $filename;
        }
        if ($request->hasFile('image')) {
            if($create->image){
                deleteImage('notices', $create->image);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/notices', $filename);
            $data['image'] = $filename;
        }
        $create->fill($data);
        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Notice Updated Successful', 'url'=> route('admin.notices.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Notice::find($id);

        if($delete->file){
            deleteFile('notices', $delete->file);
        }
        if($delete->image){
            deleteImage('notices', $delete->image);
        }

        $delete->delete();
        return response()->json(['status'=> true, 'msg'=> 'Notice Deleted Successful', 'url'=> route('admin.notices.index')]);
    }
}

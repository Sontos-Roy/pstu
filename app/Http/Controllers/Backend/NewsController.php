<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){


        $query= News::orderBy("id", "DESC");
                if(auth()->user()->hasRole('faculty')){
                    $query->where('faculty_id', auth()->user()->faculty_id);
                }

                if(auth()->user()->hasRole('department')){
                    $query->where('department_id', auth()->user()->department_id);
                }
        $this->data['news'] =$query->get();


        return view('backend.news.index', $this->data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['faculties'] = getFaculty();
        $this->data['departments'] = getDepartment();
  
        return view('backend.news.add', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required',
            'short' => 'required',
            'message' => 'required',
            'depertment_id' => '',
            'faculty_id' => '',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('heading'));
        $create = News::create($data);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/news', $filename);
            $create->image = $filename;
        }

        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'News Created Successful', 'url'=> route('admin.news.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['news'] = News::find($id);

        return view("backend.news.view", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['faculties'] = getFaculty();
        $this->data['departments'] = getDepartment();
        $this->data['news'] = News::find($id);

        

        return view('backend.news.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'heading' => 'required',
            'short' => 'required',
            'message' => 'required',
            'depertment_id' => '',
            'faculty_id' => '',
            'image' => ''
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('heading'));
        $update = News::find($id);


        if ($request->hasFile('image')) {
            deleteImage('news', $update->image);
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/news', $filename);
            $data['image'] = $filename;
        }
        $update->fill($data);
        $update->save();

        return response()->json(['status'=> true, 'msg'=> 'News Updated Successful', 'url'=> route('admin.news.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);

        deleteImage('news', $news->delete);

        $news->delete();

        return response()->json(['status'=>true, 'msg' => 'News Deleted Successfully']);
    }
}

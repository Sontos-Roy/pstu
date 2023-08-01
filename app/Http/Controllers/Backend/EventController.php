<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Event;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $query= Event::orderBy("id", "DESC");
                if(auth()->user()->hasRole('faculty')){
                    $query->where('faculty_id', auth()->user()->faculty_id);
                }

                if(auth()->user()->hasRole('department')){
                    $query->where('department_id', auth()->user()->department_id);
                }
        $this->data['events'] =$query->get();


        return view("backend.events.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['faculties'] = getFaculty();
        $this->data['departments'] = getDepartment();
        return view("backend.events.add", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required',
            'short' => 'required',
            'date' => 'date',
            'time' => '',
            'faculty_id' => '',
            'department_id' => '',
            'message' => 'required',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('heading'));
        $create = Event::create($data);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/events', $filename);
            $create->image = $filename;
        }

        $create->save();

        return response()->json(['status'=> true, 'msg'=> 'Event Created Successful', 'url'=> route('admin.events.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['event'] = Event::find($id);

        return view('backend.events.view', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['event'] = Event::find($id);
        $this->data['faculties'] = getFaculty();
        $this->data['departments'] = getDepartment();

        return view('backend.events.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'heading' => 'required',
            'short' => 'required',
            'date' => '',
            'time' => '',
            'faculty_id' => '',
            'department_id' => '',
            'message' => 'required',
            'image' => 'image'
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->input('heading'));
        $update = Event::find($id);

        if ($request->hasFile('image')) {
            deleteImage('events', $update->image);
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/events', $filename);
            $data['image'] = $filename;
        }
        $update->fill($data);
        $update->save();

        return response()->json(['status'=> true, 'msg'=> 'Event Updated Successful', 'url'=> route('admin.events.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){

        $event = Event::find($id);
        deleteImage("events", $event->image);
        $event->delete();

        return response()->json(['status'=>true, 'msg'=>'Event Deleted Successfully']);
    }
}
